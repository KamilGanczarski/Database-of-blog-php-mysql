<?php

require_once '../fetch_data/connection.php';
require_once '../fetch_data/fetch.php';

$id =  $_GET['id'];
$Fetch = new Fetch;
$Fetch->fetch("DELETE FROM Blog_content WHERE id = $id");
header('Location: ../../index.php');
