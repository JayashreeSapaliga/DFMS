<?php

session_start();
if (!isset($_SESSION['User'])){
    header("location:index.php");
}

include("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD CUSTOMER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

    <?php include("partial/navbar1.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("partial/navbar2.php"); ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-2">

                <div class="d-flex align-items-center p-3 my-2 text-secondary bg-white rounded shadow-sm">
                    <div class="lh-1">
                        <a class="btn btn-primary mx-5" href="customer.php">GO BACK TO PAGE</a>

                    </div>
                </div>
                <div class="container">
                     <h3 class="text-danger text-center">ADD CUSTOMER DETAILS</h3>
                    <div class="table-responsive">
                        <form method="POST">
                            <table class="display table" width="100%">

                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" name="name" id="name" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><input type="text" name="address" id="address" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Milk Type</th>
                                    <td><select name="mtype" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Buffalo">Buffalo</option>
                                            <option value="Cow">Cow</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2">
                                        <input class="btn btn-success" type="submit" value="ADD" name="submit">
                                        <input class="btn btn-danger" type="reset" value="CANCEL">
                                    </td>
                                </tr>

                            </table>
                        </form>

                    </div>

                </div>
            </main>
        </div>
    </div>

    <?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $address = $_POST["address"];
        $mtype = $_POST["mtype"];
        $dt = date('Y-m-d');
        
        if ($name && $address && $mtype) {
            mysqli_query($mysql, "INSERT INTO customer(Name,Address,Type,Date_added) VALUES('$name','$address','$mtype','$dt')");
         echo "<script>alert('Customer added successfully');</script>"; 
         echo "<script>window.location.href='customer.php'</script>";
      }
    }
 
 ?>

<?php include("partial/scripts.php"); ?>
</body>

</html>