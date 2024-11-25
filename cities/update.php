<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dbconnection.php';
	
	if(isset($_POST['update'])){

        $c_id = $_POST['c_id'];
		$name = $_POST['name'];
		$state = $_POST['state'];
		$postal = $_POST['postal'];

        if(empty($name || $address || $mobile)){
			echo "All fields required";
		}
		else {
			//define SQL Statement
            $sql = "UPDATE cities SET name=:c_name, state=:c_state, postal=:c_postal
			         Where city_id = '$c_id'";
			//Prepare SQL Statement for execution
			$stmt = $conn->prepare($sql);
			//Executing SQL Statement
			$stmt->execute(array(
					':c_name' 	=> $name,
					':c_state'=> $state,
					':c_postal'	=> $postal,
				)
			);
			header("location:view.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:view.php");
	}
?>