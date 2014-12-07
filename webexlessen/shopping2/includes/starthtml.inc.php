<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?></title>
  <link rel="stylesheet" href="css/stijl.css">
</head>
<body>

  <!-- Navigatie balk -->
  <nav class="navigatiebalk" role="navigation">
    <div class="container">
      <div class="navigatie-hoofd">
        <a href="index.php"><?= $pageTitle ?></a>
      </div>
      <br />

      <?php if (isset($_SESSION['username'])): ?>
        
        <!-- Enkel tonen indien ingelogd -->
        <ul>
          <li>
            <button type="button" onclick="location.href='item-toevoegen.php'">Item toevoegen</button>
          </li>
        </ul>
        <br /><br />

        <!-- Enkel tonen indien ingelogd -->
        <p>U bent ingelogd als <strong><?= $_SESSION['username'] ?></strong></p><br />

        <!-- Als men ingelogd is tonen we de logout knop, en anders tonen we de login knop -->
        <p><a href="logout.php" class="navbar-link">Uitloggen<span data-toggle="tooltip" data-placement="bottom" title="uitloggen"></span></a></p>

      <?php else: ?>

        <p><a href="login.php" class="navbar-link">Inloggen</a> <span></span></p>

      <?php endif ?>

    </div>
  </nav>

  <!-- inhoud -->
  <div class="container">