<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ){
        //비밀번호와 user Email이 타당한지 아닌지 확인 
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){//if email is valid 
                //이메일이 데이터베이스에 있는지 확인하기 
                $sql = mysqli_query($conn,"SELECT email FROM users WHERE email ='{$email}'");
                if(mysqli_num_rows($sql) > 0){ //if email already exist
                    echo "$email - already exist!";
                }else{
                    //let's check user upload file or not 
                    if(isset($_FILES['image'])){//if file is uploaded
                            $img_name = $_FILES['image']['name']; //이미지 이름 업로드
                            $img_type =  $_FILES['image']['type'];//이미지 타입 
                            $tmp_name = $_FILES['image']['tmp_name']; // 이미지 폴더의 위치 저장/이동

                            //이미지 확장 
                            $img_explode = explode('.',$img_name);
                            $img_ext = end($img_explode); // 여기서 사용자 업로드 img 파일의 확장자를 가져옵니다.

                            $extensions = ['png','jpeg','jpg','PNG'];
                            if(in_array($img_ext,$extensions) === true){ //사용자가 업로드한 이미지가 배열 확장과 일치하는 경우
                                    $time = time(); //this will return us current time 
                                                    //so all the image file will have a unique name 
                                    //let's move th user uploaded img to our particular folder 
                                    $new_img_name = $time.$img_name;
                                  if(move_uploaded_file($tmp_name,"images/".$new_img_name)){ //if user upload img move to our folder successfully
                                        $status = "Active now"; //once user signed up then his status will be active now 
                                        $random_id = rand(time(), 10000000); //creating random id for user 
                                        //let's insert all user data inside table 
                                        $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                         VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                                        if($sql2){ //if these data inserted
                                                $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email ='{$email}'");
                                                if(mysqli_num_rows($sql3) > 0){
                                                    $row = mysqli_fetch_assoc($sql3);
                                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique id in other php file 
                                                    echo "success";
                                                }
                                        }else{
                                                echo "Something went wrong!";
                                        }
                                  }
                            }else{
                                echo "Please select an Image file - jpeg, jpg, png!";
                            }
                    }else{
                        echo "Please select an Image file!";
                    }
                }

        }else{
            echo "$email  - This is not a valid email!";
        }

    }else{
        echo "All input field are required";
    }
?>