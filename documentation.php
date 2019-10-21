<?php
  session_start();
  $username = 'user';
  $user_id = 0;
  $logged_bool = false;
  $msg = '';
  $msg_bool = false;
  if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $user_id = $_SESSION['userId'];
    $logged_bool = true;
  }

  if(isset($_SESSION['msg'])) {
    $msg_bool = true;
    $msg = $_SESSION['msg'];
  }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php require_once 'php/parts_of_a_website/head.php'; ?>
</head>
<body>
  <?php require_once 'php/parts_of_a_website/nav.php'; ?>

  <main>
    <div class='w-100 mx-0 row py-3 justify-content-around bg-gray'>
      <div class='col-sm-12 col-lg-3 p-4 mt-3 text-left border rounded border-dark bg-navy-blue'>
        <nav class='list-group' id='nav-list'>
          <a class='list-group-item list-group-item-secondary list-group-item-action' href='#list-item-1'>What’s included</a>
          <a class='list-group-item list-group-item-secondary list-group-item-action' href='#list-item-2'>Page views</a>
          <a class='list-group-item list-group-item-secondary list-group-item-action' href='#list-item-3'>Diagrams</a>
        </nav>
      </div>

      <div data-spy='scroll' data-target='#nav-list' data-offset='0' class='col-sm-12 col-lg-8 p-0 mt-3 scrollspy-example'>
        <p class='h4 px-3 text-info' id='list-item-1'>What’s included</p>
        <p class='px-3 text-light'>
          You’ll find the following directories and files,
          grouping common resources and providing both compiled and minified
          distribution files, as well as raw source files.
        </p>
        <pre class='px-5 border rounded border-dark bg-navy-blue text-light'>

source/
  ├── create_table_in_phpmyadmin/
  │     └── Blog_system.sql
  ├── js/
  │     ├── auto_sign_out.js
  │     ├── query_to_PHP.js
  │     ├── resize_page.js
        └── Statistic_view.js
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
  |     |   ├── footer.php
  |     |   ├── head.php
  |     |   ├── nav.php
  |         └── post_sort.php
  ├── style/
  │   └── style.css
  ├── 404.php
  ├── add_post.php
  ├── documentation.php
  ├── index.php
  ├── LICENSE
  └── login.php
        </pre>

        <p class='h4 px-3 text-info' id='list-item-2'>Page views</p>
        <p class='px-3 text-light'>
          Page views in last week
        </p>
        <div class='px-4 py-4 mb-3 border rounded border-dark bg-navy-blue text-light'>
          <script src='js/Statistic_view.js'></script>
          <canvas id='line_chart0' width='1000' height='500' class='w-100'></canvas>
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

        <p class='h4 px-3 text-info' id='list-item-3'>Diagrams</p>
        <p class='px-3 text-light'></p>
        <div class='row m-0 px-5 py-5 border rounded border-dark bg-navy-blue text-light'>
          <div class='col-sm-10 col-md-8 col-lg-5 px-0 mx-auto' id='horizontal_bar_chart0'></div>
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

          <div class='col-sm-10 col-md-8 col-lg-5 px-0 mx-auto' id='horizontal_bar_chart1'></div>
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
    echo ($logged_bool) ? '<script src="js/auto_sign_out.js"></script>' : '';
  ?>
  <script src='js/query_to_PHP.js'></script>
</body>
</html>
