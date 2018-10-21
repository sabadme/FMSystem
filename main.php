<?php
session_start();

$accountname=$_SESSION['account'];
$status=$_SESSION['status'];
$id=$_SESSION['id'];

 ?>
 <?php
if(isset($status)){
 ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Monitoring</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
        <link type="text/css" rel="stylesheet" href="css/simplePagination.css"/>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jQuery.print.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.simplePagination.js"></script>
        <script type="text/javascript" src="js/instascan.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

    </head>
    <style>

  #alert_popover
  {

   display:block;
   position:absolute;
   bottom:50px;
   right: 50px;
  }
  .wrapper {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:200px;
  }
  .alert_default
  {
    display: block;
    margin: 20px 20px;
   color: #333333;
   background-color: #f2f2f2;
   border-color: #cccccc;
  }



  </style>



    <body class="main-index">
    <div class="block-loader">

        <div class="loader-gear"></div>
    </div>

    <div class="page-wrapper">

        <?php


        ?>
        <header>


            <div class="logo-container">
                <img src="images/lccb.png"/>


                <span>Facility Equipment Monitoring System</span>
            </div>
            <div class="login-container">
                <?php if ($accountname): ?>
                    <div class="mainUser-container">
                        <span class="username"><?php echo $accountname; ?></span>

                        <a href="logout.php" class="logout">
                            <!-- <img src="images/svg/logout.svg" alt="LOGOUT" /> --></a>
                    </div>
                <?php else: ?>
                    <span class="login">LOGIN</span>
                <?php endif; ?>

                <?php include "login.php"; ?>
            </div>

        </header>


        <div class="page-main">

            <?php include "navigation.php"; ?>
            <?php
            if ($status == "Admin") {

   ?>

        <script>
            //notifacation pop up
        $(document).ready(function(){

            setInterval(function(){
            load_last_notification();
            }, 1000);
            function load_last_notification(){
               $.ajax({
                url: "admin/adminNotif.php",
                method:"POST",

                success: function(data){
                    /*console.log(data)*/
                $(".content").html(data);
                // alert(data)
                }
            })
            }


        });
        </script>


        <?php

                ?>
                <?php include "admin/function.php"; ?>
                <?php
            } else if ($status == "Office") {
                $accountname;

                ?>
                <?php include "Office/function.php"; ?>
                <?php
            } else if ($status == "Teacher") {
                $accountname;
                $id;
                include "teacher/function.php";
            }else if ($status == "Student Assistant") {
                $accountname;
                include "student/function.php";
            }else if($status == "Technician"){
                $accountname;
                include"Technician/function.php";
            }

            ?>


        </div>
        <!-- NOTIFACATION POP UP -->

                    <div id="alert_popover">
                         <div class="wrapper">
                            <div class="content">

                                 </div>
                         </div>
                   </div>

        <?php include "footer.php"; ?>
    </div>
    </body>


    </html>
    <?php
} else {
    header("location:home.php");
}

?>
<script type="text/javascript" src="js/monitoring.js"></script>