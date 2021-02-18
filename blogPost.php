
<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
 header("location:login.php");
}
      if (isset($_FILES['blogimage'])) {
        $blogtitle = $_POST['blogtitle'];
         $blogdescription = $_POST['blogdescription'];
          $blogcategory = $_POST['blogcategory'];
          if ($blogtitle !="" && $blogdescription !="" && $blogcategory !="") {
            $upload = 1;
            $filename = $_FILES['blogimage']['name'];
            $filesize = $_FILES['blogimage']['size'];
            $filetmp = $_FILES['blogimage']['tmp_name'];
            $filetype = $_FILES['blogimage']['type'];
            $targetdir = "blogimg/";
            $targetfile = $targetdir .basename($_FILES['blogimage']['name']);
            $check = getimagesize($_FILES['blogimage']['tmp_name']);

            $fileexist = strtolower(end(explode('.', $_FILES['blogimage']['name'])));
            $extension = array("jpeg", "jpg", "png");
            if (in_array($fileexist, $extension) == false ) {
              $msg = "Please choose image again";
            }
            if (file_exists($targetfile)) {
              $msg = "Sorry! file exists";
            }
            if ($check == false) {
              $msg = "file not image";
            }
            if (empty($msg) == true) {
              move_uploaded_file($filetmp, "blogimg/" . $filename);
              $url = $_SERVER['HTTP_REFERER'];
              $seg = explode('/', $url);
              $path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
              $full_url= $path.'/'.'V.U.W/blogimg/'.$filename;
              $id = $_SESSION['user_id'];
              $sql = "INSERT INTO blogpost(blogtitle,blogdescription,blogcategory,blogimage)
              VALUES('$blogtitle', '$blogdescription', '$blogcategory', '$full_url')";
              $query = $connect ->query($sql);
              if ($query) {
                header('Location:blogPlatform.php');
              }

            }
          }
      }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/icon1.png" type="image/png">
  <title>Vintage University E-Tutoring WEB</title> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
   <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="vendors/animate-css/animate.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css">
    </head>  
    <body>  
      <!--=== Start Header Menu Area ===-->
  <header class="header_area">
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-sm-6 col-4 header-top-left">
            <a href="">
              <span class="lnr lnr-phone"></span>
              <span class="text">
                <span class="text">+(254)708855234</span>
              </span>
            </a>
            <a href="">
              <span class="lnr lnr-envelope"></span>
              <span class="text">
                <span class="text">info@vintageuniversity.ac.ke</span>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="main_menu">

      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="login.php">Communication</a></li>
              <li class="nav-item"><a class="nav-link" href="blogPlatform.php">Blog Dashboard</a></li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->
 
  <div class="section_gap registration_area" >
        <div class="container">
          <div class="register_form"> 
   <div class="table-responsive">
    <h4 align="center">Blog Post</h4>
    <p align="right"><?php echo $_SESSION['username'];  ?> - <a href="logout.php">Logout</a></p>
    <form method="POST" action="blogPost.php" enctype="multipart/form-data">
      <div class="form-group">
       <input type="text" name="blogtitle" class="form-control" required placeholder="Enter Blog Title" />
      </div>
      <div class="form-group">
        <textarea class="form-control" name="blogdescription" id="blogdescription" rows="5" required="" placeholder="Enter description"></textarea>
      </div>
      <div class="form-group">
        <select name="blogcategory" class="form-control">
          <option>Select Category</option>
          <option value="Design">Design</option>
          <option value="Buisness">Buisness</option>
          <option value="literature">literature</option>
          <option value="Software">Software</option>
          <option value="Languages">Languages</option>
          <option value="Coaching">Coaching</option>
          <option value="Not Included">Not on List</option>
        </select>
      </div>
      <div class="form-group">
       <input type="file" name="blogimage" class="form-control" required placeholder="Select Featured Image" />
      </div>
      <div class="form-group">
       <input type="submit" name="post" class="btn btn-info" value="Add Post" />
       <br><br>
       <button type="reset" class="btn btn-info">Cancel</button>
      </div>
     </form>
   </div>
  </div>
</div>
</div>
<!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="docupload.php">Doucuments & Source Files</a></li>
                        <li><a href="#">Student Data</a></li>

                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4> Top Products</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Terms/Conditions</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    
                </div>
                <div class="col-lg-4 col-md-6 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers.You shall receive an email from our Desk.</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form
                         method="POST" class="form-inline" action="sendEmail.php">
                            <input class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'"
                             required="" type="email">
                             <input class="form-control" name="time" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'time'"
                             required="" type="hidden" >
                            <button class="click-btn btn btn-default" name="sendmail" type="submit">
                                <span>subscribe</span>
                            </button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2020 All rights reserved | by <a href="#">Mihir,Ndugire,Mital,Ruth,Cleaveland</a></p>
                <div class="col-lg-4 col-sm-12 footer-social">
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->
</body>

</html>
    </body>  
</html>  


<script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
  fetch_group_chat_history();
 }, 3000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }
});  
</script>
