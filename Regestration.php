<?php 
include 'Connection.php';
session_start();
$_SESSION['Name'] = null;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(empty($_POST['name']))
    {
        $name_error = "Please Enter The Name.";
    }
    else if(empty($_POST['username']))
    {
        $username_error = "Please Enter The User Name.";
    }
    else if(empty($_POST['email']))
    {
        $email_error = "Please Enter The Email.";
    }
    else if(empty($_POST['mob']))
    {
        $mob_error = "Please Enter The Mobile Phone.";
    }
    else if(empty($_POST['password']))
    {
        $password_error = "Please Enter The Password.";
    }
    else
    {  
        $name = $_POST['name'];
        $usern = $_POST['username'];
        $email = $_POST['email'];
        $mob = $_POST['mob'];
        $password = $_POST['password'];
        $s = "Select * from `users` where username = '$usern'";
        $res = mysqli_query($conn, $s);
        $num = mysqli_num_rows($res);
        if ($num == 1)
        {
            $username_error = "Username Alraedy Taken";
        }
        else
        {
        $qu = "INSERT INTO `users`( `Name`, `username`, `password`, `email`, `mobile`) 
        VALUES ('$name','$usern','$password','$email','$mob')";
        mysqli_query($conn, $qu);
        $_SESSION['Name']  = $name;
        header("location:index.php");
        }
        
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
        <div class="form-div">
            <div class="container">
                <h1 class="tech-title">Regestration Form</h1>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="form3Example1c">Full Name</label>
                                <input type="text" name="name" id="form3Example1c" class="form-control" />
                                
                                <label class="form-label" style="color: red;" for="form3Example1c">
                                    <?php if(isset($name_error)) echo $name_error ?>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="form3Example1c">User Name</label>
                                <input type="text" name="username" id="form3Example1c" class="form-control" />
                                <label class="form-label" style="color: red;" for="form3Example1c">
                                    <?php if(isset($username_error)) echo $username_error ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" />
                        
                        <label class="form-label" style="color: red;" for="form3Example1c">
                            <?php if(isset($email_error)) echo $email_error ?>
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="form3Example3c">Your Phone</label>
                        <input type="number" name="mob" id="form3Example3c" class="form-control" />
                        
                        <label class="form-label" style="color: red;" for="form3Example1c">
                            <?php if(isset($mob_error)) echo $mob_error ?>
                        </label>
                    </div>
                    
                        <div class="col-sm-6">
                            <label class="form-label" for="form3Example4c">Password</label>
                            <input type="password" name="password" id="form3Example4c" class="form-control" />
                            
                            <label class="form-label" style="color: red;" for="form3Example1c">
                                <?php if(isset($password_error)) echo $password_error ?>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="form3Example1c"></label>
                            <input type="submit" name="submit" class="btn btn-secondary cst-btn" value="Regester">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="form3Example1c">Alraedy Have an Account?</label>
                            <a href="Login.php">Login</a>
                        </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </form>
</body>

</html>