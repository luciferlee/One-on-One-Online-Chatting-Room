<?php
	require_once 'dbsetup.php';
	$email = $_POST['email'];
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
	echo $result['username'];
?>