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
  else {
    header('Location: login.php');
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

  <header class='col-sm-12 row mx-0 bg-dark justify-content-between'>
    <nav class="w-100 px-0 navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand btn bg-transparent text-info" href="index.php">Home</a>
      <button class="navbar-toggler btn bg-transparent" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto justify-content-end">
          <li class="nav-item active my-auto">
            <form class="form-inline py-3 py-lg-0" action='index.php' method='get'>
              <input type="search" placeholder="Search" aria-label="Search"
                class="form-control w-100 mr-sm-2 bg-dark border-info text-light">
              <input class="d-none" type="submit">
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
            <button class="px-3 nav-link btn text-left dropdown-toggle"
              href="#" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false"><?php if($loggedBool) echo $username; ?></button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="btn btn-light w-100 text-left" href="#">Help</a>
                <a class="btn btn-light w-100 text-left" href="#">Accout settings</a>
                <a class="btn btn-light w-100 text-left" href="php/login/logout.php">Sign out</a>
              </div>
          </li>
          <li class="nav-item active d-none <?php if(!$loggedBool) echo 'd-lg-block'; ?>">
            <a class="px-3 nav-link btn btn-sm bg-info text-left"
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
      <div class='col-sm-12 bg-dark p-4 mt-3 text-left'>
        <p class='h5'>Create post</p>

        <form action="php/blog configuration/configuration.php" method="post" id='add_post'>
          <p class="p-1 m-0 text-left text-muted">Post title</p>
          <input type="text" name="post_title" maxlength='255'
            class='mx-auto mb-3 form-control bg-dark border-info text-light'>
          <p class="p-1 m-0 text-left text-muted">Post Content</p>
          <textarea form='add_post' name='post_content' rows="13"
            class='w-100 p-2 bg-dark border-info text-light'></textarea>
          <div class="w-100 text-right">
            <input type="submit" value="Create" class='px-5 my-1 btn btn-info'>
          </div>
        </form>
      </div>
    </div>

  </main>

  <?php require_once 'php/parts_of_a_website/footer.php'; ?>
  <?php if($loggedBool) echo '<script src="js/auto_sign_out.js"></script>'; ?>
</body>
</html>
