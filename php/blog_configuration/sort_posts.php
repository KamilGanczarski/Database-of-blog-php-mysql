<?php

session_start();
$search_filter = $_GET['search_filter'];
$search_filter_msg = $_GET['search_filter_msg'];
$search_value = $_GET['search_value'];

if($search_filter == 'form') {
  $search_filter = "WHERE Post.content LIKE '%$search_value%'";
}
$_SESSION['search_filter'] = $search_filter;
$_SESSION['search_filter_msg'] = $search_filter_msg;
$_SESSION['search_value'] = $search_value;
header('Location: ../../news.php');