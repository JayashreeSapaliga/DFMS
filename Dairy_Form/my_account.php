<?php
    session_start();
    if (!isset($_SESSION['User'])){
        header("location:index.php");
    }
    include("connect.php");
  $id = $_SESSION['ID'];
        $result = mysqli_query($mysql, "SELECT * FROM admin WHERE ID='$id'");
        while ($row=mysqli_fetch_array($result)) {  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="css/style.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    </style>
</head>

<body>

    <?php include("partial/navbar1.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("partial/navbar2.php"); ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-2">

                <div class="d-flex align-items-center p-3 my-2 text-dark bg-secondary rounded shadow-sm">
                    <div class="lh-1">
                        <h1 class="h2 mb-0 text-light lh-1">MY ACCOUNT</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div id="progressbarwizard">
                            <ul class="nav nav-pills nav-justified mb-3 bg-secondary">
                                <li class="nav-item">
                                    <a href="#basic_info" data-toggle="tab"
                                        class="nav-link rounded-0 pt-2 pb-2 text-light active">
                                        <i class="fas fa-info-circle"></i>
                                        <span>Basic Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#manage_info" data-toggle="tab"
                                        class="nav-link rounded-0 pt-2 pb-2 text-light">
                                        <i class="fas fa-user-circle"></i>
                                        <span>Manage Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#login_credentials" data-toggle="tab"
                                        class="nav-link rounded-0 pt-2 pb-2 text-light">
                                        <i class="fas fa-user-lock"></i>
                                        <span>Login Credentials</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active" id="basic_info">
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="mb-2">
                                                <label for="email" class="text-dark">
                                                    <i class="fas fa-image"></i>
                                                    Photo: <img src="<?php echo $row[6]; ?>" height="100px"
                                                        width="100px"></label>
                                            </div>
                                            <div class="mb-2">
                                                <label class="text-dark"><i class="fas fa-user"></i>
                                                    First Name: <?php echo $row[1]; ?> </label>

                                            </div>
                                            <div class="mb-2">
                                                <label class="text-dark"><i class="fas fa-user"></i>
                                                    Last Name: <?php echo $row[2]; ?></label>
                                            </div>
                                            <div class="mb-2">
                                                <label class="text-dark"><i class="fas fa-venus"></i>
                                                    Gender: <?php echo $row[3]; ?></label>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="text-dark"><i class="fas fa-book"></i>
                                                    Address: <?php echo $row[4]; ?></label>
                                            </div>
                                            <div class="mb-2">
                                                <label class="text-dark"><i class="fas fa-phone"></i>
                                                    Phone no:<?php echo $row[5]; ?></label>
                                            </div>
                                            <div class="mb-2">
                                                <label for="email" class="text-dark"><i class="fas fa-envelope"></i>
                                                    Email: <?php echo $row[7]; ?></label>
                                            </div>
                                            <div class="mb-2">
                                                <label for="email" class="text-dark"><i class="fas fa-calendar"></i>
                                                    Last modified: <?php echo $row[9]; ?></label>
                                            </div>


                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>


                                <div class="tab-pane" id="manage_info">
                                    <div class="row">
                                        <div class="col-12">
                                            <form enctype="multipart/form-data" method="post">

                                                <!--   <form action="" method="post"> -->
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="first_name">First Name
                                                        <span class="required text-danger">*</span> </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" value="<?php echo $row[1];?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="last_name">Last Name
                                                        <span class="required text-danger">*</span> </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" value="<?php echo $row[2];?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="gender">Gender <span
                                                            class="required text-danger">*</span> </label>
                                                    <div class="col-md-9">

                                                        <input type="radio" class="radio mr-2" id="gender" name="gender"
                                                            value="Male" <?php if($row[3]=="Male") echo "checked"?>
                                                            required>Male
                                                        <input type="radio" class="radio mr-2 ml-2" id="gender"
                                                            name="gender" value="Female"
                                                            <?php if($row[3]=="Female") echo "checked"?>>Female
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="address">Address<span
                                                            class="required text-danger">*</span> </label>
                                                    <div class="col-md-9">

                                                        <textarea name="address" id="address" class="form-control"
                                                            required><?php echo $row[4];?> </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="pno">Phone
                                                        Number<span class="required">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="number"
                                                            onkeypress="if(this.value.length==10)return false;return isNumberKey(event)"
                                                            class="form-control" id="pno" name="pno"
                                                            value="<?php echo $row[5];?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="last_name">Image
                                                        <span class="required text-danger">*</span> </label>
                                                    <div class="col-md-9">
                                                        <img src="<?php echo $row[6]; ?>" height="100px" width="100px">
                                                        <input type="file" id="photo" name="photo">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email
                                                        <span class="required text-danger">*</span> </label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            value="<?php echo $row[7];?>" required>
                                                    </div>
                                                </div>

                                                <div style="text-align: center;" class="mb-3 mt-3">

                                                    <button type="submit" class="btn btn-primary text-center"
                                                        name="update">Submit</button>
                                                        <input class="btn btn-danger" type="reset" value="RESET">

                                                </div>
                                            </form>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>

                                <div class="tab-pane" id="login_credentials">
                                    <div class="row">
                                        <div class="col-12">
                                            <form id="credential" method="post">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            value="<?php echo $row[7]; ?>" disabled>
                                                    </div>
                                                </div>

                                                <div class="password-group">

                                                    <div class="form-group row mb-3">
                                                        <label for="password"
                                                            class="col-md-3 col-form-label">Password<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="password" class="form-control"
                                                                id="current_password" name="current_password"
                                                                placeholder="Enter Current Password" required>

                                                        </div>

                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="new_password" class="col-md-3 col-form-label">New
                                                            Password<span class="text-danger">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="password" class="form-control"
                                                                name="new_password" id="new_password"
                                                                placeholder="Enter New Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="confirm_password"
                                                            class="col-md-3 col-form-label">Confirm
                                                            Password<span class="text-danger">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="password" class="form-control"
                                                                name="confirm_password" id="confirm_password"
                                                                placeholder="Re-type Your Password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" name="sub"
                                                        class="btn btn-primary text-center">Submit</button>
                                                </div>
                                            </form>

                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>





                            </div>
                        </div>
            </main>
        </div>
    </div>
    <script type="text/javascript">
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    </script>

    <?php include("partial/scripts.php"); ?>
</body>
<?php 
if(isset($_POST["update"])){

$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$pno=$_POST['pno'];
$image=$row[6];
$pname=$_FILES['photo']['name'];
$ftype=$_FILES['photo']['type'];
$fsize=$_FILES['photo']['size'];
$floc=$_FILES['photo']['tmp_name'];
$email=$_POST['email'];
$last_modified = date("Y-m-d");

$fstore="img/".$pname;
move_uploaded_file($floc,$fstore);
if($fstore=="img/")
{
$fstore=$image;
}

    $res="update admin set Fname='$fname',Lname='$lname',Gender='$gender',Address='$address',Phone_no='$pno',Image='$fstore',Email='$email',Last_modified='$last_modified' where ID='$id'";
    $mysql->query($res);
    $_SESSION['ID'] = $row[0];
    $_SESSION['User'] = $fname;
    $_SESSION['Img'] = $fstore;
    echo "<script>alert('Updated successfully');</script>";
    echo "<script>window.location.href='my_account.php'</script>";
}

if(isset($_POST["sub"])){
              
                
                $password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $confirm_password=$_POST['confirm_password'];
                $current_password= $row[8];
 
                if ($password == $current_password) {
                    if($new_password==$confirm_password){
                     $password = $new_password;
                     $last_modified = date("Y-m-d");

                     $res="update admin set Password='$password',Last_modified='$last_modified' where ID='$id'";
                     $mysql->query($res);
                     setcookie("user_password",$password,time()+86400,"/",$_SERVER['SERVER_NAME']);
                     echo "<script>alert('Updated successfully');</script>";
                     echo "<script>window.location.href='my_account.php'</script>";
                }else{
                    echo "<script>alert('Mismatch Password');</script>";
                }
            }
                else{
                    echo "<script>alert('Invalid Password');</script>";
                }
            }


?>

</html>
<?php } ?>