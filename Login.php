<?php 
include 'Connection.php';
session_start();
$_SESSION['Name'] = null;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    if(empty($_POST['username']))
    {
        $username_error = "Please Enter The User Name.";
    }
    else if(empty($_POST['password']))
    {
        $password_error = "Please Enter The Password.";
    }
    else
    {  
        
        $usern = $_POST['username'];
        $password = $_POST['password'];
        $s = "Select * from `users` where username = '$usern' && password = '$password'";
        $res = mysqli_query($conn, $s);
        $num = mysqli_num_rows($res);
        $row = mysqli_fetch_array($res);
        if($num == 1)
        {
            $_SESSION['Name'] = $row['Name'];
            header("location:index.php");
        }
        else
        {
            $username_error = "invalid user";
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
                <h1 class="tech-title">Login Form</h1>
                <div class="row">
                    <div class="col-sm-12 cust-div2">
                            <div class="col-sm-6">
                                <label class="form-label" for="form3Example1c">User Name</label>
                                <input type="text" name="username" id="form3Example1c" class="form-control" />
                                <label class="form-label" style="color: red;" for="form3Example1c">
                                    <?php if(isset($username_error)) echo $username_error ?>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="form3Example4c">Password</label>
                                <input type="password" name="password" id="form3Example4c" class="form-control" />
                            </div> 
                        </div>
                        
                        <div class="col-sm-6 cust-div2">
                        <label class="form-label" for="form3Example1c">Don't Have an Account?</label>
                            <a href="Regestration.php">Regestration</a>
                        </div>
                        <div class="col-sm-6 cust-div2">
                        <label class="form-label" for="form3Example1c">Go To </label>
                                <a href="index.php">Home Page</a>
                        </div>
                       
                    <div class="row">
                        <div class="col-sm-12 cust-div">
                            <input type="submit" value="Login" class="btn btn-primary btn-lg">
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