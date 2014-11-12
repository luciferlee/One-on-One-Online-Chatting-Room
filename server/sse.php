<?php
//error_reporting(E_ALL);
	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');
	require_once 'dbsetup.php';
		$sql = "select * from tempDial;";
		$sth = $db->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll();
		$sql = "delete from tempDial;";
		$sth = $db->prepare($sql);
		$sth->execute();
		echo "retry: 1000\n";
		foreach ($result as $tuple) {
			echo 'data: {"f":"'.$tuple[fromemail].'","t":"'.$tuple[toemail].'","m":"'.$tuple[message].'","ti":"'.$tuple[2].'"}';
			echo "\n\n";
			ob_flush();
			flush();
		}
		
?>