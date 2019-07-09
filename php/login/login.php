<?php

require_once '../fetch_data/fetch.php';
$Fetch = new Fetch;
$users = $Fetch->fetch('SELECT * FROM Users');

class Login {
  public $userId = 0;
  public $username = '';
  private $password = '';
  private $loggedBool = '';
  private $users = [];

  public function __construct() {
    global $users;
    $this->users = $users;
  }

  private function checkIfUserExist() {
    for($i=0; $i<count($this->users); $i++) {
      if($this->users[$i]['username'] === $this->username) {
        $this->userId = $i;
        $this->username = $this->users[$i]['username'];
        return true;
      }
    }
  }

  private function checkPassword() {
    if($this->users[$this->userId]['password'] === $this->password) {
      return true;
    } else {
      return false;
    }
  }

  private function correctLogin() {
    session_start();
    $_SESSION['login'] = $this->username;
    $_SESSION['userId'] = $this->userId;
    header('Location: ../../index.php');
  }

  private function incorrectLogin() {
    session_start();
    $_SESSION['msg'] = 'Incorrect username or password.';
    header('Location: ../../login.php');
  }

  public function checkUser() {
    $this->username = $_POST['username'];
    $this->password = $_POST['password'];
    $this->loggedBool = $this->checkIfUserExist();

    if($this->loggedBool) {
      $this->loggedBool = $this->checkPassword();
      if($this->loggedBool) {
        $this->correctLogin();
      } else {
        $this->incorrectLogin();
      }
    } else {
      $this->incorrectLogin();
    }
  }
}

$Login = new Login;
$Login->checkUser();
