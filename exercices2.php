<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>exercices</title>
  </head>
  <body>
  <?php include_once("./partial/_navBar.php") 
 ?>
<div class="container">
<h1>Exercice 2</h1>
        <h3>Décoder des messages</h3>
        <p>les messages à décoder</p>
        <?php
        $message1 = "0@sn9sirppa@#?ia'jgtvryko1";
        $message2 = "q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj";
        $message3 = "aopi?sgnirts@#?sedhtg+p9l!";
        ?>
        <ul>
            <li>message 1 : <?php echo $message1; ?></li>
            <li>message 2 : <?php echo $message2; ?></li>
            <li>message 3 : <?php echo $message3; ?></li>
        </ul>
        <p>comment proceder?</p>
        <ol>
            <li>Calculer la longueur de la chaîne et la diviser par 2, tu obtiendras ainsi le "chiffre-clé".</li>
            <li>Récupère ensuite la <a href="https://www.php.net/manual/fr/function.substr.php">sous-chaîne</a> de la longueur du chiffre-clé en commençant à partir du 6ème caractère.</li>
            <li>Remplace les chaînes '@#?' par un espace.</li>
            <li>Pour finir, inverse la chaîne de caractères.</li>
        </ol>
        <?php
        /**
         * pour la division, un code à tester:
         * $number = 50;
         * $result = 50 / 2;
         * echo $result;
         */
        // TO DO message 1
        $leng = strlen($message1) / 2;
        $lengstring = substr($message1,5,$leng);
        $replacestring = str_replace("@#?"," ",$lengstring);
        $reversestring = strrev($replacestring);
        // var_dump($reversestring);

        // TO DO message 2
        $leng2 = strlen($message2) / 2;
        $lengstring2 = substr($message2,5,$leng2);
        $replacestring2 = str_replace("@#?"," ",$lengstring2);
        $reversestring2 = strrev($replacestring2);
        // var_dump($reversestring2);
        // TO DO message 3
        $leng3 = strlen($message3) / 2;
        $lengstring3 = substr($message3,5,$leng3);
        $replacestring3 = str_replace("@#?"," ",$lengstring3);
        $reversestring3 = strrev($replacestring3);
        // var_dump($reversestring3);
        ?>
        <p>résultats:</p>
        <p>message1: <?php echo $reversestring ?><br>
            message2: <?php echo $reversestring2 ?><br>
            message3: <?php echo $reversestring3 ?><br>
        </p>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>