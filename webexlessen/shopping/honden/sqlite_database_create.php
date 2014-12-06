
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:shopping.sqlite');
        echo "verbonden met de datebase";
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>