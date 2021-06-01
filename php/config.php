<?php 
    $conn = mysqli_connect("webapp54953.dothome.co.kr","webapp54953","qnpfr54953#","webapp54953");
    if(!$conn){
        echo "Database connected" .mysqli_connect_error();
    }
?>