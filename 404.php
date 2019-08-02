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

  <header class='container-fluid row mx-0 text-center bg-navy-blue'>
    <h3 class='w-100 text-info pt-5 mt-5'>404 Page not found</h3>
    <p class='w-100 text-info'>
      The page you were looking for doesn't exist or an other error occurred.
      <br>
      Go back, or head over to
      <a href='index.php' class='text-info'>database.com</a>
      to choose a new direction.
    </p>
  </header>

  <main class='container-fluid row mx-auto text-light bg-navy-blue'>
    <div class="mx-auto my-auto rounded-circle">
      <div class="lds-dual-ring"></div>
    </div>
  </main>

  <?php
    require_once 'php/parts_of_a_website/footer.php';
    if($loggedBool) {
      echo '<script src="js/auto_sign_out.js"></script>';
    }
  ?>
</body>
</html>
