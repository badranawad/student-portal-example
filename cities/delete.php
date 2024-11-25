<?php
include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dbconnection.php';
$c_id = $_GET['id'];

$sql = "Delete From cities Where city_id='$c_id'";
$stmt = $conn->query($sql);
$stmt->execute();
header("location:view.php");
?>