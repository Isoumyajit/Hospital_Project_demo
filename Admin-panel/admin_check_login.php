<?php
session_start();
 $email = $_POST['username'];
 $pw = $_POST['password'];
//  if (isset($_POST['submit_btn'])) {

 
$conn = new mysqli('localhost','root','','hospital_demo');
if($conn) {
	echo "connection done";
	$select = "SELECT NAME FROM ADMIN WHERE PASSWORD = '$pw' AND EMAIL = '$email'" ;
	$result = $conn->query($select);
	$row = $result->fetch_assoc();
    if($conn->affected_rows  != 0) {
		$_SESSION['uname'] = $row['NAME'];
		$_SESSION['email'] = $email;
		 echo "success";
		 $status = "success";
		exit();
		 }
		 else{
			echo "Error";
				die();
		 }
		}
?>
