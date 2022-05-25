<?php 
include 'Connection.php';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(empty($_POST['name']))
    {
        $Username_error = "Please Enter The Name.";
    }
    else if(empty($_POST['desc']))
    {
        $Desc_error = "Please Enter The Description.";
    }
    else if(empty($_POST['price']))
    {
        $Price_error = "Please Enter The Price.";
    }
    else
    {
        $file=$_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName= $_FILES['file']['tmp_name'];
        $fileSize= $_FILES['file']['size'];   
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'images/'.$fileNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $qu = "insert into `products` (Name, Description, Price, image) values('$name', '$desc', '$price', '$fileNameNew')";
        mysqli_query($conn, $qu);
        function function_alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        function_alert("We welcome the New World");
        header("location:AddProduct.php");
        
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
                <h1 class="tech-title">Add New Product</h1>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label >Name</label>
                                <input type="text" name="name" class="form-control cust-txt" placeholder="Enter Product Name">
                                <label style="color: red;"><?php if(isset($Username_error)) echo $Username_error ?></label>
                            </div>
                            <div class="col-sm-6">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control cust-txt" placeholder="Enter Product Price e.g: 150 L.E">
                                <label style="color: red;" ><?php if(isset($Price_error)) echo $Price_error ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Description</label>
                        <input type="text" name="desc" class="form-control cust-txt" placeholder="Enter Product Description">
                        <label style="color: red;"><?php if(isset($Desc_error)) echo $Desc_error ?></label>
                    </div>
                    <div class="col-sm-6">
                        <label>Image</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label style="color: green;"><?php if(isset($success)) echo $success ?></label>
                        
                    </div>
                    <div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 cust-div">
                            <input type="submit" name="submit" class="btn btn-secondary cst-btn" value="Add Product">
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