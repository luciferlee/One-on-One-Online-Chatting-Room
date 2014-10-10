<?php
	require_once 'dbsetup.php';
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	if ($email == '') {
		echo 'yes';
		die();	
	}
	$sql = "select * from users where email = :email;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$email));
	$result = $sth->fetch();

	if(empty($result)) {
		echo 'nouser';
		die();	
	}
	$sql = "select * from users where email = :email and password = :pwd;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$email, ':pwd'=>$pwd));
	$result = $sth->fetch();
	if(empty($result)) {
		echo 'wrongpassword';
		die();	
	}
	echo $result['username'];
?>