<!--
//login.php

!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:messagePlatform1.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM login2 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if($row["password"])
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['username']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("location:messagePlatform1.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
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
              <li class="nav-item" ><a class="nav-link" href="index.html">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Register</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="registerTutor.html">As Tutor</a></li>
                  <li class="nav-item"><a class="nav-link" href="registerStudent.html">As Student</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================--> 
  <div class="section_gap registration_area" >
        <div class="container" align="center">
   <div class="register_form">
   <h3 align="center">LOGIN</a></h3><br />
   <div class="panel panel-default">
      <div class="panel-heading">access your account to enjoy our Service</div>
    <div class="panel-body">
     <form method="post">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <input type="text" name="username" class="form-control" required placeholder="Enter userName" />
      </div>
      <div class="form-group">
       <input type="password" name="password" class="form-control" required placeholder="Enter Password"/>
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="Access Account" />
      </div>
     </form>
    </div>
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
            <li><a href="adminlog.html">Tutor allocation</a></li>
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

