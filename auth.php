<?php

$conn = new mysqli("localhost", "root", "", "kucsa");
if($conn->connect_error){
    die("Connection failed : " .$conn->connect_error);
}

//getting this inputs from the db
 $username = $_POST["username"];
 $password = $_POST["password"];

 //prepare to prevent SQL injection

 //preparation to send data
 // Select username and password from  the db
    $sql = "SELECT username, password FROM user WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result(); 

    if($result->num_rows>0){

    //user is found ,verify password
    $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

        //password is correct start session for the user
        session_start();
        $_SESSION['username'] = $user['username'];
        //print  statement about login successful
        echo "Login Successful! Welcome ".$user['username'];
        

        //redirecting to the user dashboa
    //header("Location: dashboard.php");
        }else{
            echo "You have entered the wrong password!!";

        }
    }else{
        echo "the user does not exist";
    }


//closing the db connection
$conn->close();

?>
