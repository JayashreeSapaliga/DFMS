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
    <title>EDIT DAILY MILK COLLECTION</title>
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
                        <a class="btn btn-primary mx-5" href="daily_collection.php">GO BACK TO PAGE</a>

                    </div>
                </div>
                <div class="container">
                     <h3 class="text-danger text-center">EDIT DAILY MILK COLLECTION</h3>
                    <div class="table-responsive">
                    <?php
                            $id=$_GET["ID"];

                            $ret=mysqli_query($mysql,"SELECT * from collection where ID='$id'");
                        
                            while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <form method="POST">
                            <table class="display table" width="100%">

                                <tr>
                                    <th>DATE</th>
                                    <td><input type="date" name="date" class="form-control"  value="<?php echo $row["Date"]; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>TIME</th>
                                    <td><input type="text" name="time" class="form-control"  value="<?php echo $row["Time"]; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>CUSTOMER ID</th>
                                    <td><input type="text" name="c_id" class="form-control" value="<?php echo $row["C_id"]; ?>" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <th>QTY/LTR</th>
                                    <td><input type="text" name="qty" class="form-control" value="<?php echo $row["Qty"]; ?>" required></td>
                                </tr>

                                <tr>
                                    <th>FAT</th>
                                    <td><input type="text" name="fat" value="<?php echo $row["Fat"]; ?>" class="form-control" required></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2">
                                        <input class="btn btn-success" type="submit" value="UPDATE" name="update">
                                        <input class="btn btn-danger" type="reset" value="RESET">
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <?php }  ?>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <?php
    if(isset($_POST["update"])){
            $date = $_POST["date"];
            $time = $_POST["time"];
            $c_id = $_POST["c_id"];
            $qty = $_POST["qty"];
            $fat = $_POST["fat"];
            $total = 0;
            $rate=0;

            $result1 = mysqli_query($mysql, "SELECT * FROM customer WHERE ID = $c_id");
            while ($array = mysqli_fetch_row($result1)) {
                $type = $array[3];
            }

            if ($type == "Buffalo") {

                $result2 = mysqli_query($mysql, "SELECT * FROM brate WHERE Bfat='$fat'");
                
                    while ($array = mysqli_fetch_row($result2)) {
                    $rate = $array[1];                    
                }
                $result3 = mysqli_query($mysql, "SELECT * FROM brate WHERE Bfat='$fat'");
                $ret=mysqli_fetch_array($result3);
                if($ret==0){
                 echo "<script>alert('Fat doesnt exist.');</script>"; 
                 echo "<script>window.location.href='edit_collection.php'</script>";
                 }

            } else {
                $result4 = mysqli_query($mysql, "SELECT * FROM crate WHERE Cfat='$fat'");
                while ($array = mysqli_fetch_row($result4)) {
                    $rate = $array[1];
                }
                 $result = mysqli_query($mysql, "SELECT * FROM crate WHERE Cfat='$fat'");
                $ret=mysqli_fetch_array($result);
                if($ret==0){
                 echo "<script>alert('Fat doesnt exist.');</script>"; 
                 echo "<script>window.location.href='edit_collection.php'</script>";
                 }
            
            }

            $total = $qty * $rate;

            if ($qty && $fat && $rate && $total) {
                    mysqli_query($mysql, "UPDATE collection SET Qty='$qty',Fat='$fat',Rate='$rate',Total='$total' WHERE ID='$id'");
                     echo "<script>alert('One record updated');</script>"; 
                     echo "<script>window.location.href='daily_collection.php'</script>";
     
            }
        }

        ?>

<?php include("partial/scripts.php"); ?>
</body>

</html>