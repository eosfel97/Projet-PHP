<?php
require "./script/function.php";
if (!empty($_POST)) {
    if ($_POST["text"]) {
        $text = strip_tags($_POST["text"]);
    }

    if (!empty($_POST)) {
        if ($_POST["key"]) {
            $key = strip_tags($_POST["key"]);
        }
    }
    if ($_POST["action"]) {
        $action = strip_tags($_POST["action"]);
    }

    switch ($action) {
        case "encodeVigenere":
            $result = codeVigenere($text, $key);
            break;
        case "decodageVigenere":
            $result = uncodeVigenere($text, $key);
            break;
            $result = "vous devez d'abord choisir une méthode";
        default:
    }
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>test</title>
  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
<form class="row g-3 " method="POST">
  <div class="col-md-10">
    <label for="text" class="form-label"> le  Message :</label>
    <textarea name="text" class="form-control border border-3"></textarea>
  </div>
  <div class="col-md-10">
    <label for="key" class="form-label">la clé :</label>
    <input type="text" class="form-control"  name="key">
  </div>
  <div class="form-group col-md-10">
    <label for="method" class="form-label">Action a effectuer</label>
    <select class="form-select border border-3" name="action">
      <option value="">--choisissez l'action--</option>
      <option value="encodeVigenere">encodage par Vigenère</option>
      <option value="decodageVigenere">decodage par Vigenère</option>

    </select>
  </div>
  <div class="col-12">
  <button class="btn btn-primary" type="reset" >ANNULER</button>
  <button class="btn btn-primary" type="submit">ViGENERISER</button>
  </div>
</form>
<p>//////////////////////////////////////////////////////////////</p>
<?php if ($result): ?>
  <p>le texte : <?php echo $text; ?> <br>
  avec la clé : <?php echo $key; ?> <br>
  renvoie le résultat:  <?php echo $result; ?></p>
<?php endif?>
<p>//////////////////////////////////////////////////////////////</p>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>