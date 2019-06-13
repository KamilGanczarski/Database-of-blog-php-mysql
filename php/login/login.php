<?php

require_once '../fetch_data/fetch.php';
$Fetch = new Fetch;
$users = $Fetch->fetchData('SELECT * FROM users');

class Login {
  public $userId = 0;
  public $username = '';
  private $password = '';
  private $loginBool = '';
  private $users = [];

  private function checkIfUserExist() {
    global $users;
    $this->users = $users;

    for($i=0; $i<count($this->users); $i++) {
      if($this->users[$i]['username'] === $this->username) {
        $this->userId = $i;
        return $this->users[$i]['username'];
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

  public function checkUser() {
    $this->username = $_POST['login'];
    $this->password = $_POST['password'];
    $this->loginBool = $this->checkIfUserExist();

    if(!is_null($this->loginBool)) {
      $this->loginBool = $this->checkPassword();
      if($this->loginBool) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}

$Login = new Login;
$Login->checkUser();

if($Login->checkUser()) {
  session_start();
  $_SESSION['login'] = $Login->username;
  $_SESSION['userId'] = $Login->userId;
  header('Location: ../../index.php');
}
else {
  header('Location: ../../login_page.php');
}
