<?php 

include 'includes/config.inc.php';

  $query = $conn->prepare('SELECT * FROM voorraad WHERE id=:id LIMIT 1;');
  $data = array('id' => $_GET['id']);
  $query->execute($data);
  $item = $query->fetch();



// Start HTML afdrukken met pagina titel
$pageTitle = 'Item aanpassen - Overzicht'; 
include 'includes/starthtml.inc.php';
?>

<br /><br />
<a href="index.php">&laquo; Terug naar lijst</a>

<hr>
<?php if (count($item)): ?>


<h1><?= utf8_encode($item['domein'] )?></h1>
  <table>
      <tr>
        <th>Domein</th><td><?= utf8_encode($item['domein'] )?></td>
      </tr>
      <tr>
        <th>Streek</th><td><?= utf8_encode($item['streek'] )?></td>
      </tr>
      <tr>
        <th>Soort</th><td><?= utf8_encode($item['soort'] )?></td>
      </tr>
      <tr>
        <th>Jaar</th><td><?= utf8_encode($item['jaar'] )?></td>
      </tr>
      <tr>
        <th>Prijs</th><td><?= utf8_encode($item['prijs'] )?></td>
      </tr>
      <tr>
        <th>Aantal</th><td><?= utf8_encode($item['aantal'] )?></td>
      </tr>
      <tr>
        <th>Opmerking</th><td><?= utf8_encode($item['opmerking'] )?></td>
      </tr>
  </table>
<?php else: ?>
  <p>Er werden nog geen items gevonden. Voeg er eentje toe!</p>
<?php endif ?>





