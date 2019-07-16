<?php
  session_start();
  $username = 'user';
  $userId = 0;
  $loggedBool = false;
  if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $userId = $_SESSION['userId'];
    $loggedBool = true;
  }

  if(isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
  }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <title>Document</title>
  <link rel='stylesheet' href='style/style.css'>
  <meta name="theme-color" content="#000"/>
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'>
</head>
<body class='w-100 container-fluid m-0 p-0 row bg-gray text-center'>

  <header class='col-sm-12 row mx-0 justify-content-between bg-navy-blue'>
    <nav class="w-100 px-0 navbar navbar-expand-lg navbar-dark bg-navy-blue">
      <a href="index.php" class="navbar-brand btn bg-transparent text-info">Home</a>
      <button class="navbar-toggler btn bg-transparent" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto justify-content-end">
          <li class="nav-item active my-auto">
            <form action='php/blog_configuration/sort_posts.php' method='get' class="form-inline py-3 py-lg-0">
              <input type="search" name='searchValue' placeholder="Search" value='<?php if(isset($_SESSION['searchValue'])) echo $_SESSION['searchValue'] ?>'
                class="form-control form-control-sm w-100 mr-sm-2 bg-dark border-0 text-light formSearchInput">
              <div class="inputWidth"></div>
              <input type="text" name="postFilter" value='form' class='postFilter d-none'>
              <input type="submit" class="d-none">
            </form>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light"
              href="index.php">News</a>
          </li>
          <?php if($loggedBool) echo '<li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light"
              href="add_post.php">Add post</a>
          </li>'; ?>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light"
              href="documentation.php">Documentation</a>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light"
              href="index.php">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto justify-content-end">
          <li class="nav-item active d-none <?php if($loggedBool) echo 'd-lg-block'; ?>">
            <button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
              class="px-3 nav-link btn text-left dropdown-toggle">
              <?php if($loggedBool) echo $username; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right bg-dark">
              <a href="index.php" class="btn btn-sm btn-dark w-100 text-left">Help</a>
              <a href="index.php" class="btn btn-sm btn-dark w-100 text-left">Accout settings</a>
              <a href="php/login/logout.php" class="btn btn-sm btn-dark w-100 text-left">Sign out</a>
            </div>
          </li>
          <li class="nav-item active d-none <?php if(!$loggedBool) echo 'd-lg-block'; ?>">
            <a href="login.php" class="px-3 btn bg-transparent text-left text-light">sign in</a>
          </li>
          <li class="nav-item active d-lg-none">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="index.php">Help</a>
          </li>
          <li class="nav-item active <?php if($loggedBool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="index.php">Accout settings</a>
          </li>
          <li class="nav-item active <?php if(!$loggedBool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="login.php">Sign in</a>
          </li>
          <li class="nav-item active <?php if($loggedBool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="php/login/logout.php">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class='container-fluid row mx-auto text-light'>
    <div class='w-100 mx-0 row py-3 justify-content-around'>
      <div class='col-sm-12 col-lg-3 p-4 mt-3 text-left border rounded border-dark bg-navy-blue'>
        <div id="list-example" class="list-group">
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-1">What’s included</a>
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-2">Components</a>
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-3">Item 3</a>
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-4">Item 4</a>
        </div>

        <div class="">
          <?php
            require_once 'php/fetch_data/fetch.php';
            require_once 'php/fetch_data/connection.php';

            class Get_users extends Fetch {
              public function get_div() {
                $this->div = $this->fetch('SELECT count(id) as `i` FROM Blog_content WHERE username LIKE "admin"');
                return '<h4>Number of users: ' . $this->div[0]['i'] . '</h4>';
              }
            }
            $Fetch = new Get_users();
            echo $Fetch->get_div();
          ?>
        </div>
      </div>

      <div class='col-sm-12 col-lg-8 p-0 mt-3' data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
        <p class='h4 text-left text-info' id="list-item-1">What’s included</p>
        <p class='text-left text-light'>
          You’ll find the following directories and files, grouping common resources and providing both compiled and minified distribution files, as well as raw source files.
        </p>
        <pre class='border rounded border-dark bg-navy-blue text-left text-light'>

  source/
    ├── create_table_in_phpmyadmin/
    │     └── index.sql
    ├── js/
    │     ├── auto_sign_out.js
    │     ├── auto_sign_out.js
    │     └── resize_page.js
    ├── php/
    │     ├── blog_configuration/
    |     |   ├── add_post.php
    |     |   ├── get_posts.php
    |     |   ├── remove_posts.php
    |     |   └── sort_post.php
    │     ├── fetch_data/
    |     |   ├── connection.php
    |     |   └── fetch.php
    │     ├── login/
    |     |   ├── login.php
    |     |   └── logout.php
    │     └── parts_of_a_website/
    |         └── footer.php
    ├── style/
    │   └── style.css
    ├── 404.php
    ├── add_post.php
    ├── documentation.php
    ├── index.php
    ├── LICENSE
    └── login.php
        </pre>

        <p class='h4 text-left text-info' id="list-item-2">Components</p>
        <p class='text-left text-light'></p>
      </div>
    </div>
  </main>

  <?php
    require_once 'php/parts_of_a_website/footer.php';
    if($loggedBool) {
      echo '<script src="js/auto_sign_out.js"></script>';
    }
  ?>
  <script src="js/query_to_PHP.js"></script>
</body>
</html>