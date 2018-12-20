<?php
  /**
   * Created by PhpStorm.
   * User: Vasu
   * Date: 19-12-2018
   * Time: 06:24 PM
   */

  class User {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function register($data) {
      $this->db->query('INSERT INTO `receivers`(`name`,`fathername`,`email`,`password`,`gender`,`bloodgroup`,`dob`,`mobile`,`state`,`city`,`address`,`pincode`,`receiverdp`) VALUES (:name,:fathername,:email,:password,:gender,:bloodgroup,:dob,:mobile,:state,:city,:address,:pincode,:receiverdp)');

      $this->db->bind(':name', $data['name']);
      $this->db->bind(':fathername', $data['father']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':bloodgroup', $data['bloodgroup']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':mobile', $data['mobile']);
      $this->db->bind(':state', $data['state']);
      $this->db->bind(':city', $data['city']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':pincode', $data['pincode']);
      $this->db->bind(':receiverdp', $data['receiverdp']);

      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function login($email, $password) {
      $this->db->query('SELECT * FROM `receivers` WHERE `email`=:email');
      $this->db->bind(':email', $email);

      $row             = $this->db->single();
      $hashed_password = $row->{'password'};
      if(password_verify($password, $hashed_password)) {
        return $row;
      } else {
        return false;
      }
    }

    public function hospitallogin($email, $password) {
      $this->db->query('SELECT * FROM `hospitals` WHERE `email`=:email');
      $this->db->bind(':email', $email);

      $row             = $this->db->single();
      $hashed_password = $row->{'password'};
      if(password_verify($password, $hashed_password)) {
        return $row;
      } else {
        return false;
      }
    }

    public function findUserByEmail($email) {
      $this->db->query('SELECT * FROM `receivers` WHERE `email` = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

    public function findHospitalByEmail($email) {
      $this->db->query('SELECT * FROM `hospitals` WHERE `email` = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }


    public function hospitalregister($data) {
      $this->db->query('INSERT INTO `hospitals`(`name`,`registrationid`,`email`,`password`) VALUES (:name,:regid,:email,:password)');

      $this->db->bind(':name', $data['name']);
      $this->db->bind(':regid', $data['regid']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }