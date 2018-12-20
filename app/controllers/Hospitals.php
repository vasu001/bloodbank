<?php
  /**
   * Created by PhpStorm.
   * User: Vasu
   * Date: 19-12-2018
   * Time: 12:51 AM
   */

  class Hospitals extends Controller {
    /**
     * Hospitals constructor.
     */
    public function __construct() {
      $this->hospitalModel = $this->model('User');
      $this->bloodModel    = $this->model('Hospital');
    }

    public function createHospitalSession($loggedInUser) {
      $_SESSION['admin_id']    = $loggedInUser->{'id'};
      $_SESSION['admin_email'] = $loggedInUser->{'email'};
      $_SESSION['admin_name']  = $loggedInUser->{'name'};
      redirect('hospitals/dashboard');
    }

    public function logout() {
      unset($_SESSION['admin_id']);
      unset($_SESSION['admin_email']);
      unset($_SESSION['admin_name']);
      session_destroy();
      redirect('hospitals/login');
    }

    /**
     * Hospital's Index Page
     */
    public function index() {
      $this->view('hospitals/index');
    }

    /**
     * Hospital's Login Page
     */
    public function login() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data  = [
          'email'    => trim($_POST['hospital_email']),
          'password' => trim($_POST['hospital_password'])
        ];
        if($this->hospitalModel->findHospitalByEmail($data['email'])) {
          $loggedInUser = $this->hospitalModel->hospitallogin($data['email'], $data['password']);
          if($loggedInUser) {
            $this->createHospitalSession($loggedInUser);
          } else {
            flash('register_success', 'Wrong password entered! Try again', 'alert alert-danger');
            redirect('hospitals/login');
          }
        } else {
          flash('register_success', 'No hospital of that name found! Are you registered?', 'alert alert-danger');
          redirect('hospitals/register');
        }
      } else {
        $this->view('hospitals/login');
      }
    }

    /**
     * Hospital's Register Page
     */
    public function register() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data             = [
          'name'     => trim($_POST['hospital_name']),
          'regid'    => trim($_POST['hospital_id']),
          'email'    => trim($_POST['hospital_email']),
          'password' => trim($_POST['hospital_password'])
        ];
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        if($this->hospitalModel->hospitalregister($data)) {
          flash('register_success', 'Registration successful! You may now login');
          redirect('hospitals/login');
        } else {
          flash('register_success', 'Registration failed! Try again', 'alert alert-danger');
          redirect('hospitals/register');
        }

      } else {
        $this->view('hospitals/register');
      }
    }

    public function dashboard() {
      if(isHospitalLoggedIn()) {
        $this->view('hospitals/dashboard');
      } else {
        $this->view('pages/index');
      }
    }

    public function bloodinfo() {
      if(isHospitalLoggedIn()):
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data  = [
            'hospital_id' => trim($_SESSION['admin_id']),
            'bloodgroup'  => trim($_POST['bloodinfo_bloodgroup']),
            'quantity'    => trim($_POST['bloodinfo_quantity'])
          ];
          if($this->bloodModel->bloodinformation($data)) {
            flash('register_success', 'Blood Information Entered Successfully');
            redirect('hospitals/dashboard');
          } else {
            flash('register_success', 'Insertion failed! Try again', 'alert alert-danger');
            redirect('hospitals/bloodinfo');
          }
        } else {
          $this->view('hospitals/bloodinfo');
        }
      else:
        $this->view('pages/index');
      endif;
    }

    public function requestblood($offset = 1) {
      if(isHospitalLoggedIn()):
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
          $data = [];
          if(isHospitalLoggedIn()) {
            $data['admin_id'] = $_SESSION['admin_id'];
          }
          $bloodCount = $this->bloodModel->retrievebloodRCount();
          $pages      = ceil($bloodCount / 5);
          $row        = $this->bloodModel->getBloodData(5, $offset, $data['admin_id']);

          $data['row']   = $row;
          $data['pages'] = $pages;
          $this->view('hospitals/requestblood', $data);
        }
      else:
        $this->view('pages/index');
      endif;
    }

  }