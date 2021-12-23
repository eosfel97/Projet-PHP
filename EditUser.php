<?php
session_start();
$data = json_decode(file_get_contents("./data/jsonDB.json"), true);
$dataUser = $data["user"];
$x = -1;

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>EDITUSER</title>
  </head>
  <body>
  <?php include_once("./partial/_navBar.php") 

 ?>
<div class="container">
<h1>Menbres</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id :</th>
      <th scope="col">Nom :</th>
      <th scope="col">Email :</th>
      <th scope="col">Role :</th>
    </tr>
  </thead>
  <?php foreach ($dataUser as $user): ?>
    <?php $x++;?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $x;?></th>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['email'];?></td>
      <?php foreach ($user["role"] as $user["role"]): ?>
      <td><?php print_r($user["role"])?></td>
      <?php endforeach ?>
    </tr>
  </tbody>
  <?php endforeach ?>
</table>
</div>
    
<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>