<?php
session_start();
include "script/function8s.php";
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
<?php
  if($_SESSION['user']){
    echo "vous etes connecté  ";
  }else{
    echo "pensez a vous deconnecter";
  }
  ?>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>