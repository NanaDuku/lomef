<?php

session_start();
$_SESSION['message'] = ' ';
$mysqli = new mysqli('localhost','root','','lomefs');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 



if (isset($_POST['order'])) {
        

        $fullname = $mysqli->real_escape_string($_POST['fname']);
        $email = $mysqli->real_escape_string($_POST['cmail']);
        $location = $mysqli->real_escape_string(($_POST['loc']));
        $priority = $mysqli->real_escape_string($_POST['p']);
        $jdescription= $mysqli->real_escape_string(($_POST['jobd']));

        $sql = "INSERT INTO lomef_order (`name`,`email`,`location`,`priority`,`job_description`)VALUES('$fullname','$email','$location','$priority','$jdescription')";

        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
            
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();
    }
        
?>
