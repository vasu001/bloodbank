<?php


  class Pages extends Controller {

    /**
     * Pages constructor.
     */
    public function __construct() {
      $this->hospitalModel = $this->model('Hospital');
//      $this->pagesModel    = $this->model('Page');
    }

    /**
     * Index Page
     */
    public function index() {
      $this->view('pages/index');
    }

    /**
     * About Page
     */
    public function about() {
      $this->view('pages/about');
    }

    /**
     * Blood Samples
     */
    public function bloodsamples($offset = 1) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

      } else {
        $data       = [];
        $bloodCount = $this->hospitalModel->retrievebloodCount();
        $pages      = ceil($bloodCount / 8);
        $row        = $this->hospitalModel->getHospitalData(8, $offset);
        if(isReceiverLoggedIn()) {
          $data['user_id'] = $_SESSION['user_id'];
        }
        if(isHospitalLoggedIn()) {
          $data['admin_id'] = $_SESSION['admin_id'];
        }
        $data['row']   = $row;
        $data['pages'] = $pages;
        $this->view('pages/bloodsamples', $data);
      }
    }

    /**
     * Hospitals Page for Login and Registration of Hospital Staff
     */
    public function hospitals() {
      $this->view('hospitals/index');
    }

  }