<?php
	$opt = array('location' => 'http://localhost/soap-server.php','uri'=>'http://localhost/');
	$api = new SoapClient(NULL,$opt);
	$a=5;
	$b=10;
	echo $api -> helloworld();
	echo "<br>";
	echo $api -> addition($a,$b);
	echo "<br>";
	echo $api -> getData();
?>
