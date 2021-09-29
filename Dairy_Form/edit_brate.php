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
    <title>EDIT BUFFALO RATE</title>
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
                        <a class="btn btn-primary mx-5" href="buffalo_rate.php">GO BACK TO PAGE</a>

                    </div>
                </div>
                <div class="container">
                    <h3 class="text-danger text-center">EDIT BUFFALO RATE DETAILS</h3>
                    <div class="table-responsive">
                        <?php
                            $fat=$_GET["fat"];

                            $ret=mysqli_query($mysql,"SELECT * from brate where Bfat='$fat'");
                        
                            while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <form method="POST">
                            <table class="display table" width="100%">

                                <tr>
                                    <th>Buffalo Fat</th>
                                    <td><input type="text" name="bfat" id="name" value="<?php echo $row["Bfat"];?>" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <th>Buffalo Rate</th>
                                    <td><input type="text" name="price" id="address" value="<?php echo $row["Price"];?>" class="form-control" required>
                                    </td>
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
       if(isset($_POST['update'])) {
             $bfat = $_POST["bfat"];         
             $price = $_POST["price"];
             
         
            if ($bfat && $price) {
                $res = mysqli_query($mysql, "SELECT * FROM brate where Bfat='$bfat' AND Bfat!='$fat'");
                $array = mysqli_fetch_row($res);
                if ($array[0]>1) {
                    echo "<script>alert('Buffalo fat rate already exist.');</script>"; 
                }
                else{
                    mysqli_query($mysql, "UPDATE brate SET Bfat='$bfat',Price='$price' WHERE Bfat='$fat'");
                     echo "<script>alert('Record updated successfully');</script>"; 
                     echo "<script>window.location.href='buffalo_rate.php'</script>";
                }
            }
        } 
            ?>

<?php include("partial/scripts.php"); ?>
</body>

</html>