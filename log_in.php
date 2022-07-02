<?php
	session_start();
	
	if ((!isset($_POST['email'])) || (!isset($_POST['password']))){
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
		
	try {
		$connection = new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($connection -> connect_errno != 0){
			throw new Exception(mysqli_connect_errno());
		} else {
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$email = htmlentities($email, ENT_QUOTES, "UTF-8");
		
			if ($result = $connection -> query(
			sprintf("SELECT * FROM users WHERE email='%s'",
			mysqli_real_escape_string($connection, $email)))){
				$number_users = $result -> num_rows;

				if($number_users > 0){
					$row = $result -> fetch_assoc();
					
					if (password_verify($password, $row['password'])){
                        $_SESSION['logged_in'] = true;
        
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['nick'] = $row['nick'];
                        $_SESSION['email'] = $row['email'];
						
						unset($_SESSION['error']);

						$result -> free_result();                        
						header('Location: user_menu.php');
					} else {
						$_SESSION['error'] = '<span class="error">Nieprawidłowy login lub hasło!</span>';
						header('Location: index.php');
					}					
				} else {					
					$_SESSION['error'] = '<span class="error">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');					
				}
				
			} else {
				throw new Exception($connection -> error);
			}			
			$connection -> close();
		}
	} catch(Exception $e){
		echo '<span class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
	}
?>