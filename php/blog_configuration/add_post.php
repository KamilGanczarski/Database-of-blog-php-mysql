<?php

require_once '../fetch_data/fetch.php';
$Fetch = new Fetch;
$post_id = 0;
$post_user = '';
$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];
$query_to_sql = '';

session_start();
if(strlen(trim($post_title)) > 0 && strlen(trim($post_content)) > 0) {
  $post_id = $Fetch->fetch('SELECT id FROM Blog_content');
  $post_id = end($post_id);
  $post_id = $post_id["id"] + 1;
  $post_user = $_SESSION["login"];
  $post_title = nl2br($post_title);
  $post_content = nl2br($post_content);
  // echo $post_id . '<br>';
  // echo $post_user . '<br>';
  // echo $post_title . '<br>';
  // echo $post_content . '<br>';
  $query_to_sql = "INSERT INTO Blog_content(id, username, create_date, title, content) VALUES ";
  $query_to_sql .= "($post_id, '$post_user', CURRENT_TIMESTAMP, '$post_title', '$post_content')";
  $Fetch->fetch("$query_to_sql");
  unset($_SESSION['msg']);
  header('Location: ../../index.php');
} else {
  $_SESSION['msg'] = 'Incorrent post title or content';
  header('Location: ../../configuration_page.php');
}
