<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Producten toevoegen</title>
</head>
<body>
	<h1>Shopping</h1>
	<h2>Product toevoegen</h2>
	<form name="insertProduct" method="post" action="update_product.php">
		<table border="1" cellpadding="3">
			<tr>
				<td>Naam van het product</td>
				<td><input type="text" name="productNaam"></td>
			</tr>
			<tr>
				<td>Beschrijving van het product</td>
				<td><textarea name="productBeschrijving" id="productBeschrijving" cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td>Categorie</td>
				<td><input type="text" name="productCat"></td>
			</tr>
			<tr>
				<td>Afbeelding</td>
				<td><input type="text" name="productAfbeelding" value="Geen afbeelding"></td>
			</tr>
			<tr>
				<td>Prijs</td>
				<td><input type="text" name="productPrijs"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit name="submit>Toevoegen</button>
				<button type="reset">Leegmaken</button></td>
			</tr>
		</table>
	</form>
	<?php

	?>
</body>
</html>