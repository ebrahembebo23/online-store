<?php 
include 'Connection.php';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(empty($_POST['name']))
    {
        $name_error = "Please Enter The Name.";
    }
    else if(empty($_POST['email']))
    {
        $email_error = "Please Enter The Email.";
    }
    else if(empty($_POST['mob']))
    {
        $mob_error = "Please Enter The Mobile Phone.";
    }
    else if(empty($_POST['prob']))
    {
        $problem_error = "Please Enter The Problem.";
    }
    else
    {  
        $name = $_POST['name'];
        $usern = $_POST['username'];
        $email = $_POST['email'];
        $mob = $_POST['mob'];
        $problem = $_POST['prob'];
        $qu = "INSERT INTO `support`( `name`, `email`, `mobile`, `Problem`) 
        VALUES ('$name','$email','$mob','$problem')";
        mysqli_query($conn, $qu);
        header("location:index.php");
    }
}
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
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesoeet" href="css/owl.theme.default.min.css">
    <link rel="stylesoeet" href="css/style.css">
</head>
<body>
    <form class="sec" method="post" auto_complete="off" action="" enctype="multipart/form-data">
    <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Report Problem</p>
                      <form class="mx-1 mx-md-4" method="post">
                      <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name="name" id="form3Example1c" class="form-control" />
                            <label class="form-label" for="form3Example1c">Full Name</label>
                            <label class="form-label" style="color: red;" for="form3Example1c"><?php if(isset($name_error)) echo $name_error ?></label>
                          </div>
                          </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="form3Example3c" class="form-control" />
                            <label class="form-label" for="form3Example3c">Your Email</label>
                            <label class="form-label" style="color: red;" for="form3Example1c"><?php if(isset($email_error)) echo $email_error ?></label>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="number" name="mob" id="form3Example3c" class="form-control" />
                            <label class="form-label" for="form3Example3c">Your Phone</label>
                            <label class="form-label" style="color: red;" for="form3Example1c"><?php if(isset($mob_error)) echo $mob_error ?></label>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          
                          <div class="form-outline flex-fill mb-0">
                            <textarea name="prob" id="form3Example4c" class="form-control"></textarea>
                            <label class="form-label" for="form3Example4c">Your Problem</label>
                            <label class="form-label" style="color: red;" for="form3Example1c"><?php if(isset($problem_error)) echo $problem_error ?></label>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          
                          <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Go To </label>
                            <a href="index.php">Home Page</a>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <input type="submit" value="Report" class="btn btn-primary btn-lg">
                        </div>
                      </form>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img style="border-radius: 50px;" src="https://support.cc/images/blog/importance-of-customer-service.png" class="img-fluid" alt="Sample image">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
</body>
</html>