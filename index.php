<?php
session_start();
$nameUtilisateur = $_SESSION["user"]["name"] ?? "";
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>gnahiet any</title>
  </head>
  <body>
 <?php include_once "./partial/_navBar.php"
?>
<div class="container">
  <?php
echo "<h1>Le site de gnahiet any</h1>";
if ($_SESSION["user"] ?? false) {

    echo "<h1>Bienvenu $nameUtilisateur  sur mon site</h1> ";
}
?>

</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>