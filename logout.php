<?php
   session_start();
   
   if(session_destroy()) {
      header("Location:/MonitoringSystem/home.php");
   }
   exit();
?>