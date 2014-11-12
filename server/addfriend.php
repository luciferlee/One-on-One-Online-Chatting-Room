<?php
	require_once 'dbsetup.php';
	$fromemail = $_POST['fromemail'];
	$toemail = $_POST['toemail'];
	// $fromemail = 'fromemail';
	// $tomemail = 'tomemail';
	$sql = "insert into friends values (:femail, :temail);";
	$sth = $db->prepare($sql);
	$sth->execute(array(':femail' =>$fromemail, ':temail'=>$toemail));
	$sth->execute(array(':femail' =>$toemail, ':temail'=>$fromemail));
	$sql = "select username from users where email = :email;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$toemail));
	$e = $sth->fetch();
	echo $e[username];
?>