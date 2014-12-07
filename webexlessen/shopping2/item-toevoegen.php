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
//     inhoud toevoegen aan DB
//     indien gelukt doorsturen naar de index pagina
//            eventueel met een flash message

if ($_POST) {
  if (empty(trim($_POST['domein']))) {
    $foutmeldingen['domein'] = 'Het domein-veld is verplicht.';
  }

  if (empty(trim($_POST['streek']))) {
    $foutmeldingen['streek'] = 'Het streek-veld is verplicht.';
  }

  if (empty(trim($_POST['soort']))) {
    $foutmeldingen['soort'] = 'Het soort-veld is verplicht.';
  }

  if (empty(trim($_POST['jaar']))) {
    $foutmeldingen['jaar'] = 'Het jaar-veld is verplicht.';
  }

  if (empty(trim($_POST['prijs']))) {
    $foutmeldingen['prijs'] = 'Het prijs-veld is verplicht.';
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
    $query = $conn->prepare('INSERT INTO voorraad VALUES domein=:domein, streek=:streek, soort=:soort, jaar=:jaar, prijs=:prijs, aantal=:aantal, opmerking=:opmerking, id=:id;');
    $data = array('domein' => $_POST['domein'], 'streek' => $_POST['streek'], 'soort' => $_POST['soort'], 'jaar' => $_POST['jaar'],  'prijs' => $getal, 'aantal' => $_POST['aantal'], 'opmerking' => $_POST['opmerking'], 'id' => $_GET['id']);
    $query->execute($data);

    if ($query->rowCount()) {
      $_SESSION['bericht'] = 'Het toevoegen is gelukt!';
      header('location: index.php');
      exit;
    } else {
      $foutmeldingen['algemeen'] = 'Er is iets misgelopen. Probeer opnieuw!';
    }
  }
}


// Start HTML afdrukken met pagina titel
$pageTitle = 'Nieuw item toevoegen - Overzicht'; 
include 'includes/starthtml.inc.php';
?>

<br /><br />
<a href="index.php">&laquo; Terug naar lijst</a>

<h1>Item toevoegen</h1>
<p>Gebruik het onderstaande formulier om een nieuw item toe te voegen</p>

<hr>

<?php if (isset($foutmeldingen)): ?>
  <div class="alert">
    Er zijn <strong>foutmeldingen</strong> gevonden:
    <ul>
      <?php foreach ($foutmeldingen as $melding): ?>
        <li><?= $melding ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
  <?php include 'includes/itemformulier.inc.php' ?>
  <input type="submit" class="btn btn-default" value="Toevoegen">
</form>

<?php 

// Einde html afdrukken
include 'includes/endhtml.inc.php' 

?>







