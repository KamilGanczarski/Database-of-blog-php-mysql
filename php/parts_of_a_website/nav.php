<header>
    <nav class='w-100 px-3 navbar navbar-expand-lg navbar-dark bg-navy-blue fixed-top navbar_fixed'>
      <a href='index.php' class='navbar-brand btn bg-transparent text-info'>Home</a>
      <button data-toggle='collapse' data-target='#navbar' aria-controls='navbar' aria-expanded='false' aria-label='Toggle navigation' class='navbar-toggler btn bg-transparent'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <div class='collapse navbar-collapse' id='navbar'>
        <ul class='navbar-nav mr-auto justify-content-end'>
          <li class='nav-item active my-auto'>
            <form action='php/blog_configuration/sort_posts.php' method='get' class='form-inline py-3 py-lg-0'>
              <input type='search' name='search_value' placeholder='Search' value='<?php if(isset($_SESSION['search_value'])) echo $_SESSION['search_value'] ?>'
                class='form-control form-control-sm w-100 mr-sm-2 bg-dark border-0 text-light formSearchInput'>
              <div class='inputWidth'></div>
              <input type='text' name='search_filter' value='form' class='search_filter d-none'>
              <input type='submit' class='d-none'>
            </form>
          </li>
          <li class='nav-item active'>
            <a class='w-100 px-3 py-3 py-lg-2 btn btn-sm bg-transparent text-left hover-blue'
              href='news.php'>News</a>
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
          <li class="nav-item active d-none <?php if($logged_bool) echo 'd-block'; ?>">
            <div class="dropdown">
              <a data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'
                class='px-3 nav-link btn text-left dropdown-toggle'>
                <?php if($logged_bool) echo $username; ?>
              </a>
              <div class='dropdown-menu dropdown-menu-right bg-navy-blue border-0'>
                <a href='index.php' class='d-block btn btn-sm bg-navy-blue px-4 py-3 py-lg-2 w-100 text-left hover-blue'>
                  Accout settings</a>
                <a href='news.php' class='d-block btn btn-sm bg-navy-blue px-4 py-3 py-lg-2 w-100 text-left hover-blue'>
                  Your posts</a>
                <a href='add_post.php' class='btn btn-sm bg-navy-blue px-4 py-3 py-lg-2 w-100 text-left hover-blue'>
                  Add post</a>
                <a href='php/login/logout.php' class='btn btn-sm bg-navy-blue px-4 py-3 py-lg-2 w-100 text-left hover-blue'>
                  Sign out</a>
              </div>
            </div>
          </li>
          <li class="nav-item active d-none <?php if(!$logged_bool) echo 'd-block'; ?>">
            <a href='login.php' class='px-3 btn bg-transparent text-left text-light'>sign in</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="w-100 py-5 bg-gray"></div>
    <script>
      // Add slideDown animation to Bootstrap dropdown when expanding.
      $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
      });

      // Add slideUp animation to Bootstrap dropdown when collapsing.
      $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
      });
    </script>
  </header>
  