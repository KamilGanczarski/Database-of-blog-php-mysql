<?php

$postFilter = $_GET['postFilter'];
$searchValue = $_GET['searchValue'];

if($postFilter == 'form') {
  $postFilter = "SELECT * FROM Blog_content WHERE content LIKE \"%$searchValue%\"";
}
session_start();
$_SESSION['postFilter'] = $postFilter;
$_SESSION['searchValue'] = $searchValue;
header('Location: ../../index.php');
