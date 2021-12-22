<?php
session_start();
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>exercices</title>
  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
    <h1>exo page</h1>
    <ol>
        <li>primier exo: si vous voyez ce site ,c'est que c'est fait</li>
        <li><a href="/exercices2.php">exercice 2</a>: décoder des chaines de caractére</li>
        <li><a href="/exercices3.php">exercice 3</a>:travailler avec des tableaux</li>
        <li><a href="/exercices4.php">exercice 4</a>:travailler avec des tableaux</li>
        <li><a href="/exercices5.php">exercice 5</a>:travailler avec des formulaires</li>
        <li><a href="/exercices_5_bis.php">exercice 5bis</a>: </li>
        <li><a href="/exercices6.php">exercice 6</a>:boucles et jeux</li>
        <li><a href="/exercices7.php">exercice 7</a>:function</li>
        <li><a href="/exercices8.php">exercice 8</a>: prise de notes </li>
        
    </ol>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>