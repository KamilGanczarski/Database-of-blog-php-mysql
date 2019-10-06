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

  <main class='bg-gray'>
    <div class='w-100 mx-0 row py-3 justify-content-around'>
      <div class='col-sm-12 col-lg-3 p-4 mt-3 text-left border rounded border-dark bg-navy-blue'>
        <?php require_once 'php/parts_of_a_website/post_sort.php'; ?>

        <div class='py-2 text-left border rounded border-dark'>
          <?php
            require_once 'php/blog_configuration/get_posts.php';
            $Get_posts = new Get_posts();
            echo $Get_posts->return($logged_bool, 'title');
          ?>
        </div>
      </div>

      <div class='col-sm-12 col-lg-8 p-0 mt-3'>
        <?php
          if(isset($_SESSION['postFilterMsg']) && $_SESSION['postFilterMsg'] !== '') {
            echo '<button onclick=\'query_to_PHP("All", "all")\' class="btn btn-sm btn-dark mx-2 mb-2">' .
              $_SESSION['postFilterMsg'] .
              '<span aria-hidden="true" class="pl-2">&times;</span>
            </button>';
          } else if(isset($_SESSION['postFilterMsg']) && $_SESSION['postFilterMsg'] !== '') {
            echo '<button onclick=\'query_to_PHP("All", "all")\' class="btn btn-sm btn-dark mx-2 mb-2">' .
              $_SESSION['postFilterMsg'] .
              '<span aria-hidden="true" class="pl-2">&times;</span>
            </button>';
          }
        ?>
        <?php
          echo $Get_posts->return($logged_bool, 'all');
        ?>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div id='sureModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' class='modal fade'>
    <div role='document' class='modal-dialog modal-md modal-dialog-centered'>
      <div class='modal-content border border-dark'>
        <div class='modal-header bg-gray border-dark'>
          <h5 class='modal-title text-info'>Are you sure ?</h5>
          <button type='button' data-dismiss='modal' aria-label='Close' class='close'>
            <span aria-hidden='true' class='text-white'>&times;</span>
          </button>
        </div>

        <div class='py-4 modal-body text-light bg-gray'>
          Are you sure you want to remove this posts ?
        </div>

        <div class='modal-footer bg-gray border-dark'>
          <button type='button' data-dismiss='modal' class='btn btn-info'>
            No stay
          </button>
          <button type='button' data-dismiss='modal' class='btn btn-danger sure_button'>
            Yes remove
          </button>
        </div>
      </div>
    </div>
  </div>

  <?php
    require_once 'php/parts_of_a_website/footer.php';
    echo ($logged_bool) ? '<script src="js/auto_sign_out.js"></script>' : '';
  ?>
  <script src='js/query_to_PHP.js'></script>
</body>
</html>
