
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:honden.sqlite');
        echo "verbonden met de datebase";
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>