<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>exo 3</title>
  </head>
  <body>
  <?php include_once("./partial/_navBar.php") 
 ?>
<div class="container">
<h1>Exercice 3</h1>
        <?php
        $tab1 = ["moteur", "carotte", "haricot", "pomme de terre", "usine", "salade", "navet", "marteau"];
        ?>
        <p>voici les éléments du tableau de base:
        <ul>
            <li><?php echo $tab1[0]; ?></li>
            <li><?php echo $tab1[1]; ?></li>
            <li><?php echo $tab1[2]; ?></li>
            <li><?php echo $tab1[3]; ?></li>
            <li><?php echo $tab1[4]; ?></li>
            <li><?php echo $tab1[5]; ?></li>
            <li><?php echo $tab1[6]; ?></li>
            <li><?php echo $tab1[7]; ?></li>
        </ul>
        </p>
        <h3>Premier exercice:</h3>
        <p>retirer les 3 intrus: et afficher les valeurs</p>
        <p>résultat:
            <?php
                array_shift($tab1);
               array_splice($tab1,3,1);
               array_pop($tab1)

            ?>
        <ul>
            <li><?php echo $tab1[0]; ?></li>
            <li><?php echo $tab1[1]; ?></li>
            <li><?php echo $tab1[2]; ?></li>
            <li><?php echo $tab1[3]; ?></li>
            <li><?php echo $tab1[4]; ?></li>
        </ul>
        </p>
        <h3>Second exercice:</h3>
        <p>transformaer la chaîne de caractère "bleu, vert, noir, rouge, jaune" en un tableau</p>
        <p>ajouter en première position du tableau la valeur "violet"</p>
        <p>résultat:
            <?php
            // creation du tableau
            $tab2 = ["bleu","vert","noir","rouge","jaune"];
            // ajoute de violet aux debut du tableau
            array_unshift($tab2,"violet");
            // print_r($tab2) ;
            ?>
                       <ul>
                <li><?php echo $tab2[0]; 
                    ?></li>
                <li><?php  echo $tab2[1]; 
                    ?></li>
                <li><?php  echo $tab2[2]; 
                    ?></li>
                <li><?php  echo $tab2[3]; 
                    ?></li>
                <li><?php  echo $tab2[4]; 
                    ?></li>
                <li><?php  echo $tab2[5]; 
                    ?></li>
            </ul>
        </p>
</div>
    
<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>