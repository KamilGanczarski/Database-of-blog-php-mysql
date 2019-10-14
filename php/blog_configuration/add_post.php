<?php

require_once '../fetch_data/connection.php';
require_once '../fetch_data/fetch.php';

class Add_post extends Fetch {
  private $post_title = '';
  private $post_user = '';
  private $post_type = '';
  private $post_content = '';
  private $query_to_sql = '';

  /*
   * Create new row in table 'Blog_content'
   */
  private function create_post() {
    $this->username_id = $_SESSION["userId"];
    $this->post_title = nl2br($this->post_title);
    $this->post_content = nl2br($this->post_content);
    $this->query_to_sql = "INSERT INTO Post(title, username_id, create_date, typeof_id, content) VALUES ";
    $this->query_to_sql .= "('$this->post_title', '$this->username_id', CURRENT_TIMESTAMP, ";
    $this->query_to_sql .= "'$this->post_type', '$this->post_content')";
    $this->fetch("$this->query_to_sql");
    unset($_SESSION['msg']);
    header('Location: ../../index.php');
  }

  /*
   * Return to create post page with error message
   */
  private function denial_create_post() {
    $_SESSION['msg'] = 'Incorrent post title or content or you did\'t set a type';
    header('Location: ../../add_post.php');
  }

  public function add_post_f() {
    session_start();
    $this->post_title = $_POST['post_title'];
    $this->post_type = $_POST['typeof_id'];
    $this->post_content = $_POST['post_content'];
    if(strlen(trim($this->post_title)) > 0 &&
      strlen(trim($this->post_content)) > 0 && $this->post_type != 'Type') {
      $this->create_post();
    } else {
      $this->denial_create_post();
    }
  }
}

$Add_post_obj = new Add_post();
$Add_post_obj->add_post_f();
