<?php

require_once '../fetch_data/fetch.php';
require_once '../fetch_data/connection.php';

class Add_post extends Fetch {
  private $post_id = 0;
  private $post_title = '';
  private $post_user = '';
  private $post_type = '';
  private $post_content = '';
  private $query_to_sql = '';

  /*
   * Create new row in table 'Blog_content'
   */
  private function create_post() {
    $this->post_id = $this->fetch('SELECT id FROM Blog_content');
    $this->post_id = end($this->post_id);
    $this->post_id = $this->post_id["id"] + 1;
    $this->post_user = $_SESSION["login"];
    $this->post_title = nl2br($this->post_title);
    $post_content = nl2br($this->post_content);
    $this->query_to_sql = "INSERT INTO Blog_content(id, title, username, create_date, type, content) VALUES ";
    $this->query_to_sql .= "($this->post_id, '$this->post_title', '$this->post_user', CURRENT_TIMESTAMP, ";
    $this->query_to_sql .= "'$this->post_type', '$this->post_content')";
    $this->fetch("$this->query_to_sql");
    unset($_SESSION['msg']);
    header('Location: ../../index.php');
  }

  /*
   * Return to create post page with error message
   */
  private function denial_create_post() {
    $_SESSION['msg'] = 'Incorrent post title or content';
    header('Location: ../../add_post.php');
  }

  public function add_post_f() {
    session_start();
    $this->post_title = $_POST['post_title'];
    $this->post_type = $_POST['post_type'];
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
