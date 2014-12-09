<?php

include_once 'conn.inc.php';

try {
	$rowid = (int)$_REQUEST['rowid'];
	$sql = "SELECT * FROM producten WHERE rowid=$rowid";
	$result = $db->query($sql);
	$product = $result->fetch(PDO::FETCH_ASSOC);
} catch (exception $ex) {
	print 'Fout: '. $ex->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product aanpassen</title>
</head>
<body>
	<h1>Project Shopping</h1>
	<h2>Product aanpassen</h2>
	<form name="insertProduct" method="post" action="update_product.php">
		<table border="1" cellpadding="3">
			<tr>
				<td>Naam van het product</td>
				<td><input type="text" name="productNaam" value="<?=$product['productNaam']?>"></td>
			</tr>
			<tr>
				<td>Beschrijving van het product</td>
				<td><textarea name="productBeschrijving" id="productBeschrijving" cols="30" rows="10"><?=$product['productBeschrijving']?></textarea></td>
			</tr>
			<tr>
				<td>Categorie</td>
				<td><input type="text" name="productCat" value="<?=$product['productCat']?>"></td>
			</tr>
			<tr>
				<td>Afbeelding</td>
				<td><input type="text" name="productAfbeelding" value="<?=$product['productAfbeelding']?>"></td>
			</tr>
			<tr>
				<td>Prijs</td>
				<td><input type="text" name="productPrijs" value="<?=$product['productPrijs']?>"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit name="submit>Aanpassen</button></td>
			</tr>
		</table>
		<input type="hidden" name="rowid" value="<?=$rowid?>">
	</form>
</body>
</html>