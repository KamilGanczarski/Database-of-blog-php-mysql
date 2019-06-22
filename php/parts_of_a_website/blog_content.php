<?php

require_once 'php/fetch_data/fetch.php';
$Fetch = new Fetch;
$content = $Fetch->fetch('SELECT * FROM Blog_content');
$result = '';

foreach($content as $value) {
  $result =
  '<div class="w-100 bg-dark p-4 mb-2 text-left">' .
    '<a href="#" class="w-100 px-3 py-lg-2 nav-link btn bg-transparent text-left
      text-info">' . $value['title'] . '</a>' .
      '<div class="row px-3 justify-content-between">' .
        '<p class="col-sm-6">Written by: ' . $value['username'] . '</p>' .
        '<p class="col-sm-6 text-right">' . $value['create_date'] . '</p>' .
      '</div>' .
      '<p>' . $value['content'] . '</p>' .
  '</div>';
  echo $result;
}
