<?php
	session_start(); //session of user will be destroyed when clicekd upon logout button
	session_destroy();
	
	header('location:login.php');
?>