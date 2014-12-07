<?php include_once 'conn.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht producten</title>
</head>
<body>
	<h1>Project Shopping</h1>
	<h2>Overzicht producten</h2>

<?php

try {

	$sql = "SELECT rowid FROM producten";
	$result = $db->query($sql);

	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Product</th>";
	echo "<th>Beschrijving</th>";
	echo "<th>Categorie</th>";
	echo "<th>Afbeelding</th>";
	echo "<th>Prijs</th><th>Verwijderen</th><th>Aanpassen</th>";
	echo "</tr>";
		foreach ($result as $row) {
			echo "<tr><td>".$row['productNaam']."</td>";
			echo "<td>".$row['productBeschrijving']."</td>";
			echo "<td>".$row['productCat']."</td>";
			echo "<td>".$row['productAfbeelding']."</td>";
			echo "<td>".$row['productPrijs']."</td>";
			echo "<td><a href=delete_product.php?rowid=".$row['rowid'].">Verwijderen</a></td>";
			echo "<td><a href=form_update_product.php?rowid=".$row['rowid'].">Aanpassen</a></td></tr>";
		}
	echo "</table>";
	$db = NULL;

} catch (exception $ex) {
	print 'Fout: '. $ex->getMessage();
}
?>

</body>
</html>