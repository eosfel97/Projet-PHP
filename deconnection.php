<?php
session_start();
unset($_SESSION["user"]);
header("Location: /");

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>deconnection</title>
  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
</div>

<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>