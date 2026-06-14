<?php
    function adminlogin(){
        if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin"){
            header("Location: ../index.php");
            exit();
        }
    }
    function alreadyLoggedIn(){
        if(isset($_SESSION["adminid"])){
            header("Location: pages/dashboard.php");
            exit();
        }
    }
?>