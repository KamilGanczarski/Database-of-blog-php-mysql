<?php
  require_once 'php/blog_configuration/get_posts.php';

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
            <div class="dropdown-menu dropdown-menu-right bg-dark" style='width: 200px;'>
              <a href="index.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Help</a>
              <a href="index.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Accout settings</a>
              <a href="index.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Your posts</a>
              <a href="add_post.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Add post</a>
              <a href="php/login/logout.php" class="d-block btn btn-sm btn-dark px-4 w-100 text-left">Sign out</a>
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

  <main class='bg-gray'>
    <div class='w-100 mx-0 row py-3 justify-content-around'>
      <div class='col-sm-12 col-lg-3 p-4 mt-3 text-left border rounded border-dark bg-navy-blue'>
        <nav class="accordion mb-4" id="accordionExample">
          <div class="card bg-transparent border rounded-top border-dark">
            <div class="card-header" id="headingOne">
              <a class="btn btn-sm px-0 text-light collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Upload date
              </a>
            </div>

            <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
              <a onclick='queryToPHP("All", "all")' class='px-4 py-3 btn btn-sm text-info'>All</a><br>
            </div>
          </div>
          <div class="card bg-transparent border border-dark">
            <div class="card-header" id="headingTwo">
              <a class="btn btn-sm px-0 text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Type
              </a>
            </div>

            <div class="collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <a onclick='queryToPHP("JavaScript", "filter")' class='px-4 pt-3 btn btn-sm text-info'>JavaScript</a><br>
              <a onclick='queryToPHP("Java", "filter")' class='px-4 btn btn-sm text-info'>Java</a><br>
              <a onclick='queryToPHP("PHP", "filter")' class='px-4 btn btn-sm text-info'>PHP</a><br>
              <a onclick='queryToPHP("Python", "filter")' class='px-4 btn btn-sm text-info'>Python</a><br>
              <a onclick='queryToPHP("C Language", "filter")' class='px-4 btn btn-sm text-info'>C Language</a><br>
              <a onclick='queryToPHP("Ruby", "filter")' class='px-4 btn btn-sm text-info'>Ruby</a><br>
              <a onclick='queryToPHP("Swift", "filter")' class='px-4 pb-3 btn btn-sm text-info'>Swift</a><br>
            </div>
          </div>
          <div class="card bg-transparent border rounded-bottom border-dark">
            <div class="card-header" id="headingThree">
              <a class="btn btn-sm px-0 text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Sort by
              </a>
            </div>

            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample">
              <a onclick='queryToPHP("type", "sort")' class='px-4 btn pt-3 btn-sm text-info'>Type</a><br>
              <a onclick='queryToPHP("title", "sort")' class='px-4 btn btn-sm text-info'>Title</a><br>
              <a onclick='queryToPHP("create_date", "sort")' class='px-4 btn btn-sm text-info'>Upload date</a><br>
              <a onclick='queryToPHP("username", "sort")' class='px-4 pb-3 btn btn-sm text-info'>Author</a><br>
            </div>
          </div>
        </nav>

        <div class="py-2 text-left border rounded border-dark">
          <?php
            $Get_posts = new Get_posts();
            echo $Get_posts->return_html($loggedBool, 'title');
          ?>
        </div>
      </div>

      <div class='col-sm-12 col-lg-8 p-0 mt-3'>
          <?php
            if(isset($_SESSION['postFilterMsg']) && $_SESSION['postFilterMsg'] !== '') {
              echo '<button onclick=\'queryToPHP("All", "all")\' class="btn btn-dark mx-2 mb-2">' .
                $_SESSION['postFilterMsg'] .
                '<span aria-hidden="true" class="pl-3">&times;</span>
              </button>';
            };
          ?>
        <?php
          $Get_posts = new Get_posts();
          echo $Get_posts->return_html($loggedBool, 'all');
        ?>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="sureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content border border-dark">
        <div class="modal-header bg-gray border-dark">
          <h5 class="modal-title text-info">Are you sure ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>

        <div class="py-4 modal-body text-light bg-gray">
          Are you sure you want to remove this posts ?
        </div>

        <div class="modal-footer bg-gray border-dark">
          <button type="button" class="btn btn-info" data-dismiss="modal">
            No stay
          </button>
          <button type="button" class="btn btn-danger sure_button" data-dismiss="modal">
            Yes remove
          </button>
        </div>
      </div>
    </div>
  </div>

  <?php
    require_once 'php/parts_of_a_website/footer.php';
    echo ($loggedBool) ? '<script src="js/auto_sign_out.js"></script>' : '';
  ?>
  <script src="js/query_to_PHP.js"></script>
</body>
</html>
