<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>test</title>
  </head>
  <body>
  <?php include_once("./partial/_navBar.php") 
 ?>
<div class="container">
<form class="row g-3 " method="POST">
  <div class="col-md-10">
    <label for="message" class="form-label"> le  Message :</label>
    <textarea name="text" class="form-control border border-3"></textarea>
  </div>
  <div class="col-md-10">
    <label for="key" class="form-label">la clé :</label>
    <input type="text" class="form-control" id="cle" name="key">
  </div>
  <div class="form-group col-md-10">
    <label for="method" class="form-label">Action a effectuer</label>
    <select class="form-select border border-3" name="action">
      <option value="">--choisissez l'action--</option>
      <option value="encodeVigenère">encodage par Vigenère</option>
      <option value="decodageVigenère">decodage par Vigenère</option>

    </select>
  </div>
  <div class="col-12">
  <button class="btn btn-primary" type="reset" >ANNULER</button>
  <button class="btn btn-primary" type="submit">ViGENERISER</button>
  </div>
</form>

</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>