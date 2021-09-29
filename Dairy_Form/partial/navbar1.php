<?php
     if(isset($_GET["logout"])){   
         if($_GET["logout"]==1){
        session_start();
        
        // setcookie("user_name","",time()-3600);
        // setcookie("user_name","",time()-999999,"/",$_SERVER['SERVER_NAME']);
        // //  unset($_COOKIE["user_name"]);
        // setcookie("user_password","",time()-999999,"/",$_SERVER['SERVER_NAME']);
        // // unset($_COOKIE["user_password"]);
        //  $user=$_COOKIE["user_name"];
        session_destroy();
       
        header("location:../index.php");
         }
    }
    ?>

<nav class="navbar navbar-light bg-primary p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand text-white" href="#">
            <img src="img/12.jpg" alt="" width="100" height="50" class="me-2">
        <strong> Dairy Farm Shop Management System</strong>
               

            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div> -->
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="mr-3 mt-1">
                <span></span>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $_SESSION['Img']; ?>" alt="" width="50" height="50" class="rounded-circle me-2">
        <strong><?php echo $_SESSION['User'] ?></strong>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class=" dropdown-header">
                        <h6 class="text-overflow m-0 text-success">Welcome !</h6>
                </div>
                    <li><a class="dropdown-item" href="my_account.php">My Account</a></li>
                    <li><a class="dropdown-item" href="partial/navbar1.php?logout=1">Sign out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div> -->
    