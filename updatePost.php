<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
 header("location:login.php");
}
      if (isset($_FILES['blogimage'])) {
          $postID = $_POST['postID'];
          $upd_blogimage = $_POST['blogimage'];
          $blogtitle = $_POST['blogtitle'];
          $blogdescription = $_POST['blogdescription'];
          $blogcategory = $_POST['blogcategory'];

          /*$data = array(
            'postID' => $postID,
            'upd_blogimage' => $upd_blogimage,
            'blogtitle' => $blogtitle,
            'blogdescription' => $blogdescription,
            'blogcategory' => $blogcategory
          );
          print_r($data);
          exit();*/
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

              $imagepath = explode('/', $upd_blogimage);

              $image = $imagepath[6];

              $full_url= $path.'/'.'V.U.W/blogimg/'.$filename;
              $id = $_SESSION['user_id'];
              $sql = "UPDATE blogpost
              SET blogtitle = '$blogtitle', blogdescription = '$blogdescription', blogcategory = '$blogcategory', blogimage = '$full_url' 
              WHERE postID = '$postID'";

              unlink("blogimg/" .$image);


              $query = $connect ->query($sql);
              if ($query) {
                header('Location:blogPlatform.php');
              }

            }
          }
      }
?>