<?php

$valid = false;
$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];

if(strlen(trim($post_title)) > 0 && strlen(trim($post_content)) > 0) {
  $valid = true;
}
else {
  $valid = false;
}

if($valid) {
  echo $post_title;
  echo '<br>';
  echo nl2br($post_content);
}
else {
  header('Location: ../../configuration_page.php');
}
