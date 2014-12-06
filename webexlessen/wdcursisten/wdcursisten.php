<?php 

// set a database connection for sqlite
$connStr='sqlite:wdcursisten.sqlite';

try {
	$conn=new PDO($connStr);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die($e->getMessage());
}

// run a query: alle data
echo'<h2>Toon alle data</h2>';
$sql="SELECT*FROM users";

try {
	$result=$conn->query($sql);
} catch (PDOException $e) {
	die($e->getMessage());
}

// display some data
while($row=$result->fetch(PDO::FETCH_ASSOC)){
	echo'<p>'.$row['username'].'</p>';
	echo'<p>'.$row['password'].'</p>';
	echo'<p>'.$row['email'].'</p>';
	echo'<p>'.$row['created'].'</p><hr />';
}

 ?>