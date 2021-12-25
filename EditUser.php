<?php
session_start();
$data = json_decode(file_get_contents("./data/jsonDB.json"), true);
$dataUser = $data["user"];
$x = -1;
$counter = 0;

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
    <?php $x++; $counter ++;?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $x;?></th>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['email'];?></td>
      <?php foreach ($user["role"] as $user["role"]): ?>
      <td><?php print_r($user["role"])?></td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user<?= $counter?>">Modifier</button>
</td>
      <?php endforeach ?>
    </tr>
    <div class="modal fade" id="user<?= $counter?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $user['name'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
<div class="form-group col-md-10 mt-5">
    <input type="text" class="form-control rounded-pill"   placeholder="Enter name" name="name" value="<?php echo $user['name'];?>" >
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="text" class="form-control rounded-pill"   placeholder="Enter first name" name="firstname" value="<?php echo $user['firstname'];?>"  >
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="email" class="form-control rounded-pill"   placeholder="Enter email" name="email" value="<?php echo $user['email'];?>" >
  </div>
  <button type="submit" class="btn btn-primary bg-danger mt-5 ms-5">Modifer les informations</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  </tbody>
  <?php endforeach ?>
</table>
</div>
    
<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>