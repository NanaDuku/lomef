<?php

session_start();
$_SESSION['message'] = ' ';
$mysqli = new mysqli('localhost','root','','lomefs');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 



if (isset($_POST['sign-up'])) {
        

        $username = $mysqli->real_escape_string($_POST['user']);
        $email = $mysqli->real_escape_string($_POST['mail']);
        $password = $mysqli->real_escape_string(($_POST['passd']));

        $sql = "INSERT INTO lomef_admin (username,email,password)VALUES('$username','$email','$password')";

        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
            header("location:home.html");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();
    }
        
?>




