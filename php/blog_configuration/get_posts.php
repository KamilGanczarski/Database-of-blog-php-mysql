<?php

require_once 'php/fetch_data/connection.php';
require_once 'php/fetch_data/fetch.php';

class Get_posts extends Fetch {
  private $logged_bool = '';
  private $content = '';
  private $type = '';
  private $result = '';

  private function get_all_posts() {
    if(isset($_SESSION['postFilter'])) {
      $this->content = $this->fetch($_SESSION['postFilter']);
    } else {
      $this->content = $this->fetch('SELECT * FROM Blog_content');
    }
    /*
     * Check if the user is logged in
     */
    if($this->content == 0) {
      $this->no_such_posts();
    } else if($this->logged_bool == true) {
      $this->editable_blog();
    } else {
      $this->simple_blog();
    }
    return $this->result;
  }

  /*
   * Return list of titles of posts
   */
  private function get_title_of_posts() {
    $this->content = $this->fetch('SELECT id, title FROM Blog_content');
    $this->result = '';
    foreach($this->content as $value) {
      $this->result .= '<a onclick="query_to_PHP(' . $value['id'] . ', \'id\')" ' .
      'class="px-4 btn btn-sm text-info">' . $value['title'] . '</a><br>';
    }
    return $this->result;
  }

  /*
   * Return simple blog without buttons to remove posts
   */
  private function simple_blog() {
    $this->result = '<button class="btn btn-sm btn-dark mx-2 mb-2">' .
     '<span aria-hidden="true" class="">Results: ' . count($this->content) . '</span>
    </button>';
    foreach($this->content as $value) {
      $this->result .=
      '<div class="w-100 p-4 mb-2 text-left text-light border rounded border-dark bg-navy-blue">' .
        '<a href="index.php" class="w-75 px-0 py-lg-2 nav-link btn bg-transparent text-left
          text-info">' . $value['title'] . '</a>' .
          '<div class="row px-3 justify-content-between">' .
            '<p class="col-6 px-0">Written by: ' . $value['username'] . '</p>' .
            '<p class="col-6 px-0 text-right">' . $value['create_date'] . '</p>' .
          '</div>' .
          '<p>' . $value['content'] . '</p>' .
      '</div>';
    }
    return $this->result;
  }

  /*
   * Return editable blog with buttons to remove posts
   */
  private function editable_blog() {
    $this->result = '<button class="btn btn-sm btn-dark mx-2 mb-2">' .
     '<span aria-hidden="true" class="">Results: ' . count($this->content) . '</span>
    </button>';
    foreach($this->content as $value) {
      $this->result .=
      '<div class="w-100 p-4 mb-2 text-left text-light border rounded border-dark bg-navy-blue">' .
        '<button class="close text-light" onclick="are_you_sure(' . $value['id'] . ', \'remove\')"
          aria-label="Close" data-toggle="modal" data-target="#sureModal">
          <span aria-hidden="true">&times;</span>
        </button>' .
        '<a href="index.php" class="w-75 px-0 py-lg-2 nav-link btn bg-transparent text-left
          text-info">' . $value['title'] . '</a>' .
          '<div class="row px-3 justify-content-between">' .
            '<p class="col-6 px-0">Written by: ' . $value['username'] . '</p>' .
            '<p class="col-6 px-0 text-right">' . $value['create_date'] . '</p>' .
          '</div>' .
          '<p>' . $value['content'] . '</p>' .
      '</div>';
    }
    return $this->result;
  }

  /*
   * Return information about no such posts
   */
  private function no_such_posts() {
    $this->result =
    '<div class="w-100 p-4 mb-2 text-left text-light border rounded border-dark bg-navy-blue">' .
      '<a href="index.php" class="w-50 px-0 py-lg-2 btn nav-link bg-transparent text-left
        text-info">There is no such post you\'re looking for.</a>' .
    '</div>';
    return $this->result;
  }

  public function return_html($logged_bool, $type) {
    $this->logged_bool = $logged_bool;
    $this->type = $type;
    if($this->type == 'all') {
      $this->result = $this->get_all_posts();
    } else if($this->type == 'title') {
      $this->result = $this->get_title_of_posts();
    }
    return $this->result;
  }
}
