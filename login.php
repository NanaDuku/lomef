<?php


    $servername = "localhost";
	$username = "root";
	$password = "";
	//Using the database
	if (isset($_POST['sign-in'])) {
		$userName = ($_POST['user']);
        $passWord = ($_POST['pass']);
        
		
		
    


    	//Connecting to a database checking for populated names in the database.
		try {
			$con = new PDO("mysql:host=$servername;dbname=lomefs", $username, $password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		 

    		$query = $con->prepare("SELECT username, password FROM lomef_admin WHERE 
			username=?  AND password=? ");
			$query->execute(array($userName,$passWord));

			
			$row = $query->fetch(PDO::FETCH_BOTH);

			//Granting access to users
			if($query->rowCount() > 0) {
				$_SESSION['user'] = $userName;
				header('location:home.html');
			} else {
				echo( "\r\n" ."Username/Password is wrong");
				header( "refresh:3;url=index.html" );
			}




		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}








?>