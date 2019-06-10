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
    <nav class="w-100 navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand btn bg-transparent text-info" href="index.php">Home</a>
      <button class="navbar-toggler btn bg-transparent" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto justify-content-end">
          <li class="nav-item active my-auto">
            <form class="form-inline py-3 py-lg-0" action='index.php' method='get'>
              <input class="form-control w-100 mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <input class="d-none" type="submit">
            </form>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">About</a>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">Repository</a>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">Setting</a>
          </li>
          <li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 nav-link btn bg-transparent text-left"
              href="#">News</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto justify-content-end">
          <li class="nav-item active d-none d-lg-block">
            <button class="px-3 nav-link btn btn-sm bg-info text-left dropdown-toggle"
              href="#" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">User</button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="btn btn-light w-100 text-left" href="#">Help</a>
                <a class="btn btn-light w-100 text-left" href="#">Accout settings</a>
                <a class="btn btn-light w-100 text-left" href="#">Log out</a>
              </div>
          </li>
          <li class="nav-item active d-lg-none">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="#">Help</a>
          </li>
          <li class="nav-item active d-lg-none">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="#">Accout settings</a>
          </li>
          <li class="nav-item active d-lg-none">
            <a class="w-100 px-3 py-3 nav-link btn bg-transparent text-left"
              href="#">Log out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class='container-fluid row mx-auto text-light'>

    <div class='w-100 mx-0 row py-5 justify-content-around'>
      <div class='col-sm-10 col-md-8 col-lg-6 px-5 py-5 bg-dark'>
        <p class='py-4 h1'>&#9815;</p>
        <form action='login.php' method='post' class='col-sm-9 col-md-8 col-lg-7 mx-auto'>
          <input type="text" name="login" placeholder='username'
            class='mx-auto my-2 form-control'>
          <input type="password" name="password" placeholder='password'
            class='mx-auto my-2 form-control'>
          <input type="submit" value="log in" class='w-100 px-5 my-1 btn btn-info'>
        </form>
        <a class="px-3 my-3 btn bg-transparent text-left text-info"
          href="#">You forgot password ?</a>
      </div>
    </div>

  </main>

  <footer class='container-fluid mx-auto row' style='position: relative; bottom: 0;'>
    <div class="w-100 mx-0 row justify-content-center text-primary">
      <a class="px-3 py-2 btn bg-transparent text-left text-info"
        href="#">About</a>
      <a class="px-3 py-2 btn bg-transparent text-left text-info"
        href="#">Setting</a>
      <a class="px-3 py-2 btn bg-transparent text-left text-info"
        href="#">Contacts</a>
    </div>
    <p class='col-md-12 py-4 my-0 mx-auto text-info'>
      Page written in JavaScript and PHP
    </p>
  </footer>

  <script src='js/render.js'></script>
  <script src='js/resizePage.js'></script>
</body>
</html>
