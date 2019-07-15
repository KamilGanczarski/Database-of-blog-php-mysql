<?php

require_once '../fetch_data/fetch.php';
$Fetch = new Fetch;

class Login {
  public $userId = 0;
  public $username = '';
  private $password = '';
  private $loggedBool = '';
  // Object
  private $User;

  public function __construct() {
    session_start();
    $this->username = $_POST['username'];
    $this->password = $_POST['password'];
  }

  public function checkUserLogin() {
    global $Fetch;
    $this->User = "SELECT * FROM Users WHERE username LIKE \"$this->username\"";
    $this->User = $Fetch->fetch($this->User);
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

  private function correctLogin() {
    $_SESSION['userId'] = $this->User[0]['id'];
    $_SESSION['login'] = $this->User[0]['username'];
    header('Location: ../../index.php');
  }

  private function incorrectLogin() {
    $_SESSION['msg'] = 'Incorrect username or password.';
    header('Location: ../../login.php');
  }
}

$Login = new Login;
$Login->checkUserLogin();
