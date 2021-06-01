<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)){
        //사용자가 입력한 전자 메일과 암호를 확인하여 테이블 행 전자 메일 및 암호를 데이터베이스에 저장하도록 합니다.
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){  // 사용자 자격 증명이 일치하는 경우
            $row = mysqli_fetch_assoc($sql);         
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }
            }else{
                echo "Email or Password is Incorrect!";
                }
        }else{
        echo "All input fields are required!";
    }
?>