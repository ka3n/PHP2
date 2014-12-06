
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:shopping.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE shopping (id INTEGER PRIMARY KEY, naam TEXT, beschrijving TEXT, afbeelding TEXT, prijs INTEGER)");
        
        //insert data
        $db->exec("INSERT INTO shopping (naam, beschrijving, afbeelding, prijs) VALUES ('test1','beschrijving1', 'afb1', 25);".
                  "INSERT INTO shopping (naam, beschrijving, afbeelding, prijs) VALUES ('test2','beschrijving2', 'afb2', 66); ".
                  "INSERT INTO shopping (naam, beschrijving, afbeelding, prijs) VALUES ('test3','beschrijving3', 'afb3', 5);");
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>