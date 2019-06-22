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
<body class='w-100 container-fluid m-0 p-0 row bg-black text-center'>

  <header class='col-sm-12 row mx-0 justify-content-between bg-dark'>
    <nav class="w-100 px-0 navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand btn bg-transparent text-info" href="index.php">Home</a>
      <button class="navbar-toggler btn bg-transparent" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto justify-content-end">
          <li class="nav-item active my-auto">
            <form action='index.php' method='get' class="form-inline py-3 py-lg-0">
              <input type="search" placeholder="Search" aria-label="Search"
                class="form-control w-100 mr-sm-2 bg-dark border-info text-light">
              <input type="submit" class="d-none">
            </form>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="index.php">News</a>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">Repository</a>
          </li>
          <?php if($loggedBool) echo '<li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="configuration_page.php">Configure</a>
          </li>'; ?>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto justify-content-end">
          <li class="nav-item active d-none <?php if($loggedBool) echo 'd-lg-block'; ?>">
            <button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
              class="px-3 nav-link btn text-left dropdown-toggle">
              <?php if($loggedBool) echo $username; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="btn btn-light w-100 text-left">Help</a>
              <a href="#" class="btn btn-light w-100 text-left">Accout settings</a>
              <a href="php/login/logout.php" class="btn btn-light w-100 text-left">Sign out</a>
            </div>
          </li>
          <li class="nav-item active d-none <?php if(!$loggedBool) echo 'd-lg-block'; ?>">
            <a class="px-3 nav-link btn text-left"
              href="login.php">sign in</a>
          </li>
          <li class="nav-item active d-lg-none">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="#">Help</a>
          </li>
          <li class="nav-item active <?php if($loggedBool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="#">Accout settings</a>
          </li>
          <li class="nav-item active <?php if(!$loggedBool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="login.php">Sign in</a>
          </li>
          <li class="nav-item active <?php if($loggedBool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="php/login/logout.php">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class='container-fluid row mx-auto text-light'>
    <div class='w-100 mx-0 row py-3 justify-content-around'>
      <div class='col-sm-12 col-lg-3 bg-dark p-4 mt-3 text-left'>
        <p class='px-2'>History :</p>
        <a href="" class='text-info'>Today</a><br>
        <a href="" class='text-info'>Yesterday</a><br>
        <a href="" class='text-info'>Last 7 days</a><br>
        <a href="" class='text-info'>This month</a><br>
      </div>

      <div class='col-sm-12 col-lg-8 p-0 mt-3'>
        <?php require_once 'php/parts_of_a_website/blog_content.php'; ?>
      </div>
    </div>
  </main>

  <?php require_once 'php/parts_of_a_website/footer.php'; ?>
  <?php if($loggedBool) echo '<script src="js/auto_sign_out.js"></script>'; ?>
</body>
</html>
