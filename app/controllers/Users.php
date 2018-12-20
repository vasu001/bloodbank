<?php


  class Users extends Controller {

    /**
     * Users constructor.
     */
    public function __construct() {
      $this->receiverModel = $this->model('User');
      $this->hospitalModel = $this->model('Hospital');
    }

    public function dashboard() {
      if(isReceiverLoggedIn()) {
        $this->view('users/dashboard');
      } else {
        $this->view('pages/index');
      }
    }

    public function checkLogin() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // POST DATA
        $data = [
          'checkLogin' => trim($_POST['checkLogin']),
        ];

        if(empty($data['checkLogin'])) {
          flash('register_success', 'You must login before requesting for blood samples');
          redirect('users/receiverlogin');
        } elseif( ! empty($data['checkLogin'])) {
          if(substr($data['checkLogin'], 0, 2) == "a_") {
            flash('register_success', 'You are a hospital and thus cannot request for blood');
            redirect('pages/bloodsamples');
          } elseif(substr($data['checkLogin'], 0, 2) == "u_") {
            if($this->hospitalModel->requestblood($data['checkLogin'])) {
              flash('register_success', 'Your request is sent');
              redirect('pages/bloodsamples');
            } else {
              flash('register_success', 'Sorry! Request failed. Try another hospital');
              redirect('pages/bloodsamples');
            }
          }
        }
      }
    }

    public function createUserSession($loggedInUser) {
      $_SESSION['user_id']    = $loggedInUser->{'id'};
      $_SESSION['user_email'] = $loggedInUser->{'email'};
      $_SESSION['user_name']  = $loggedInUser->{'name'};
      $_SESSION['user_dp']    = $loggedInUser->{'receiverdp'};
      redirect('users/dashboard');
    }

    public function logout() {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_dp']);
      session_destroy();
      redirect('users/receiverlogin');
    }

    /**
     * Receiver's Login Page
     */
    public function receiverlogin() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data  = [
          'email'    => trim($_POST['donor_email']),
          'password' => trim($_POST['donor_password'])
        ];
        if($this->receiverModel->findUserByEmail($data['email'])) {
          $loggedInUser = $this->receiverModel->login($data['email'], $data['password']);
          if($loggedInUser) {
            $this->createUserSession($loggedInUser);
          } else {
            flash('register_success', 'Wrong password entered! Try again', 'alert alert-danger');
            redirect('users/receiverlogin');
          }
        } else {
          flash('register_success', 'No user of that name found! Are you registered?', 'alert alert-danger');
          redirect('users/receiverlogin');
        }
      } else {
        $this->view('users/receiverlogin');
      }
    }

    /**
     *  Receiver's Sign Up Page
     */
    public function receiversignup() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $target_dir        = 'images/user_photos/';
        $filename          = $_FILES['donor_dp']['name'];
        $filetmpname       = $_FILES['donor_dp']['tmp_name'];
        $allowed_extension = ['png', 'jpg', 'jpeg', 'gif'];
        $temp              = explode('.', $filename);
        $temp              = end($temp);
        $file_extension    = strtolower($temp);
        $upload_dir        = $target_dir . basename($filename);

        $data = [
          'name'           => trim($_POST['donor_name']),
          'father'         => trim($_POST['father_name']),
          'email'          => trim($_POST['donor_email']),
          'password'       => trim($_POST['donor_password']),
          'gender'         => trim($_POST['donor_gender']),
          'bloodgroup'     => trim($_POST['donor_bloodgroup']),
          'dob'            => trim($_POST['donor_dob']),
          'mobile'         => trim($_POST['donor_mobile']),
          'state'          => trim($_POST['donor_state']),
          'city'           => trim($_POST['donor_city']),
          'address'        => trim($_POST['donor_address']),
          'pincode'        => trim($_POST['donor_pincode']),
          'receiverdp'     => trim($upload_dir),
          'receiverdp_err' => ''
        ];

        if( ! empty($data['receiverdp'])) {
          if( ! in_array($file_extension, $allowed_extension)) {
            $data['receiverdp_err'] = 'Only jpeg, png, jpg, and gif allowed';
          }
          if(empty($data['receiverdp_err'])) {
            $didUpload = move_uploaded_file($filetmpname, $upload_dir);

            if( ! $didUpload) {
              $data['receiverdp_err'] = 'Uploading error! Try again!';
            }
          }
        }
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        if(empty($data['receiverdp_err'])) {
          if($this->receiverModel->register($data)) {
            flash('register_success', 'You\'re now registered and can login');
            redirect('users/receiverlogin');
          }
        } else {
          $this->view('users/receiversignup', $data);
        }


      } else {
        $data = [
          'receiverdp_err' => ''
        ];
        $this->view('users/receiversignup', $data);
      }
    }

  }