<?php 

// Item verwijderen
// Deze pagina moet beveiligd zijn!

include 'includes/config.inc.php';
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

if (isset($_GET['id'])) {
  // Zoek het aantal flessen op voor het gegeven id
  $query = $conn->prepare('SELECT aantal FROM voorraad WHERE id=:id LIMIT 1');
  $data = array('id' => $_GET['id']);
  $query->execute($data);
  
  // Kijk of er rijen zijn in de eerder uitgevoerde querry, zoniet moet er iets fout gelopen zijn
  if ($query->rowCount()) {
    // Haal het eerste en het enige item (sinds LIMIT 1) uit de querry en beoordeel het aantal
	$result = $query->fetch();
	if ($result['aantal'] == 0) {
		// Is het aantal nul? => verwijder de rij met het gegeven id
		  $query = $conn->prepare('DELETE FROM voorraad WHERE id=:id');
		  $data = array('id' => $_GET['id']);
		  $query->execute($data);

		  // Is het verwijderen gelukt of zijn er fouten?
		  if ($query->rowCount()) {
			$_SESSION['bericht'] = 'Item werd verwijderd!';
		  } else {
			$_SESSION['bericht'] = 'Er is iets misgelopen. Probeer opnieuw!';
		  }
	} else {
		// Geef de gebruiker een bericht met het aantal flessen dat nog over is, de fles kan dus niet verwijderd worden.
		$_SESSION['bericht'] = 'Je hebt nog ' . $result['aantal'] . ' fles(sen) over. Item kan nog niet verwijderd worden.';
	}
  } else {
	$_SESSION['bericht'] = 'Er is iets misgelopen. Probeer opnieuw!';
  }
  
}

header('location: index.php');
exit;