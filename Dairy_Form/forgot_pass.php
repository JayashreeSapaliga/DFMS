<?php
    
    session_start();
    if(isset($_SESSION["User"]))
    {
            header("location:dashboard.php");
    }
    include("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>DAIRY FORM SHOP MANAGEMENT SYSTEM</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <h1 class=" text-center text-white">Dairy Farm Shop Management System</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex" style="background: url('img/1.jpg');width: 50%;background-size: cover;">
                        <!-- Background image for card set in CSS! -->
                        <!-- <img src="img/1.jpg"> -->
                    </div>
                    <div class="card-body">
                        <h5 class=" text-center text-primary mb-4">Forgot Password</h5>
                        <form class="form-signin" method="post">
                            <div class="form-label-group">
                            <label for="inputUserame"><i class="fas fa-user"></i>Username</label>
                                <input type="email" id="Username" name="Username" class="form-control" placeholder="Enter Username" value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; }?>" required>
                            </div>

                            <hr>

                            <div class="form-label-group">
                            <label for="inputPassword"><i class="fas fa-lock"></i>Enter your Phone number</label>
                                <input type="number" id="Password" name="Password" class="form-control" placeholder="Enter Password"  required>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase my-4" type="submit" name="submit">Submit</button>
                            <a class="btn btn-lg btn-secondary btn-block text-uppercase my-4" href="index.php">Back To Sign In</a>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php

        if(isset($_POST["submit"])) {
            $user = $_POST["Username"];
            $password = $_POST["Password"];

            if ($user && $password) {
                
                $result = mysqli_query($mysql, "SELECT * FROM admin WHERE Email='$user' and Phone_no='$password'");
            
                $row = mysqli_fetch_array($result);
                
                if ($row[0]) {
                   
                    mysqli_query($mysql, "UPDATE admin SET Password='$password' where Email='$user' ");
                    setcookie("user_password",$password,time()+86400,"/",$_SERVER['SERVER_NAME']);
                    echo "<script>alert('Success....! Use your phone number as new password to login ');</script>";
                    echo "<script>window.location.href='index.php'</script>";

                } else {
                   echo "<script>alert('Invalid Details');</script>";   
                   echo "<script>window.location.href='forgot_pass.php'</script>";
                  
                }
            }
        }
        ?>