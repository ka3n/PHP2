<?php 

include 'includes/config.inc.php';

if (isset($_SESSION['username'])) {
  header('location: index.php');
}

// Zorg dat de gebruiker kan inloggen als het formulier verzonden is
// Onthoud de username in de sessie zodat we deze kunnen afdrukken in het menu!

if ($_POST) {
  if (empty(trim($_POST['username']))) {
    $foutmeldingen['username'] = 'Username veld is verplicht!';
  }

  if (empty(trim($_POST['password']))) {
    $foutmeldingen['password'] = 'Paswoord veld is verplicht!';
  }

  if (empty($foutmeldingen)) {
    // Username opzoeken
    $query = $conn->prepare('SELECT * FROM gebruikers WHERE username=:username LIMIT 1;');
    $data = array('username'=>$_POST['username']);
    $query->execute($data); //commando wordt uitgevoerd

    // Als er rijen gevonden zijn gaan we het wachtwoord controleren
    if ($query->rowCount()) {
      $dbUser = $query->fetch(); // De gebruiker opvragen uit de DB
      if ($dbUser['password'] == $_POST['password']) {
        // Inloggen door de sessie variabele aan te maken
        $_SESSION['username'] = $dbUser['username'];
        header('location: index.php');
      }
    }

    // Als we nog steeds niet ingelogd zijn tonen we een foutmelding.
    if (!isset($_SESSION['username'])) {
      $foutmeldingen['algemeen'] = 'De login gegevens kloppen niet! Probeer opnieuw.';
    }
  }
}

// Start HTML afdrukken met pagina titel
$pageTitle = 'Inloggen - Overzicht'; 
include 'includes/starthtml.inc.php';
?>

<a href="index.php">&laquo; Terug naar lijst</a>

<br /><br />
<h1>Inloggen</h1>
<p>Gebruik het onderstaande formulier om in te loggen.</p>

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


<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="inlogformulier" role="form">
  <div>
    <label for="inputUsername">Username</label><br /><br />
    <div>
      <input value="<?php if (!empty($_POST['username'])) { print $_POST['username']; } ?>" type="text" name="username" class="form-control" id="inputUsername" placeholder="Username"> <!-- de gebruikersnaam blijft staan wanneer je het formulier verzendt, zonder dat het wachtwoord klopt -->
    </div><br /><br />
  </div>
  <div >
    <label for="inputPassword">Paswoord</label><br /><br />
    <div>
      <input type="password" name="password" id="inputPassword" placeholder="Password">
    </div><br /><br />
  </div>
  
  <div>
    <div class="verzendknop">
      <input type="submit" value="Inloggen">
    </div>
  </div>
</form>

<?php 

// Einde html afdrukken
include 'includes/endhtml.inc.php' 

?>







