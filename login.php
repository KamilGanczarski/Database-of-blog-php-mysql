<?php
  session_start();
  $msg = '';
  $msgBool = false;
  if(isset($_SESSION['msg'])) {
    $msgBool = true;
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
<body>
  <header>
    <nav class="w-100 px-3 navbar navbar-expand-lg navbar-dark bg-navy-blue">
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
          <li class="nav-item active d-none d-lg-block">
            <a class="w-100 px-3 py-3 py-lg-2 btn bg-transparent text-left text-light"
              href="login.php">sign in</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class='bg-gray'>
    <div class='container-fluid row px-0 py-5 mx-auto text-light'>
      <div class="mx-auto <?php if($msgBool) echo 'd-block'; else echo 'd-none'; ?>">
        <div class="loginWindowW alert alert-danger alert-dismissible fade show" role="alert">
          <?php if($msgBool) echo $msg; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

      <div class='w-100 mx-0 row justify-content-around'>
        <div class='loginWindowW loginWindowH p-5 bg-navy-blue rounded border border-dark'>
          <p class='h4 text-info'>Welcome back!</p>
          <p class='pb-4 text-muted'>We're so excited to see you again!</p>

          <form action='php/login/login.php' method='post' class='col-sm-12 mx-auto'>
            <p class="p-1 m-0 text-muted">Email</p>
            <input type="text" name="username" autofocus
              class='mx-auto mb-3 form-control bg-dark border-dark text-light'>

            <p class="p-1 m-0 text-muted">Password</p>
            <input type="password" name="password"
              class='mx-auto form-control bg-dark border-dark text-light'>

            <a class="w-100 px-1 mb-2 btn text-left text-info"
              href='login.php'>You forgot password ?</a>
            <input type="submit" value="Sign in" class='w-100 px-5 my-1 btn btn-info'>

            <div class="w-100 px-1">
              <span class='text-muted'>You haven't an account?</span>
              <a href='login.php' class='btn text-info px-0'>Register</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php
    require_once 'php/parts_of_a_website/footer.php';
    echo '<script src="js/query_to_PHP.js"></script>';
  ?>
</body>
</html>
