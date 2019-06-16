<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <title>Document</title>
  <link rel='stylesheet' href='style/style.css'>
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
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">About</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class='container-fluid row px-0 mx-auto text-light'>
    <div class='w-100 mx-0 row py-5 justify-content-around'>

      <div class='loginWindow p-5 bg-dark rounded'>
        <p class='h4 text-info'>Welcome back!</p>
        <p class='pb-4 text-muted'>We're so excited to see you again!</p>

        <form action='php/login/login.php' method='post' class='col-sm-12 mx-auto'>
          <p class="p-1 m-0 text-left text-muted">Email</p>
          <input type="text" name="username" autofocus
            class='mx-auto mb-3 form-control bg-dark border-info text-light'>

          <p class="p-1 m-0 text-left text-muted">Password</p>
          <input type="password" name="password"
            class='mx-auto form-control bg-dark border-info text-light'>

          <a class="w-100 px-1 mb-2 btn bg-transparent text-left text-info"
            href="#">You forgot password ?</a>
          <input type="submit" value="Sign in" class='w-100 px-5 my-1 btn btn-info'>

          <div class="w-100 px-1 bg-transparent text-left">
            <span class='text-muted'>You haven't an account?</span>
            <a href='#' class='btn text-info px-0'>Register</a>
          </div>
        </form>
      </div>

    </div>
  </main>
  <?php require_once 'php/parts_of_a_website/footer.php'; ?>
  <?php if($loginBool) echo '<script src="js/auto_sign_out.js"></script>'; ?>
</body>
</html>
