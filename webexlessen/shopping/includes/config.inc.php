<?php 

// set a database connection for sqlite
$connStr='sqlite:shopping.sqlite';

try {
	$conn=new PDO($connStr);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die($e->getMessage());
}

?>