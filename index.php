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
      <div class='w-100 mx-0 row justify-content-around'>
         <div class='col-lg-11 p-4 border rounded border-dark bg-navy-blue'>
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselIndicators" data-slide-to="4"></li>
               </ol>
               <div class="carousel-inner slider_height">
                  <div class="w-100 h-100 carousel-item active">
                     <div class="h-100 d-flex align-items-center">
                        <h1 class="w-100 text-center">CODE 0</h1>
                     </div>
                  </div>
                  <div class="w-100 h-100 carousel-item">
                     <div class="h-100 d-flex align-items-center">
                        <h1 class="w-100 text-center">CODE 1</h1>
                     </div>
                  </div>
                  <div class="w-100 h-100 carousel-item">
                     <div class="h-100 d-flex align-items-center">
                        <h1 class="w-100 text-center">CODE 2</h1>
                     </div>
                  </div>
                  <div class="w-100 h-100 carousel-item">
                     <div class="h-100 d-flex align-items-center">
                        <h1 class="w-100 text-center">CODE 3</h1>
                     </div>
                  </div>
                  <div class="w-100 h-100 carousel-item">
                     <div class="h-100 d-flex align-items-center">
                        <h1 class="w-100 text-center">CODE 4</h1>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>

      <div class='w-100 mx-0 py-3 row justify-content-around'>
         <div class='col-md-11 p-4 my-5 border rounded border-dark bg-navy-blue'>
            a
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
