
<?php
session_start();
?><!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>page vide!</title>
  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
<h1>Exercice 4</h1>
    <h5>1- créer une <a href="https://www.latoilescoute.net/table-de-vigenere" target="_blank">table de vigenère</a></h5>
    <?php
// create a vigenere tab
$carat = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$caratab = str_split($carat);
$doublecarat = array_merge($caratab, $caratab);
$sizecaratab = count($caratab);
var_dump($sizecaratab);
for ($i = 0; $i < $sizecaratab; $i++) {
    for ($j = 0; $j < $sizecaratab; $j++) {
        $line = $caratab[$i];
        $column = $caratab[$j];
        $vigenere[$line][$column] = $doublecarat[$i + $j];
    }
}
//  var_dump($vigenere);
?>
    <h5>2- encode le message "APPRENDRE PHP EST UNE CHOSE FORMIDABLE" avec la clé "BACKEND"</h5>
    <?php
// encode/////////////////////
$message = "APPRENDRE PHP EST UNE CHOSE FORMIDABLE";
$key = "BACKEND";
$messagetab = str_split($message);
$keytab = str_split($key);
$keysize = count($keytab);
// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
$keycounter = 0;
foreach ($messagetab as $pointer => $letterToEncode) {
    $positionKeyLetter = $keycounter % $keysize;
    $keyLetter = $keytab[$positionKeyLetter];
    if ($letterToEncode != " ") {
        $encodedMessage[] = $vigenere[$letterToEncode][$keyLetter];
    } else {
        $encodedMessage[] = " ";
    }
    $keycounter++;
}
$cryptedMessage = implode($encodedMessage);
// var_dump($cryptedMessage);

?>
    <p>le message est: <?php echo $message; ?></p>
    <p>la clé est: <?php echo $key ?></p>
    <p>le résultat est: <?php echo $cryptedMessage; ?></p>
    <h5>3- decoder le message "TWA PEE WM TESLH WL LSLVNMRJ" avec la clé "VIGENERE"</h5>
    <?php
// decode://///////////
$encodedMessage = "TWA PEE WM TESLH WL LSLVNMRJ";
$key4decode = "VIGENERE";
$encodedMessagetab = str_split($encodedMessage);
$key4decodeTab = str_split($key4decode);
$key4decodeSize = count($key4decodeTab);
$keycounter = 0;
foreach ($encodedMessagetab as $pointer => $letterTodecode) {
    $positionKeyLetter = $keycounter % $key4decodeSize;
    $keyLetter = $key4decodeTab[$positionKeyLetter];
    if ($letterTodecode != " ") {
        for ($i = 0; $i < $sizecaratab; $i++) {
            $lineTOdecode = $caratab[$i];
            if ($vigenere[$lineTOdecode][$keyLetter] == $letterTodecode) {
                $decryptedMessage[] = $lineTOdecode;
            }
        }
    } else {
        $decryptedMessage[] = " ";
    }
    $keycounter++;

}
$decodedMessage = implode($decryptedMessage);
?>
    <p>le message chiffré est: <?php echo $encodedMessage; ?></p>
    <p>la clé est: <?php echo $key4decode ?></p>
    <p>le résultat est: <?php echo $decodedMessage; ?></p>
</div>
<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>