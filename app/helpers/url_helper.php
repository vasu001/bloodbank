<?php
  /**
   * Created by PhpStorm.
   * User: Vasu
   * Date: 23-11-2018
   * Time: 12:27 PM
   */

  function redirect($location) {
    header('location: ' . URLROOT . '/' . $location);
  }