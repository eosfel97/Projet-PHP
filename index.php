<!-- 2.:MwteJdM4S(rL[696~ -->
<?php
session_start();
$nameUtilisateur = $_SESSION["user"]["name"] ?? "";
// var_dump($_SESSION);
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Home</title>
  </head>
  <body>
 <?php include_once "./partial/_navBar.php"
?>
<div class="container">
  <?php
if ($_SESSION["user"] ?? false) {

    echo "<h1>Bienvenu $nameUtilisateur  sur mon site</h1>";
  }
  ?>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>