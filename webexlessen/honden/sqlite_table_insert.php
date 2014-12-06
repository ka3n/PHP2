
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:honden.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE rassen (id INTEGER PRIMARY KEY, ras TEXT, naam TEXT, leeftijd INTEGER)");
        
        //insert data
        $db->exec("INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Labrador','Tank',2);".
                "INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Husky','Blacky', 7); ".
                "INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Golden Retriever','Summer', 5);");
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>