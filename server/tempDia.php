<?php
	require_once 'dbsetup.php';
	$fromemail = $_POST['fromemail'];
	$toemail = $_POST['toemail'];
	$time = $_POST['time'];
	$mes =  $_POST['mes'];
	// $fromemail = 'fromemail';
	// $tomemail = 'tomemail';
	// $mes =  'mes';
	if ($mes == "") {
		echo "empty message";
		die();
	}
	$sql = "select status from users where email = :email;";
	$sth = $db->prepare($sql);
	$sth->execute(array(':email'=>$toemail));
	$result = $sth->fetch();
	if ($result[status] == 'online') {
		$sql = "insert into tempDial values (:femail, :temail, :time, :message);";
		$sth = $db->prepare($sql);
		$sth->execute(array(':femail' =>$fromemail, ':temail'=>$toemail, ':time'=>$time, ':message'=>$mes));
	}
	else{
		$sql = "insert into offlineDial values (:femail, :temail, :time, :message);";
		$sth = $db->prepare($sql);
		echo $sth->execute(array(':femail' =>$fromemail, ':temail'=>$toemail, ':time'=>$time, ':message'=>$mes));
	}
	echo "susses";
?>