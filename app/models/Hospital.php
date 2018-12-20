<?php
  /**
   * Created by PhpStorm.
   * User: Vasu
   * Date: 19-12-2018
   * Time: 10:30 PM
   */

  class Hospital {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function retrievebloodCount() {
      $this->db->query('SELECT `hospital_id` AS `id`, `name` AS `hospital_name`, `bloodgroup` AS `blood`, SUM(`bloodquantity`) AS `quantity` FROM hospitals, bloodinfo WHERE hospitals.`id` = bloodinfo.`hospital_id` GROUP BY `hospital_id`,`bloodgroup`');
      $row   = $this->db->resultSet();
      $count = 0;
      foreach($row as $rowCount):
        $count += 1;
      endforeach;

      return $count;
    }

    public function retrievebloodRCount() {
      $this->db->query('SELECT * FROM `bloodrequest` GROUP BY `id`');
      $row   = $this->db->resultSet();
      $count = 0;
      foreach($row as $rowCount):
        $count += 1;
      endforeach;

      return $count;
    }

    public function bloodinformation($data) {
      $this->db->query('INSERT INTO `bloodinfo`(`hospital_id`,`bloodgroup`,`bloodquantity`) VALUES(:id, :group, :quantity)');
      $this->db->bind(':id', $data['hospital_id']);
      $this->db->bind('group', $data['bloodgroup']);
      $this->db->bind('quantity', $data['quantity']);
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getBloodData($limit, $offset, $id) {
      $offset = ($offset - 1) * $limit;
      $this->db->query('SELECT `requester_name` AS `name`, `requested_blood_group` AS `blood` FROM bloodrequest WHERE `hospital_id` = :id LIMIT :limit OFFSET :offset');
      $this->db->bind(':id', $id);
      $this->db->bind(':offset', $offset);
      $this->db->bind(':limit', $limit);

      $row = $this->db->resultSet();

      if($row) {
        return $row;
      } else {
        return false;
      }
    }

    public function getHospitalData($limit, $offset) {
      $offset = ($offset - 1) * $limit;
      $this->db->query('SELECT `hospital_id` AS `id`, `name` AS `hospital_name`, `bloodgroup` AS `blood`, SUM(`bloodquantity`) AS `quantity` FROM hospitals, bloodinfo WHERE hospitals.`id` = bloodinfo.`hospital_id` GROUP BY `hospital_id`,`bloodgroup` LIMIT :limit OFFSET :offset');
      $this->db->bind(':offset', $offset);
      $this->db->bind(':limit', $limit);

      $row = $this->db->resultSet();

      if($row) {
        return $row;
      } else {
        return false;
      }
    }

    public function requestblood($user_id) {
      $start_index = strpos($user_id, "_");
      $end_index   = strpos($user_id, '__');
      $blood_index = strpos($user_id, 'b_');
//      echo "Start Index: " . $start_index . "<br>";
//      echo "End Index: " . $end_index . "<br>";
//      echo "Blood Index: " . $blood_index . "<br>";
      $hospital_id  = substr($user_id, $end_index + 2, $blood_index - $end_index - 2);
      $user_real_id = substr($user_id, $start_index + 1, $end_index - $start_index - 1);
      $bloodgroup   = substr($user_id, $blood_index + 2, strlen($user_id));
//      echo "Hospital ID: " . $hospital_id . "<br>User ID: " . $user_real_id . "<br>Blood Group: " . $bloodgroup;
//      die();
      $this->db->query('SELECT `name` AS `requester` FROM `receivers` WHERE `id` = :id');
      $this->db->bind(':id', $user_real_id);
      $requester = $this->db->single();
      $this->db->query('INSERT INTO `bloodrequest`(`hospital_id`, `requester_name`, `requested_blood_group`) VALUES (:hospital_id, :requester_name, :requested_blood_group)');
      $this->db->bind(':hospital_id', $hospital_id);
      $this->db->bind(':requester_name', $requester->{'requester'});
      $this->db->bind(':requested_blood_group', $bloodgroup);

      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }