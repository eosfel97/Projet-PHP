<?php
session_start();
include "script/function8s.php";
if (!empty($_POST)) {
    $securized = treatFormData(
        $_POST,
        "email",
        "password",
    );
    extract($securized, EXTR_OVERWRITE);
    $data = openBD();
    $users = $data['user'];
    $correctEmail = false;
    foreach ($users as $user) {
        if ($email == $user['email']) {
          $correctEmail = true;
          $canConnect = password_verify($password, $user['password']);
          if ($canConnect) {
            $_SESSION["user"] = [
              "name" => $user["name"],
              "firstname" => $user["firstname"],
              "email" => $user["email"],
            ];
            // var_dump($user,$canConnect,$_SESSION);
                header("Location: /");
                exit();
            }
            else {
             $badPassword = true;
            }
        }
    }
      $badMessg = "L'email ou le mot de passe est invalide";
}

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
        <title>connection</title>
  </head>
  <body>
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
    <h1>connection</h1>
    <?php if ($badMessg): ?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?php echo $badMessg ?></strong>
</div>
<?php endif?>
    <form method="POST">

  <div class="form-group col-md-10 mt-5">
    <input type="email" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="password" class="form-control rounded-pill"  placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary mt-5 rounded-pill btn-lg " id="btn-envoie">connection</button>
</form>
</div>

<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>