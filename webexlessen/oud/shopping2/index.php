<?php 

include 'includes/config.inc.php';

// items opzoeken en uit de databank opvragen

// als verzonden en POST opvraging bestaat   
if ($_POST and !empty($_POST['opvraging'])) {
  $query = $conn->prepare('SELECT productNaam, productBeschrijving, productCat, productAfbeelding, productPrijs FROM producten WHERE productNaam LIKE :productNaam');
  $data = array('productNaam'=>'%'.$_POST['opvraging'].'%');
  $query->execute($data);
} elseif ($_POST and !empty($_POST['productBeschrijving']) and $_POST['productBeschrijving']!='alle') {
  $query = $conn->prepare('SELECT productNaam, productBeschrijving, productCat, productAfbeelding, productPrijs FROM producten WHERE productBeschrijving=:productBeschrijving ORDER BY id DESC;');
  $data = array('productBeschrijving' => utf8_decode($_POST['productBeschrijving']));
  $query->execute($data);  
}else{
  $query = $conn->prepare('SELECT productNaam, productBeschrijving, productCat, productAfbeelding, productPrijs FROM producten ORDER BY rowid DESC;');
  $query->execute();
}

$items = $query->fetchAll();



// Start HTML afdrukken met pagina titel
$pageTitle = 'Overzicht'; 
include 'includes/starthtml.inc.php';
?>

<?php if (isset($_SESSION['bericht'])): ?>
  <!-- flash melding tonen als er berichten zijn -->
  <div class="alert">
    <?= $_SESSION['bericht'] ?>
  </div>
  <?php unset($_SESSION['bericht']) ?>
<?php endif ?>


<?php if (count($items)): ?>
  <table>
      <tr>
        <th>Naam</th>
        <th>Beschrijving</th>
        <th>Categorie</th>
        <th>Afbeelding</th>
        <th>Productprijs</th>
      </tr>
    
    <?php foreach ($items as $item): ?>
      
      <tr>
      <td><a href="item-bekijken.php?id=<?= $item['id'] ?>"><?= utf8_encode($item['productNaam'] )?></a></td>
        <td><?= utf8_encode($item['productBeschrijving'] )?></td>
        <td><?= $item['productCat'] ?></td>
        <td><?= $item['productAfbeelding'] ?></td>
        <td><?= $item['productPrijs'] ?></td>
        <td>
          <?php if (isset($_SESSION['username'])): ?>
            <!-- enkel tonen indien ingelogd -->
            <!-- zorg dat het ID bij de links afgedrukt wordt -->
            <ul class="edit-buttons">
              <li>
                <a href="item-aanpassen.php?id=<?= $item['id'] ?>" class="aanpassen"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="aanpassen"></span>aanpassen</a>
                <a href="item-verwijderen.php?id=<?= $item['id'] ?>" class="verwijderen"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="bottom" title="verwijderen"></span>verwijderen</a>
              </li>
            </ul>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <textarea name="opvraging" id="opvraging" rows='5' cols="61" placeholder='Op welk domein wilt u zoeken?'><?php if (!empty($_POST['opvraging'])) { print $_POST['opvraging']; } ?></textarea><br />
    <input type="submit" value="Zoek">
  </form>


  <?php else: ?>
    <p>Er werden nog geen items gevonden. Voeg er eentje toe!</p>
  <?php endif ?>


<?php 

// Einde html afdrukken
include 'includes/endhtml.inc.php' 

?>






