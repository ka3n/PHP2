<?php

include_once 'conn.inc.php';
$rowid = (int)$_REQUEST['rowid'];

try {
	$sql = "UPDATE producten SET productNaam=?, productBeschrijving=?, productCat=?, productAfbeelding=?, productPrijs=? WHERE rowid=$rowid";

	$stmt = $db->prepare($sql);

	$stmt->execute(array($_POST['productNaam'], $_POST['productBeschrijving'], $_POST['productCat'], $_POST['productAfbeelding'], $_POST['productPrijs']));

	header("location: read_table_producten.php");
	exit;

} catch (exception $ex) {
	print 'Fout: '. $ex->getMessage();
}
?>