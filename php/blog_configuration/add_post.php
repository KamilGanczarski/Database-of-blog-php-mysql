<?php

require_once '../fetch_data/fetch.php';
$Fetch = new Fetch;
$valid = false;
$post_id = 0;
$post_user = '';
$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];
$query_to_sql = '';

if(strlen(trim($post_title)) > 0 && strlen(trim($post_content)) > 0) {
  $valid = true;
} else {
  $valid = false;
}

if($valid) {
  $post_id = $Fetch->fetch('SELECT id FROM Blog_content');
  $post_id = end($post_id);
  $post_id = $post_id["id"] + 1;
  $post_title = nl2br($post_title);
  $post_content = nl2br($post_content);
  session_start();
  $post_user = $_SESSION["login"];
  // if($post_id !== 0) {
    echo $post_id . '<br>';
    echo $post_user . '<br>';
    echo $post_title . '<br>';
    echo $post_content . '<br>';
    $Fetch->fetch("insert into Blog_content(id, username, create_date, title, content) values ($post_id, '$post_user', CURRENT_TIMESTAMP, '$post_title', '$post_content')");
  // }
  header('Location: ../../index.php');
} else {
  header('Location: ../../configuration_page.php');
}
