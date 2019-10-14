<?php

session_start();
$post_filter = $_GET['postFilter'];
$post_filter_msg = $_GET['postFilterMsg'];
$search_value = $_GET['searchValue'];

if($post_filter == 'form') {
  $post_filter = "WHERE Post.content LIKE '%$search_value%'";
}
$_SESSION['postFilter'] = $post_filter;
$_SESSION['postFilterMsg'] = $post_filter_msg;
$_SESSION['searchValue'] = $search_value;
header('Location: ../../index.php');