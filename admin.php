<?php
session_start();
if ($_SESSION["user"]) {
    if (!in_array("ROLE_ADMIN", $_SESSION['user']["role"])) {
        header("Location: /");
    }

} else {
    header("Location:/");
}
include "script/function8s.php";

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>page administrateur</title>

  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
    <h1>page administrateur Bienvenue</h1>
</div>

<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>