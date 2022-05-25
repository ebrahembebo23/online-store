<?php 
include 'Connection.php'
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Alarm Store</title>
      <meta name="description" content="Alarm store is store you can found any technology">
      <meta name="author" content="Alarm Store Developers Team">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="icon" href="images/icons8-alarm-32.png" type="image/gif" />
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="index.php">Home</a></li>
                           <li><a href="CustomerSupport.php">Customer Support</a></li>
                           <li><a href="Login.php">
                              <?php session_start(); if($_SESSION['Name'] == null) 
                                       echo "Login";
                                    else
                                       echo "Welcome, " ,$_SESSION['Name']; ?></a></li>
                           <li><a href="<?php if($_SESSION['Name'] == null) 
                                       echo "Regestration.php";
                                    else
                                       echo "Login.php"; ?>"><?php if($_SESSION['Name'] == null) 
                                       echo "Regestration";
                                    else
                                       echo "LogOut"; ?></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="logo_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="logo"><a href="index.html"><img src="images/logo.png" style="max-width: 10%;"></a></div>
               </div>
            </div>
         </div>
      </div>
      <form method="post">
      <div class="dropdown">
         <select class="btn btn-secondary dropdown-toggle" name="sort" id="dropdownMenuButton">
            <option class="dropdown-item" value="low" style="color: white;">Sorting By</option>
            <option class="dropdown-item" value="low" style="color: white;">Low Price</option>
            <option class="dropdown-item" value="high" style="color: white;">High Price</option>
         </select>
      </div>
      <div class="main">
         <div class="input-group">
            <input type="text" name="sech" class="form-control" placeholder="Search this site">
            <div class="input-group-append">
               <button class="btn btn-secondary" name="btnse" type="submit" style="background-color: #f26522; border-color:#f26522 ">
               <i class="fa fa-search"></i>
               </button>
            </div>
         </div>
         </form>
      </div>
      <?php
      if(isset($_POST['btnse']))
      {
         $myquery = "SELECT * FROM `products`";
         $result = mysqli_query($conn, $myquery); 
         $sch= $_POST['sech'];
         $sor= $_POST['sort'];
         if($sor == "high")
         {
            $myquery = "SELECT * FROM `products` where Name like '%$sch%' order by price desc";
            $result = mysqli_query($conn, $myquery); 
         }
         else if($sor == "low")
         {
            $myquery = "SELECT * FROM `products` where Name like '%$sch%' order by price Asc";
            $result = mysqli_query($conn, $myquery); 
         }
      }
      else
      {
         $myquery = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $myquery); 
      }
        ?>
      <div class="container">
         
         <div class="tech-sec">
         <h1 class="tech-title">Mobiles & Accessories</h1>
        
            <div class="row">
            <?php 
               while($row = mysqli_fetch_array($result))
               {
            ?>      
               <div class="col-lg-4 col-sm-4">
                  <div class="box_main">
                     <h4 class="name_text"><?php echo $row['Name'];?></h4>
                     <p class="price_text">Price  <span style="color: #262626;">L.E <?php echo $row['Price'];?></span></p>
                     <div class="prod_img"><img src="images/<?php echo $row['image'];?>"></div>
                     <div style="margin-bottom: 30px;"><p class="price_text">Description: <span style="color: #262626;"><?php echo $row['Description'];?></span></p></div>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.php"><img style="max-width: 10%;" src="images/Logo.png"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            </div class="copyright_section">
            <p class="copyright_text">copyright &copy all rights reserved <a href="#">Alarm Store Developers Team</a></p>
         </div>
      </div>
   </body>
</html>+