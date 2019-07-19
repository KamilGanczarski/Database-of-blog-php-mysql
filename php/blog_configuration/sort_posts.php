<?php

session_start();
$postFilter = $_GET['postFilter'];
$postFilterMsg = $_GET['postFilterMsg'];
$searchValue = $_GET['searchValue'];

if($postFilter == 'form') {
  $postFilter = "SELECT * FROM Blog_content WHERE content LIKE \"%$searchValue%\"";
}
$_SESSION['postFilter'] = $postFilter;
$_SESSION['postFilterMsg'] = $postFilterMsg;
$_SESSION['searchValue'] = $searchValue;
header('Location: ../../index.php');
