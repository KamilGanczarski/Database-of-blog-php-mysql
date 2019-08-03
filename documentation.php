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

  <main>
    <div class='w-100 mx-0 row py-3 justify-content-around bg-gray'>
      <div class='col-sm-12 col-lg-3 p-4 mt-3 text-left border rounded border-dark bg-navy-blue'>
        <nav class="list-group" id="nav-list">
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-1">What’s included</a>
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-2">Page views</a>
          <a class="list-group-item list-group-item-secondary list-group-item-action" href="#list-item-3">Diagrams</a>
        </nav>
      </div>

      <div class='col-sm-12 col-lg-8 p-0 mt-3 scrollspy-example' data-spy="scroll" data-target="#nav-list" data-offset="0">
        <p class='h4 px-3 text-info' id="list-item-1">What’s included</p>
        <p class='px-3 text-light'>
          You’ll find the following directories and files,
          grouping common resources and providing both compiled and minified
          distribution files, as well as raw source files.
        </p>
        <pre class='px-5 border rounded border-dark bg-navy-blue text-light'>

source/
  ├── create_table_in_phpmyadmin/
  │     └── index.sql
  ├── js/
  │     ├── auto_sign_out.js
  │     ├── auto_sign_out.js
  │     ├── resize_page.js
        └──  Statistic_view.js
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

        <p class='h4 px-3 text-info' id="list-item-2">Page views</p>
        <p class='px-3 text-light'>
          Page views in last week
        </p>
        <div class='px-4 py-4 mb-3 border rounded border-dark bg-navy-blue text-light'>
          <script src='js/Statistic_view.js'></script>
          <canvas id='line_chart0' width="1000" height="500" class='w-100'></canvas>
          <script>
            function random_y() {
              return Math.ceil(Math.random()*12)*10;
            }

            let Line_chart0 = new Statistic_view(
              type = 'line_chart',
              id = 'line_chart0',
              data = [
                { label_x: 'January', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'February', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'March', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'April', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'May', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'June', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'July', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'August', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'September', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'October', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'November', y: random_y(), radius: 4, tip: 'The value is equal ' },
                { label_x: 'December', y: random_y(), radius: 4, tip: 'The value is equal ' },
              ]
            );
            Line_chart0.render();
          </script>
        </div>

        <p class='h4 px-3 text-info' id="list-item-3">Diagrams</p>
        <p class='px-3 text-light'></p>
        <div class='row m-0 px-5 py-5 border rounded border-dark bg-navy-blue text-light'>
          <div class="col-sm-10 col-md-8 col-lg-5 px-0 mx-auto" id='horizontal_bar_chart0'></div>
          <script>
            let Horizontal_bar_chart0 = new Statistic_view(
              type = 'horizontal_bar_chart',
              id = 'horizontal_bar_chart0',
              data = [
                { label: 'Views on different devices', x: 0 },
                { label: 'Desktop (2560x1600)', x: 20 },
                { label: 'Desktop (2560x1080)', x: 20 },
                { label: 'Desktop (1920x1080)', x: 60 },
                { label: 'Desktop (1440x900)', x: 50 },
                { label: 'Desktop (1366x768)', x: 40 },
                { label: 'Desktop (1280x800)', x: 30 },
                { label: 'Tablet (1024x768)', x: 20 },
                { label: 'Tablet (768x1024)', x: 20 },
                { label: 'Phone (720x450)', x: 20 },
                { label: 'Phone (320x480)', x: 20 }
              ]);
            Horizontal_bar_chart0.render();
          </script>

          <div class="col-sm-10 col-md-8 col-lg-5 px-0 mx-auto" id='horizontal_bar_chart1'></div>
          <script>
            let Horizontal_bar_chart1 = new Statistic_view(
              type = 'horizontal_bar_chart',
              id = 'horizontal_bar_chart1',
              data = [
                { label: 'Views on different devices', x: 0 },
                { label: 'Desktop (2560x1600)', x: 20 },
                { label: 'Desktop (2560x1080)', x: 20 },
                { label: 'Desktop (1920x1080)', x: 60 },
                { label: 'Desktop (1440x900)', x: 50 },
                { label: 'Desktop (1366x768)', x: 40 },
                { label: 'Desktop (1280x800)', x: 30 },
                { label: 'Tablet (1024x768)', x: 20 },
                { label: 'Tablet (768x1024)', x: 20 },
                { label: 'Phone (720x450)', x: 20 },
                { label: 'Phone (320x480)', x: 20 }
              ]);
            Horizontal_bar_chart1.render();
          </script>
        </div>

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
