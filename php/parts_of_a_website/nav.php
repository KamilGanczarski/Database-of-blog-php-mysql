<header>
    <nav class='w-100 px-3 navbar navbar-expand-lg navbar-dark bg-navy-blue'>
      <a href='index.php' class='navbar-brand btn bg-transparent text-info'>Home</a>
      <button data-toggle='collapse' data-target='#navbar' aria-controls='navbar' aria-expanded='false' aria-label='Toggle navigation' class='navbar-toggler btn bg-transparent'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <div class='collapse navbar-collapse' id='navbar'>
        <ul class='navbar-nav mr-auto justify-content-end'>
          <li class='nav-item active my-auto'>
            <form action='php/blog_configuration/sort_posts.php' method='get' class='form-inline py-3 py-lg-0'>
              <input type='search' name='searchValue' placeholder='Search' value='<?php if(isset($_SESSION['searchValue'])) echo $_SESSION['searchValue'] ?>'
                class='form-control form-control-sm w-100 mr-sm-2 bg-dark border-0 text-light formSearchInput'>
              <div class='inputWidth'></div>
              <input type='text' name='postFilter' value='form' class='postFilter d-none'>
              <input type='submit' class='d-none'>
            </form>
          </li>
          <li class='nav-item active'>
            <a class='w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light'
              href='index.php'>News</a>
          </li>
          <?php if($logged_bool) echo '<li class="nav-item active">
            <a class="w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light"
              href="add_post.php">Add post</a>
          </li>'; ?>
          <li class='nav-item active'>
            <a class='w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light'
              href='documentation.php'>Documentation</a>
          </li>
          <li class='nav-item active'>
            <a class='w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light'
              href='index.php'>About</a>
          </li>
          <li class='nav-item active'>
            <a class='w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left text-light'
              href='index.php'>Help</a>
          </li>
        </ul>
        <ul class='navbar-nav ml-auto justify-content-end'>
          <li class="nav-item active d-none <?php if($logged_bool) echo 'd-lg-block'; ?>">
            <button data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'
              class='px-3 nav-link btn text-left dropdown-toggle'>
              <?php if($logged_bool) echo $username; ?>
            </button>
            <div class='dropdown-menu dropdown-menu-right bg-dark'>
              <a href='index.php' class='d-block btn btn-sm btn-dark px-4 w-100 text-left'>Help</a>
              <a href='index.php' class='d-block btn btn-sm btn-dark px-4 w-100 text-left'>Accout settings</a>
              <a href='index.php' class='d-block btn btn-sm btn-dark px-4 w-100 text-left'>Your posts</a>
              <a href='add_post.php' class='d-block btn btn-sm btn-dark px-4 w-100 text-left'>Add post</a>
              <a href='php/login/logout.php' class='d-block btn btn-sm btn-dark px-4 w-100 text-left'>Sign out</a>
            </div>
          </li>
          <li class="nav-item active d-none <?php if(!$logged_bool) echo 'd-lg-block'; ?>">
            <a href='login.php' class='px-3 btn bg-transparent text-left text-light'>sign in</a>
          </li>
          <li class="nav-item active <?php if($logged_bool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class='w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light'
              href='index.php'>Accout settings</a>
          </li>
          <li class="nav-item active <?php if(!$logged_bool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class='w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light'
              href='login.php'>Sign in</a>
          </li>
          <li class="nav-item active <?php if($logged_bool) echo 'd-lg-none'; else echo 'd-none' ?>">
            <a class='w-100 px-3 py-3 btn btn-sm bg-transparent text-left text-light'
              href='php/login/logout.php'>Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  