<?php
	require_once 'dbsetup.php';
	$email = $_POST['email'];
	// $email='2@2.com';
	if ($email == '') {
		echo 'wrong';
		die();	
	}
	$sql = "update users set status = 'offline' where email = :email;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$email));
	echo 'success';
?>