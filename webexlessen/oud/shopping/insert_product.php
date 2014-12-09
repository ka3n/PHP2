<?php

include_once 'conn.inc.php';

try {
	$sql = "INSERT INTO(productNaam, productBeschrijving, productCat, productAfbeelding, productPrijs) VALUES(?,?,?,?,?)";

	$stmt = $db->prepare($sql);

	$stmt->execute(array($_POST['productNaam'], $_POST['productBeschrijving'], $_POST['productCat'], $_POST['productAfbeelding'], $_POST['productPrijs']));

	header("location: read_table_producten.php");
	exit;

} catch (exception $ex) {
	print 'Fout: '. $ex->getMessage();
}
?>