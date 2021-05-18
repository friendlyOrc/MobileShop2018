<?php
	$connect = mysqli_connect('localhost', 'root', '', 'mobile_shop1');
	if($connect) mysqli_query($connect, "set names 'utf8'");
	else echo "DB ERROR";
?>