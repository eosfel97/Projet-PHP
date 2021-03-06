<?php
session_start();

if(!$_SESSION["user"]){
  header("Location: /connection.php" );
}
extract($_SESSION["user"],EXTR_PREFIX_ALL,"user");

include "script/function8s.php";
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>mon compte</title>
  </head>
  <body>
  <?php include_once("./partial/_navBar.php") 
 ?>
<div class="container">
    <h1>Mon compte</h1>
    <div class="card bg-danger" >
  <div class="card-body">
    <p class="card-text">Prénom: <?php echo $user_firstname; ?></p>
    <p class="card-text">nom: <?php echo $user_name; ?></p>
    <p class="card-text">mail: <?php echo $user_email;?></p>
    <?php 
           if (in_array("ROLE_ADMIN", $_SESSION["user"]["role"])) :
           ?>
   <a href="Edituser.php" class="btn btn-secondary">Editer les utilisateurs</a>

    <?php endif?>
    <?php if($user_files ?? false)  :?>
    <p class="card-text">Photo de profil : <img src="<?php echo UPLOADFOLDER . $user_files ?>"alt =""></p>
    <?php else : ?>
      <p>vous n'avez pas de photo de profile</p>
      <?php endif ?>
<a href="modifier.php" class="btn btn-secondary">Modifier mes information</a>
  </div>
</div>
</div>
    
<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>