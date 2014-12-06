
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:shopping.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE shopping (id INTEGER PRIMARY KEY, naam TEXT, beschrijving TEXT, afbeelding TEXT, prijs INTEGER)");
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>