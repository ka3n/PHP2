<div>
  <label for="inputproductNaam">Naam</label><br />
  <input value="<?php if (!empty($_POST['productNaam'])) { print utf8_encode($_POST['productNaam']); } ?>" size="60" type="text" class="form-control" id="inputproductNaam" placeholder="Geef het productNaam in" name="productNaam"><br /><br />
</div>
<div>
  <label for="inputproductBeschrijving">Beschrijving</label><br />
  <input value="<?php if (!empty($_POST['productBeschrijving'])) { print utf8_encode($_POST['productBeschrijving']); } ?>" size="60" type="text" class="form-control" id="inputproductBeschrijving" placeholder="Geef de productBeschrijving in" name="productBeschrijving"><br /><br />
</div>
<div>
  <label for="inputproductCat">Categorie</label><br />
  <input value="<?php if (!empty($_POST['productCat'])) { print utf8_encode($_POST['productCat']); } ?>" size="60" type="text" class="form-control" id="inputproductCat" placeholder="Geef de productCat in" name="productCat"><br /><br />
</div>
<div>
  <label for="inputproductAfbeelding">Afbeelding</label><br />
  <input value="<?php if (!empty($_POST['productAfbeelding'])) { print utf8_encode($_POST['productAfbeelding']); } ?>" size="60" type="text" class="form-control" id="inputproductAfbeelding" placeholder="Geef het productAfbeelding in" name="productAfbeelding"><br /><br />
</div>
<div>
  <label for="inputproductproductPrijs">Prijs</label><br />
  <input value="<?php if (!empty($_POST['productPrijs'])) { print utf8_encode($_POST['productPrijs']); } ?>" size="60" type="text" class="form-control" id="inputproductPrijs" placeholder="Geef de productPrijs in" name="productPrijs"><br /><br />
</div>