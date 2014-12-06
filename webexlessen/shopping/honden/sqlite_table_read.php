
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:shopping.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE shopping (id INTEGER PRIMARY KEY, naam TEXT, beschrijving TEXT, afbeelding TEXT, prijs INTEGER)");

        
        //insert data
        /*$db->exec("INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Labrador','Tank',2);".
                "INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Husky','Blacky', 7); ".
                "INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Golden Retriever','Summer', 5);");*/
        print "<table border=1>";
        print "<tr><th>Id</th><th>naam</th><th>beschrijving</th><th>afbeelding</th></th><th>prijs</th></tr>";
        $result = $db->query("SELECT * FROM rassen");
        foreach ($result as $row) {
           print "<tr><td>".$row['id']."</td></tr>";
           print "<tr><td>".$row['naam']."</td></tr>";
           print "<tr><td>".$row['beschrijving']."</td></tr>";
           print "<tr><td>".$row['afbeelding']."</td></tr>";
           print "<tr><td>".$row['prijs']."</td></tr>";
        }
        print "</table>";
        
        $db = NULL;
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>