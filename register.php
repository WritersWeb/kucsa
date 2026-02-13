<?php

$conn = new mysqli("localhost", "root", "", "kucsa");

if ($_SERVER)["REQUEST_METHOD"] == "POST"; {
    # code...
    $full_name = $_POST ["full_name"];
    $username = $_POST ["username"];
    $email = $_POST ["email"];
        #PASSWORD HASH
    $password = password_hash($_POST  ["password"], PASSWORD_DEFAULT) ;

    $sql = "INSERT INTO user (full_name, username, email, password) VALUES (?,?,?,?)";
      
    $stmt =  $conn->prepare($sql);
    
    $stmt->bind_param("ssss" , $full_name, $username, $email, $password);

    if ($stmt->execute()) {
        # code...
        echo "Registration successfull :  <a href = 'login.html' </a> ";
    }else
    echo "Error : " . $conn->error;
}




?>
