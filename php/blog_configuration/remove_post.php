<?php

$id =  $_GET['id'];
require_once '../fetch_data/fetch.php';
$Fetch = new Fetch;
$Fetch->fetch("DELETE FROM Blog_content WHERE id = $id");
header('Location: ../../index.php');
