<?php 

try {
	$db = new PDO('sqlite:shopping.sqlite');
} catch (exception $ex) {
	echo 'Fout: '.$ex->getMessage();
}
?>