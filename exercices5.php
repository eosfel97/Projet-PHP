<!doctype html>
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
      <?php
if (!empty($_POST)) {
    if ($_POST["message"]) {
        $message = strip_tags($_POST["message"]);
    }
}
if (!empty($_POST)) {
    if ($_POST["cle"]) {
        $key = strip_tags($_POST["cle"]);
    }
}
if ($_POST["messagecode"]) {
    $encodedMessage = $_POST["messagecode"];
}
// :::::::::::::::::::::::::::::::::::::::::: message mais pas clé ou code mais pas clé
if ((!$key && $message) || (!$key && $encodedMessage)) {
    $errormsg = " vous devez rentrer la clé ";
} elseif (!$message && !$encodedMessage && $key) {
    $errormsg = "action non définie";

} elseif ($message && $encodedMessage && $key) {
    $errormsg = "trop d'information";
}

if (!$errormsg) {
    $carat = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $caratab = str_split($carat);
    $doublecarat = array_merge($caratab, $caratab);
    $sizecaratab = count($caratab);
    for ($i = 0; $i < $sizecaratab; $i++) {
        for ($j = 0; $j < $sizecaratab; $j++) {
            $line = $caratab[$i];
            $column = $caratab[$j];
            $vigenere[$line][$column] = $doublecarat[$i + $j];
        }
    }
}
if ($message && $key) {
    $messagetab = str_split($message);
    $keytab = str_split($key);
    $keysize = count($keytab);
    // ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $encodedMessage = [];
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
    $encodedMessage = implode($encodedMessage);
} elseif ($encodedMessage && $key) {
    //decode message
    $key4decode = $key;
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
    $message = implode($decryptedMessage);
}

?>




<div class="container">
  <!-- alerte::::::::::::::::::::::::::::: -->
  <?php if ($errormsg): ?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?php echo $errormsg ?></strong>
</div>
<?php endif?>
<!-- alerte::::::::::::::::::::: -->
<form class="row g-3 " method="POST">
  <div class="col-md-10">
    <label for="message" class="form-label"> le  Message :</label>
    <input type="text" class="form-control" name="message" id="message" <?php echo $message ?> >
  </div>
  <div class="col-md-10">
    <label for="cle" class="form-label">la clé :</label>
    <input type="text" class="form-control" id="cle" name="cle" <?php echo $key ?>>
  </div>
  <div class="col-md-10">
    <label for="messagecode" class="form-label">le message code :</label>
    <input type="text" class="form-control" id="messagecode"  name="messagecode"<?php echo $encodedMessage ?> >
  </div>
  <div class="col-12">
  <button class="btn btn-primary" type="reset" >ANNULER</button>
  <button class="btn btn-primary" type="submit">ViGENERISER</button>
  </div>
</form>
</div>

<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>