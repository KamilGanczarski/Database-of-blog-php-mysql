<?php
  session_start();
  $username = 'user';
  $user_id = 0;
  $logged_bool = false;
  $msg = '';
  $msg_bool = false;
  if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $user_id = $_SESSION['user_id'];
    $logged_bool = true;
  } else {
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
    <div class="px-4 mx-0 <?php echo ($msg_bool) ? 'd-block' : 'd-none'; ?>">
      <div class='w-50 alert alert-danger alert-dismissible fade show text-left mx-auto my-0' role='alert'>
        <?php echo ($msg_bool) ? $msg : ''; ?>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    </div>

    <div class='w-100 px-lg-4 py-4 mx-0 pb-5 row justify-content-around'>
      <div class='col-sm-12 bg-navy-blue p-4'>
        <p class='h5 text-info'>Create post</p>

        <form action='php/blog_configuration/add_post.php' method='post' id='add_post'>
          <div class='w-100 m-0 p-0 row justify-content-between'>
            <div class='col-sm-8 p-0'>
              <p class='p-1 m-0 text-muted'>Post title</p>
              <input type='text' name='post_title' maxlength='255'
                class='mb-3 form-control form-control-sm bg-dark border-dark text-light'>
            </div>
            <div class='col-sm-3 p-0 mb-3'>
              <p class='p-1 m-0 text-muted'>Post type</p>
              <select name='typeof_id' class='w-100 form-control form-control-sm form-control-dark'>
                <?php
                  require_once 'php/blog_configuration/get_posts.php';
                  $Get_posts = new Get_posts();
                  echo $Get_posts->return('false', 'option_types');
                ?>
              </select>
            </div>
          </div>
          <p class='p-1 m-0 text-muted'>Post content</p>
          <textarea form='add_post' name='post_content' rows='13'
            class='w-100 p-2 bg-dark border-dark text-light'></textarea>
          <div class='w-100 text-right'>
            <input type='submit' value='Create' class='px-5 my-1 btn btn-info'>
          </div>
        </form>
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
