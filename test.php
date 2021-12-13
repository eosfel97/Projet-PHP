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
    <h1>test php  page </h1>
    <pre>



    <?php
    // je suis un commentaire
    $var = "coucou";
    $var2 = "youhou";
    $var3 = $var;
    $var = "oups";
    $var2 = $var3; 
        echo $var2;
    ?>



    </pre>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>