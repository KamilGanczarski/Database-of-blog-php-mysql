<?php

require_once '../fetch_data/fetch.php';
require_once '../fetch_data/connection.php';

class Login extends Fetch {
  public $userId = 0;
  public $username = '';
  private $password = '';
  private $loggedBool = '';
  // Object
  private $User;

  private function correctLogin() {
    $_SESSION['userId'] = $this->User[0]['id'];
    $_SESSION['login'] = $this->User[0]['username'];
    header('Location: ../../index.php');
  }

  private function incorrectLogin() {
    $_SESSION['msg'] = 'Incorrect username or password.';
    header('Location: ../../login.php');
  }

  public function checkUserLogin() {
    session_start();
    $this->username = $_POST['username'];
    $this->password = $_POST['password'];

    $this->User = "SELECT * FROM Users WHERE username LIKE \"$this->username\"";
    $this->User = $this->fetch($this->User);
    if(is_array($this->User)) {
      if($this->User[0]['password'] === $this->password) {
        $this->correctLogin();
      } else {
        $this->incorrectLogin();
      }
    } else {
      $this->incorrectLogin();
    }
  }
}

$LoginObj = new Login;
$LoginObj->checkUserLogin();
