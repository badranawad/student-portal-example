<?php
include '../dbconnection.php';
$s_id = $_GET['id'];

$sql = "Delete From students Where student_id='$s_id'";
$stmt = $conn->query($sql);
$stmt->execute();
header("location:view.php");
?>