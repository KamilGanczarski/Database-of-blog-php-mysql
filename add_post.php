<?php
  session_start();
  $username = 'user';
  $userId = 0;
  $logged_bool = false;
  $msg = '';
  $msg_bool = true;
  if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $userId = $_SESSION['userId'];
    $logged_bool = true;
  } else {
    header('Location: index.php');
  }

  if(isset($_SESSION['msg'])) {
    $msg_bool = false;
    $msg = $_SESSION['msg'];
  }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<?php require_once 'php/parts_of_a_website/head.php'; ?>
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
          <?php if($logged_bool) echo '<li class="nav-item active">
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
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light"
              href="index.php">Help</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto justify-content-end">
          <li class="nav-item active d-none <?php if($logged_bool) echo 'd-lg-block'; ?>">
            <button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
              class="px-3 nav-link btn text-left dropdown-toggle">
              <?php if($logged_bool) echo $username; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right bg-dark">
              <a href="index.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Help</a>
              <a href="index.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Accout settings</a>
              <a href="index.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Your posts</a>
              <a href="add_post.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Add post</a>
              <a href="php/login/logout.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Sign out</a>
            </div>
          </li>
          <li class="nav-item active d-none <?php if(!$logged_bool) echo 'd-lg-block'; ?>">
            <a href="login.php" class="px-3 btn bg-transparent text-left text-light">sign in</a>
          </li>
          <li class="nav-item active <?php if($logged_bool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="index.php">Accout settings</a>
          </li>
          <li class="nav-item active <?php if(!$logged_bool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="login.php">Sign in</a>
          </li>
          <li class="nav-item active <?php if($logged_bool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class="w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light"
              href="php/login/logout.php">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class='bg-gray'>
    <div class="px-4 pt-4 mx-0 <?php if($msg_bool) echo 'd-none'; else echo 'd-block'; ?>">
      <div class="w-50 alert alert-danger alert-dismissible fade show text-left mx-auto my-0" role="alert">
        <?php if(!$msg_bool) echo $msg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

    <div class='w-100 px-lg-4 py-4 mx-0 row justify-content-around'>
      <div class='col-sm-12 bg-navy-blue p-4'>
        <p class='h5 text-info'>Create post</p>

        <form action="php/blog_configuration/add_post.php" method="post" id='add_post'>
          <div class="w-100 m-0 p-0 row justify-content-between">
            <div class="col-sm-8 p-0">
              <p class="p-1 m-0 text-muted">Post title</p>
              <input type="text" name="post_title" maxlength='255'
                class='mb-3 form-control form-control-sm bg-dark border-dark text-light'>
            </div>
            <div class="col-sm-3 p-0 mb-3">
              <p class="p-1 m-0 text-muted">Post type</p>
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
          <p class="p-1 m-0 text-muted">Post Content</p>
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
    if($logged_bool) {
      echo '<script src="js/auto_sign_out.js"></script>';
    }
  ?>
  <script src="js/query_to_PHP.js"></script>
</body>
</html>
