<?php
  session_start();
  $username = 'user';
  $user_id = 0;
  $logged_bool = false;
  if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $user_id = $_SESSION['user_id'];
    $logged_bool = true;
  }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php require_once 'php/parts_of_a_website/head.php'; ?>
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
    <div class='mx-auto my-auto rounded-circle'>
      <div class='lds-dual-ring'></div>
    </div>
  </main>

  <?php
    require_once 'php/parts_of_a_website/footer.php';
    if($logged_bool) {
      echo '<script src="js/auto_sign_out.js"></script>';
    }
  ?>
</body>
</html>
