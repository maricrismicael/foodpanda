<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST["loginemail"];
    $password = $_POST["loginpassword"]; 
    echo $password;
    
    $sql = "Select * from customers WHERE EMAIL_ID = '$email'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){

        $row=mysqli_fetch_assoc($result);
        $userId = $row['CUSTOMER_ID'];
        if (password_verify($password, $row['PASS'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email ;
            $_SESSION['userId'] = $userId;
            header("location: /index.php?loginsuccess=true");
            exit();
        } 
        else{
           header("location: /index.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /index.php?loginsuccess=false");
    }
}    
?>