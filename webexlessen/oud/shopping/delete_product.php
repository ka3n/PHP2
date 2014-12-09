<?php

include_once 'conn.inc.php';

try {
	$rowid = (int)$_REQUEST['rowid'];
	$sql = "DELETE FROM producten WHERE rowid=$rowid";
	$db->query($sql);

	header("location: read_table_producten.php");
	exit;

} catch (exception $ex) {
	print 'Fout: '. $ex->getMessage();
}
?>