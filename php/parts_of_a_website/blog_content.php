<?php

require_once 'php/fetch_data/fetch.php';

class Blog_content {
  private $result = '';
  private $Fetch;

  public function __construct($loggedBool) {
    $this->loggedBool = $loggedBool;
    $Fetch = new Fetch;
    $this->content = $Fetch->fetch('SELECT * FROM Blog_content');
  }

  /*
   * Return simple blog without buttons to remove posts
   */
  private function simple_blog() {
    $this->result = '';
    foreach($this->content as $value) {
      $this->result .=
      '<div class="w-100 bg-dark p-4 mb-2 text-left">' .
        '<a href="#" class="w-50 px-0 py-lg-2 nav-link btn bg-transparent text-left
          text-info">' . $value['title'] . '</a>' .
          '<div class="row px-3 justify-content-between">' .
            '<p class="col-sm-6 px-0">Written by: ' . $value['username'] . '</p>' .
            '<p class="col-sm-6 px-0 text-right">' . $value['create_date'] . '</p>' .
          '</div>' .
          '<p>' . $value['content'] . '</p>' .
      '</div>';
    }
  }

  /*
   * Return editable blog with buttons to remove posts
   */
  private function editable_blog() {
    $this->result = '';
    foreach($this->content as $value) {
      $this->result .=
      '<div class="w-100 bg-dark p-4 mb-2 text-left">' .
        '<button class="close text-light" aria-label="Close" onclick="remove_post(' . $value['id'] . ')">
          <span aria-hidden="true">&times;</span>
        </button>' .
        '<a href="#" class="w-50 px-0 py-lg-2 nav-link btn bg-transparent text-left
          text-info">' . $value['title'] . '</a>' .
          '<div class="row px-3 justify-content-between">' .
            '<p class="col-sm-6 px-0">Written by: ' . $value['username'] . '</p>' .
            '<p class="col-sm-6 px-0 text-right">' . $value['create_date'] . '</p>' .
          '</div>' .
          '<p>' . $value['content'] . '</p>' .
      '</div>';
    }
  }

  public function return_html() {
    // Check if the user is logged in
    if($this->loggedBool == true) {
      $this->editable_blog();
    } else {
      $this->simple_blog();
    }
    return $this->result;
  }
}
