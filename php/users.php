<?php
    session_start();
    include_once "config.php";
    $sql =mysqli_query($conn,"SELECT * FROM users");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "사용할 수 있는 채팅 사용자가 없습니다.";
    }else if(mysqli_num_rows($sql) > 0){
       include "data.php";
    }
    echo $output;
?>