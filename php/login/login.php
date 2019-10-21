<?php

require_once '../fetch_data/fetch.php';

class Login extends Fetch {
  public $userId = 0;
  public $username = '';
  private $password = '';
  // Object
  private $User;

  private function correct_login() {
    $_SESSION['userId'] = $this->User[0]['id'];
    $_SESSION['login'] = $this->User[0]['username'];
    header('Location: ../../index.php');
  }

  private function incorrect_login() {
    $_SESSION['msg'] = 'Incorrect username or password.';
    header('Location: ../../login.php');
  }

  public function check_user_login() {
    session_start();
    session_unset();
    session_start();
    $this->username = $_POST['username'];
    $this->password = $_POST['password'];

    $this->User = "SELECT * FROM User WHERE username LIKE \"$this->username\"";
    $this->User = $this->fetch($this->User);
    if(is_array($this->User)) {
      if($this->User[0]['passwrd'] === $this->password) {
        $this->correct_login();
      } else {
        $this->incorrect_login();
      }
    } else {
      $this->incorrect_login();
    }
  }
}

$LoginObj = new Login;
$LoginObj->check_user_login();
