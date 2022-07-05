<?php
	session_start();

	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
		
	try {
		$connection = new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($connection -> connect_errno != 0){
			throw new Exception(mysqli_connect_errno());
		} else {
			$amount = $_POST['amount'];
			$date = $_POST['date'];
			$category = $_POST['category'];
			$comment = $_POST['comment'];
			$id = $_SESSION['id'];
			
			$comment = htmlentities($comment, ENT_QUOTES, "UTF-8");

			if($connection -> query("INSERT INTO incomes VALUES (NULL, '$id', '$amount', '$category', '$date', '$comment')")){
				$_SESSION['success'] = "<h3 class='row text-success'>Pomy&sacute;lnie dodano przych&oacute;d!</h3>";

				header('Location: user_menu.php');
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