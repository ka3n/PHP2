
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:honden.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE rassen (id INTEGER PRIMARY KEY, ras TEXT, naam TEXT, leeftijd INTEGER)");
        
        //insert data
        /*$db->exec("INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Labrador','Tank',2);".
                "INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Husky','Blacky', 7); ".
                "INSERT INTO rassen (ras,naam,leeftijd) VALUES ('Golden Retriever','Summer', 5);");*/
        print "<table border=1>";
        print "<tr><th>Id</th><th>Ras</th><th>Naam</th><th>Leeftijd</th></tr>";
        $result = $db->query("SELECT * FROM rassen");
        foreach ($result as $row) {
           print "<tr><td>".$row['id']."</td>";
           print "<td>".$row['ras']."</td>";
           print "<td>".$row['naam']."</td>";
           print "<td>".$row['leeftijd']."</td>";
        }
        print "</table>";
        
        $db = NULL;
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>