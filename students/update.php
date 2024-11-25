<?php
	include '../dbconnection.php';
	
	if(isset($_POST['update'])){

        $s_id = $_POST['s_id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];

        if(empty($name || $address || $mobile || $email)){
			echo "All fields required";
		}
		else {
			//define SQL Statement
            $sql = "UPDATE students SET name=:s_name, address=:s_address, mobile=:s_mobile, email=:s_email
                    Where student_id = '$s_id'";
			//Prepare SQL Statement for execution
			$stmt = $conn->prepare($sql);
			//Executing SQL Statement
			$stmt->execute(array(
					':s_name' 	=> $name,
					':s_address'=> $address,
					':s_mobile'	=> $mobile,
					':s_email'	=> $email,
				)
			);
			header("location:view.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:view.php");
	}
?>