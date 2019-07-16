<?php

require_once '../fetch_data/fetch.php';
require_once '../fetch_data/connection.php';
$id =  $_GET['id'];
$Fetch = new Fetch;
$Fetch->fetch("DELETE FROM Blog_content WHERE id = $id");
header('Location: ../../index.php');
