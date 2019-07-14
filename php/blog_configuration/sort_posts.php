<?php

session_start();
$_SESSION['postFilter'] = $_GET['postFilter'];
$_SESSION['searchValue'] = $_GET['searchValue'];
header('Location: ../../index.php');
