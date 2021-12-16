<?php
session_start();
include "script/function8s.php";
if (!empty($_POST)) {
    $securized = treatFormData(
        $_POST,
        "name",
        "firstname",
        "email",
        "password",
    );
    extract($securized, EXTR_OVERWRITE);
    $data = openBD();
    $hashPass = password_hash($password, PASSWORD_ARGON2ID);
    // var_dump($data);
    array_push($data['user'], [
        "email" => $email,
        "name" => $name,
        "firstname" => $firstname,
        "password" => $hashPass,
    ]);
    WriteBD($data);
    header("Location: /connection.php");
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>inscription</title>
  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
<form method="POST">
<div class="form-group col-md-10 mt-5">
    <input type="text" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter name" name="name">
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="text" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter first name" name="firstname">
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="email" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="password" class="form-control rounded-pill"  placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary mt-5 rounded-pill btn-lg " id="btn-envoie">S'incrire</button>
</form>

</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>