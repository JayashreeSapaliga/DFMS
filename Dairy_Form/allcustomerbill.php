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
    <title>GET CUSTOMER BILL</title>
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
                        <h3 class="h3 mb-0 text-info lh-1"> GET CUSTOMER BILL </h1>
                    </div>
                </div>
                <div class="container">
                    <h3 class="text-danger text-center mt-3">SELECT FROM DATE AND TO DATE</h3>
                    <div class="table-responsive text-center mt-5">
                        <form method="post">
                            <p> <strong>From Date:</strong> <input type="date" class="mr-3"  name="fromdate" id="fromdate"
                                    max=<?php echo date('Y-m-d'); ?> required>
                                    <strong>To Date:</strong> <input type="date" name="todate" id="todate" max=<?php echo date('Y-m-d'); ?>
                                    required>
                                <input class="btn btn-success ml-3" type="submit" name="submit" value="Generate" >
                                
                            </p>
                        </form>
                        <?php
    if(isset($_POST["submit"])){
        echo' 
        <table class="display table" border="border" cellspacing="1" cellpadding="1">
        <thead>
        <tr> <th>#</th> <th> CUSTOMER ID</th> <th>CUSTOMER NAME</th> <th>MILK TYPE</th> <th>TOTAL MILK in LTR</th> <th>TOTAL RUPEES</th> 
        </tr> </thead>';
        
            $fromdate = $_POST["fromdate"];
            $todate = $_POST["todate"];

            echo '<h2 align="center">Bill Payment From ' . $fromdate . ' To ' . $todate . '</h2>';

            if ($fromdate && $todate) {
                $presult = mysqli_query($mysql, "SELECT C_id,cu.Name,co.Type,SUM(Qty),SUM(Total) from collection co join customer cu on co.C_id=cu.ID WHERE Date BETWEEN '" . $fromdate . "' AND '" . $todate . "' GROUP BY C_id");
                // $presult = mysqli_query($mysql, "SELECT cu.Name,co.C_id,co.Type,SUM(Qty),SUM(Total) FROM (customer cu join collection co on cu.ID = co.C_id) WHERE co.Date BETWEEN '" . $fromdate . "' AND '" . $todate . "' GROUP BY cu.C_id");
                $n = 1;
                $grandqty = 0;
                $grandtotal = 0;
            }

            while ($array = mysqli_fetch_row($presult)) {
                print "<tbody><tr>";
                print "<td> $n </td>";
                print "<td> $array[0] </td>";
                print "<td> $array[1] </td>";
                print "<td> $array[2] </td>";
                print "<td> $array[3] </td>";
                print "<td> $array[4] </td>";
                print "</tr>";

                $n = $n + 1;
                $grandtotal = $grandtotal + $array[4];
            }
    
    
        echo '<tr> <td colspan="5" align="right"> Grand Total Rupees </td> <td align="center"> '.$grandtotal.' </tr>
        </tbody></table>';
     }
?>
                    </div>

                </div>
            </main>
        </div>
    </div>

 

    <?php include("partial/scripts.php"); ?>
</body>

</html>