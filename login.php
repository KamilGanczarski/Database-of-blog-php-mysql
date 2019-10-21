<?php
  session_start();
  $username = 'user';
  $user_id = 0;
  $logged_bool = false;
  $msg = '';
  $msg_bool = false;
  if(isset($_SESSION['login'])) {
    header('Location: index.php');
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

  <main class='bg-gray'>
    <div class='container-fluid row px-0 py-5 mx-auto text-light'>
      <div class="mx-auto <?php echo ($msg_bool) ? 'd-block' : 'd-none'; ?>">
        <div class='loginWindowW alert alert-danger alert-dismissible fade show' role='alert'>
          <?php echo ($msg_bool) ? $msg : ''; ?>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
      </div>

      <div class='w-100 mx-0 row justify-content-around'>
        <div class='loginWindowW loginWindowH p-5 bg-navy-blue rounded border border-dark'>
          <p class='h4 text-info'>Welcome back!</p>
          <p class='pb-4 text-muted'>We're so excited to see you again!</p>

          <form action='php/login/login.php' method='post' class='col-sm-12 mx-auto'>
            <p class='p-1 m-0 text-muted'>Email</p>
            <input type='text' name='username' id='username' autofocus
              class='mx-auto mb-3 form-control bg-dark border-dark text-light'>

            <p class='p-1 m-0 text-muted'>Password</p>
            <input type='password' name='password' id='password'
              class='mx-auto form-control bg-dark border-dark text-light'>

            <a class='w-100 px-1 mb-2 btn text-left text-info'
              href='login.php'>You forgot password ?</a>
            <input type='submit' id='submit' value='Sign in' class='w-100 px-5 my-1 btn btn-info'>

            <div class='w-100 px-1'>
              <span class='text-muted'>You haven't an account?</span>
              <a href='login.php' class='btn text-info px-0'>Register</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  
  <?php require_once 'php/parts_of_a_website/footer.php'; ?>
</body>
</html>
