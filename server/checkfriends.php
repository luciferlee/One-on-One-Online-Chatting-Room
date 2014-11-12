<?php
	require_once 'dbsetup.php';
	$email = $_POST['email'];
	// $email = "2@2.com";
	// $toemail = $_POST['toemail'];
	// $fromemail = 'fromemail';
	// $tomemail = 'tomemail';
	$sql = "select friendemail from friends where useremail = :email;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$email));
	$result = $sth->fetchAll();
	// print_r($result);
	foreach ($result as $friend) {
		echo $friend[friendemail]."\t";
		$sql = "select * from users where email = :email;";
		$sth = $db->prepare($sql);
		$sth->execute(array(':email' =>$friend[friendemail]));
		$e = $sth->fetch();
		echo $e['username']."\t".$e['status']."\t";
		$sql = "select * from offlineDial where toemail = :email and fromemail = :femail;";
		$sth = $db->prepare($sql);
		$sth->execute(array(':email' =>$email, ':femail'=>$friend[friendemail]));
		$e = $sth->fetchAll();
		echo count($e)."\n";
	}
?>