<?php 

include 'includes/config.inc.php';

if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

// Deze pagina moet beveiligd zijn!

// Zorg dat het formulier opnieuw ingevuld wordt!
// Zorg dat de foutmeldingen onderaan de pagina enkel getoond worden als er foutmeldingen zijn

// indien het formulier verzonden is
//     inhoud valideren!
//     inhoud aanpassen in DB
//     indien gelukt doorsturen naar de index pagina
//            eventueel met een flash message
// anders
//     gegevens opvragen en tonen in het formulier

if ($_POST) {
  if (empty(trim($_POST['productNaam']))) {
    $foutmeldingen['productNaam'] = 'Het naam-veld is verplicht.';
  }

  if (empty(trim($_POST['productBeschrijving']))) {
    $foutmeldingen['productBeschrijving'] = 'Het beschrijving-veld is verplicht.';
  }

  if (empty(trim($_POST['productCat']))) {
    $foutmeldingen['productCat'] = 'Het categorie-veld is verplicht.';
  }

  if (empty(trim($_POST['productAfbeelding']))) {
    $foutmeldingen['productAfbeelding'] = 'Het afbeelding-veld is verplicht.';
  }

  if (empty(trim($_POST['productPrijs']))) {
    $foutmeldingen['productPrijs'] = 'Het prijs-veld is verplicht.';
  }

  // if (empty(trim($_POST['aantal']))) {
  //   $foutmeldingen['aantal'] = 'Het aantal-veld is verplicht.';
  // }

  $_POST['domein'] = utf8_decode($_POST['domein']);
  $_POST['streek'] = utf8_decode($_POST['streek']);
  $_POST['soort'] = utf8_decode($_POST['soort']);
  $_POST['opmerking'] = utf8_decode($_POST['opmerking']);
  
  if (empty($foutmeldingen)) {
    $getal = str_replace(',', '.', $_POST['prijs']);
    $query = $conn->prepare('UPDATE voorraad SET domein=:domein, streek=:streek, soort=:soort, jaar=:jaar, prijs=:prijs, aantal=:aantal, opmerking=:opmerking WHERE id=:id;');
    $data = array('domein' => $_POST['domein'], 'streek' => $_POST['streek'], 'soort' => $_POST['soort'], 'jaar' => $_POST['jaar'],  'prijs' => $getal, 'aantal' => $_POST['aantal'], 'opmerking' => $_POST['opmerking'], 'id' => $_GET['id']);
    $query->execute($data);

    if ($query->rowCount()) {
      $_SESSION['bericht'] = 'Het aanpassen is gelukt!';
      header('location: index.php');
      exit;
    } else {
      $foutmeldingen['algemeen'] = 'Er is iets misgelopen. Probeer opnieuw!';
    }
  }
} else {
  $query = $conn->prepare('SELECT * FROM voorraad WHERE id=:id;');
  $data = array('id' => $_GET['id']);
  $query->execute($data);
  $_POST = $query->fetch();
}



// Start HTML afdrukken met pagina titel
$pageTitle = 'Item aanpassen - Overzicht'; 
include 'includes/starthtml.inc.php';
?>


<a href="index.php">&laquo; Terug naar lijst</a>
<br /><br />
<h1>Item aanpassen</h1>
<p>Gebruik het onderstaande formulier om een bestaand item aan te passen</p>

<hr>

<?php if (isset($foutmeldingen)): ?>
  <div class="foutmelding">
    Er zijn <strong>foutmeldingen</strong> gevonden:

    <ul>
      <?php foreach ($foutmeldingen as $melding): ?>
        <li><?= $melding ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $_GET['id'] ?>" method="post">
  <?php include 'includes/itemformulier.inc.php' ?>
  <input type="submit" class="btn btn-default" value="Aanpassen">
</form>

<?php 

// Einde html afdrukken
include 'includes/endhtml.inc.php' 

?>




