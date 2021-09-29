
<?php 
 session_start();
 if (!isset($_SESSION['User'])){
     header("location:index.php");
 }

include("connect.php"); 

if(isset($_GET["del"])){    
    $id=$_GET["del"];
    $query=mysqli_query($mysql,"DELETE from collection where ID='$id'");
    echo "<script>alert('One record deleted.');</script>";   
    
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAILY MILK COLLECTION</title>
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
                        <h3 class="h3 mb-0 text-info lh-1">DAILY MILK COLLECTION<a class="btn btn-primary mx-5" href="add_collection.php">ADD</a> </h3>

                    </div>
                </div>
                <div class="container">
                       
                        <table id="myTable" class="display table" width="100%">
                            <thead>
                                <tr>
                                <th> DATE </th>
                                <th> TIME </th>
                                <th> CUSTOMER ID </th>
                                <th> MILK TYPE </th>
                                <th> QTY/LTR </th>
                                <th> FAT </th>
                                <th> RATE </th> 
                                <th> TOTAL </th>
                                <th> ACTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $result = mysqli_query($mysql, "SELECT * FROM collection");
                                while ($array = mysqli_fetch_row($result)) { ?>
                                <tr>
                                    <td><?php echo $array[1]; ?></td>
                                    <td><?php echo $array[2]; ?></td>
                                    <td><?php echo $array[3]; ?></td>
                                    <td><?php echo $array[4]; ?></td>
                                    <td><?php echo $array[5]; ?></td>
                                    <td><?php echo $array[6]; ?></td>
                                    <td><?php echo $array[7]; ?></td>
                                    <td><?php echo $array[8]; ?></td>
                                    <td>
                                       
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a class="btn btn-success btn-sm rounded-0" href="edit_collection.php?ID=<?php echo $array[0]; ?>" 
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="btn btn-danger btn-sm rounded-0" href="daily_collection.php?del=<?php echo $array[0]; ?>"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </li>
                                        </ul>
                                </tr>
                                </td>
                                    <?php
                                         }      
                                     ?>
                            </tbody>               
                        </table>

                </div>
            </main>
        </div>
    </div>

    <?php include("partial/scripts.php"); ?>

</body>

</html>