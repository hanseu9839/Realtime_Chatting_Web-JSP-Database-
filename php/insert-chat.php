<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $message= mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    }else{
        header("../login.php");
    }

?>