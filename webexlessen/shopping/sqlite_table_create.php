
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:honden.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE rassen (id INTEGER PRIMARY KEY, ras TEXT, naam TEXT, leeftijd INTEGER)");
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>