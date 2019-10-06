<?php

session_start();
$post_filter = $_GET['postFilter'];
$post_filter_msg = $_GET['postFilterMsg'];
$search_value = $_GET['searchValue'];

if($post_filter == 'form') {
  $post_filter = "SELECT Post.id, Post.title, User.username, Post.create_date,
    Type_of_blog.name AS type, Post.content
    FROM Post
    INNER JOIN User ON Post.username_id = User.id
    INNER JOIN Type_of_blog ON Post.username_id = Type_of_blog.id
    WHERE content LIKE \"%$search_value%\"";
}
$_SESSION['postFilter'] = $post_filter;
$_SESSION['postFilterMsg'] = $post_filter_msg;
$_SESSION['searchValue'] = $search_value;
header('Location: ../../index.php');
