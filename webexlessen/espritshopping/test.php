<?php
function Alert($subject,$do){
	if($do){
		echo $subject.' -> done<br>';
	}else{
		echo $subject.' -> skip/fail<br>';
	}
}

$db = new SQLite3('db/mydb.sqlite');

//Drop Table
$do=$db->exec('DROP TABLE IF EXISTS `users`');
Alert('DROP TABLE',$do);
unset($do);

//Create Table
$do=$db->exec('CREATE TABLE `users` (`id` INTEGER PRIMARY KEY, `name` VARCHAR(128), `email` VARCHAR (128))');
Alert('CREATE TABLE',$do);
unset($do);

//Insert Row 1
$do=$db->exec('INSERT INTO `users` (`name`, `email`) VALUES ("Albert Einstein", "einstein@example.com")');
Alert('INSERT',$do);
unset($do);

//Insert Row 2
$do=$db->exec('INSERT INTO `users` (`name`, `email`) VALUES ("Stephen Chow", "chow@example.com")');
Alert('INSERT',$do);
unset($do);

//Fetch Array
echo 'Result:<br>';
$query="SELECT * FROM `users`";
$res=$db->query($query);
while($row=$res->fetchArray()){
	$id=$row['id'];
	$name=$row['name'];
	$email=$row['email'];
	echo '	' . $name . ' : ' . $email . '<br>';
}

echo '<br>';

//Update Row
$do=$db->exec("UPDATE `users` SET `name`='Stephen Hawking', `email`='hawking@example.com' WHERE `id`=2");
Alert('UPDATE',$do);
unset($do);

//Fetch Array update #1
echo 'Result (update #1):<br>';
$query="SELECT * FROM `users`";
$res=$db->query($query);
while($row=$res->fetchArray()){
	$id=$row['id'];
	$name=$row['name'];
	$email=$row['email'];
	echo '	' . $name . ' : ' . $email . '<br>';
}

echo '<br>';

//Delete Row
$do=$db->exec("DELETE FROM `users` WHERE `id`=2");
Alert('DELETE',$do);
unset($do);

//Fetch Array update #2
echo 'Result (update #2):<br>';
$query="SELECT * FROM `users`";
$res=$db->query($query);
while($row=$res->fetchArray()){
	$id=$row['id'];
	$name=$row['name'];
	$email=$row['email'];
	echo '	' . $name . ' : ' . $email . '<br>';
}

$db->close();
?>