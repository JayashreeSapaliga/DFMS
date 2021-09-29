<?php
    session_start();
    if (!isset($_SESSION['User'])){
        header("location:index.php");
    }
?>

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
     
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
  
    <?php include("partial/navbar1.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("partial/navbar2.php"); ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-2">

                <div class="d-flex align-items-center p-3 my-2 text-dark bg-secondary rounded shadow-sm">
                    <div class="lh-1">
                        <h1 class="h2 mb-0 text-light lh-1">Welcome to Dairy Farm Shop Management System</h1>
                    </div>
                </div>
                <img src="img/5.jpg" class="img-thumbnail rounded d-block" height="100%" width="100%" alt="...">
                <!-- <img src="img/1.jpg" class="img-fluid" alt="..."> -->

            </main>
        </div>
    </div>
    <?php include("partial/scripts.php"); ?>
</body>

</html>