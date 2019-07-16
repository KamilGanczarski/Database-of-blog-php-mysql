<?php
  session_start();
  $username = 'user';
  $userId = 0;
  $loggedBool = false;
  $msg = '';
  $msgBool = true;
  if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $userId = $_SESSION['userId'];
    $loggedBool = true;
  } else {
    header('Location: index.php');
  }

  if(isset($_SESSION['msg'])) {
    $msgBool = false;
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
    <div class="mx-auto mt-4 <?php if($msgBool) echo 'd-none'; else echo 'd-block'; ?>">
      <div class="loginWindowW alert alert-danger alert-dismissible fade show text-left m-0" role="alert">
        <?php if(!$msgBool) echo $msg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

    <div class='w-100 mx-0 row py-4 justify-content-around'>
      <div class='col-sm-12 bg-navy-blue p-4 text-left'>
        <p class='h5 text-info'>Create post</p>

        <form action="php/blog_configuration/add_post.php" method="post" id='add_post'>
          <div class="w-100 m-0 p-0 row justify-content-between">
            <div class="col-sm-8 p-0">
              <p class="p-1 m-0 text-left text-muted">Post title</p>
              <input type="text" name="post_title" maxlength='255'
                class='mb-3 form-control form-control-sm bg-dark border-dark text-light'>
            </div>
            <div class="col-sm-3 p-0">
              <p class="p-1 m-0 text-left text-muted">Post type</p>
              <select name="post_type" class="w-100 form-control form-control-sm form-control-dark">
                <option selected>Type</option>
                <option value='JavaScript'>JavaScript</option>
                <option value='Java'>Java</option>
                <option value='PHP'>PHP</option>
                <option value='Python'>Python</option>
                <option value='C Language'>C Language</option>
                <option value='Ruby'>Ruby</option>
                <option value='Swift'>Swift</option>
                <option value='Other'>Other</option>
              </select>
            </div>
          </div>
          <p class="p-1 m-0 text-left text-muted">Post Content</p>
          <textarea form='add_post' name='post_content' rows="13"
            class='w-100 p-2 bg-dark border-dark text-light'></textarea>
          <div class="w-100 text-right">
            <input type="submit" value="Create" class='px-5 my-1 btn btn-info'>
          </div>
        </form>
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
