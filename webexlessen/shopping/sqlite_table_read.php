
<?php
  try
	{
	//open the database
	$db = new PDO('sqlite:shopping.sqlite');
        
        //create the table
        $db->exec("CREATE TABLE rassen (rowid INTEGER PRIMARY KEY, productNaam TEXT, productBeschrijving TEXT, productCat TEXT, productAfbeelding TEXT, productPrijs TEXT)");
        
        print "<table border=1>";
        print "<tr><th>naam</th><th>beschrijving</th><th>Categorie</th><th>Afbeelding</th><th>Prijs</th></tr>";
        $result = $db->query("SELECT * FROM producten");
        foreach ($result as $row) {
           print "<tr><td>".$row['productNaam']."</td>";
           print "<td>".$row['productBeschrijving']."</td>";
           print "<td>".$row['productCat']."</td>";
           print "<td>".$row['productAfbeelding']."</td>";
           print "<td>".$row['productPrijs']."</td>";
           print "<td>Aanpassen</td>";
           print "<td>Verwijderen</td>";
        }
        print "</table>";
        
        $db = NULL;
        }
 catch (PDOException $e){
     print 'Fout: '.$e->getMessage();
 }
?>