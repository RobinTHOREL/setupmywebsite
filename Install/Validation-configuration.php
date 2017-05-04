<?php
if( !empty($_POST['host']) && !empty($_POST['port']) && !empty($_POST['user']) 
	&& isset($_POST['password']) && !empty($_POST['database_name']) ) {
	$host = $_POST['host'];
	$port = $_POST['port'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$databaseName = $_POST['database_name'];
}
