<?php
	require_once 'dbsetup.php';
	$toemail = $_POST['toemail'];
	// $email = "2@2.com";
	// $toemail = $_POST['toemail'];
	$fromemail = $_POST['fromemail'];
	// $tomemail = 'tomemail';
	$sql = "select * from offlineDial where toemail = :email and fromemail = :femail;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$toemail, ':femail'=>$fromemail));
	$result = $sth->fetchAll();
	// print_r($result);
	foreach ($result as $friend) {
		echo $friend[message]."\t";
		echo $friend[time]."\n";
	}
	$sql = "delete from offlineDial where toemail = :email and fromemail = :femail;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email' =>$toemail, ':femail'=>$fromemail));
?>