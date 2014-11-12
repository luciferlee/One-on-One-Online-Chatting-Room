<?php
	require_once 'dbsetup.php';
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$username = $_POST['username'];
	if ($email == '') {
		echo 'wrong';
		die();	
	}
	$sql = "select * from users where email = :email;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$email));
	$result = $sth->fetch();
	if(!empty($result)) {
		echo 'wrong';
		die();	
	}
	$sql = "insert into users values( :email, :pwd, :username, :status);";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$email, ':pwd'=>$pwd, ':username'=>$username, ':status'=>'online'));
	echo 'success';
?>