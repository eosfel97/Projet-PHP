<?php 
session_start();
if($_SESSION["user"]){
  extract($_SESSION["user"],EXTR_OVERWRITE);
}else{
  header("Location: /connection.php");
}
include "script/function8s.php";
if(!empty($_POST)){
  $data = openBD();
  $users = $data["user"];

  foreach($users as $id => $user){
    if($email == $user["email"]){
      $idUser = $id;
    }
  }
  $securePost = treatFormData(
    $_POST,
    "name",
    "firstname",
    "email",
    "password",
  );
  extract($securePost,EXTR_OVERWRITE);

  // teste de la nouvel adresse email 
  $idOtherUser = -404;
  foreach($users as $id =>$user){
    if ($email == $user["email"]){
      $idOtherUser = $id;
    }
  }
  if($idOtherUser == -404 || $idOtherUser == $idUser){
    if(!empty($_FILES["files"]["tmp_name"]) && !empty($_FILES["files"]["name"])){
    $oldFiles = $files;
    $Tfile = $_FILES['files'];
    $theFileOnServer =$Tfile['tmp_name'];
    $autorizedMime = [
      "image/jpeg",
      "image/jpg",
      "image/gif",
      "image/png",
    ];
    // tester le type de l'image 
    $testMine = mime_content_type($theFileOnServer);
    if(!in_array($testMine,$autorizedMime)){
      $errormsg = "Le fichier n'est pas une image ";
    }
    // test  si le fichier est present 
    if(! is_uploaded_file($theFileOnServer)){
      $errormsg = "il y a eu une erreur d'upoad du fichier";
    }
    // test taille du fichier
    $fileSize = filesize($theFileOnServer);
    if(10000000<$fileSize){
      $errormsg = "fichier trop volumineux";
    }
    if(!$errormsg ?? false ){
      $oriFilname  = basename($Tfile['name']);
      $ext = pathinfo($oriFilname,PATHINFO_EXTENSION);
      $mainName = pathinfo($oriFilname,PATHINFO_FILENAME);
      $tmpCleanedName = preg_replace("/\s/","-",$mainName);
      $CleanedName = trim($tmpCleanedName,"-");
      $finalName = $CleanedName .uniqid() . "." .$ext;
      $destination = UPLOADFOLDER .$finalName;
      $succesFile = move_uploaded_file($theFileOnServer,$destination);
      if(!$succesFile){
        $errormsg = "OK, fichier a pas  été transmit";
        
      }else{
        $files = $finalName;
        if($oldFiles){
          $fulloldfiles = UPLOADFOLDER .$oldFiles;
          unlink($fulloldfiles);
        }
        
      }


    }


    }
///////////////////////////////////////////
   if(!$errormsg){
         if($password){
      $hashPassword = password_hash($password, PASSWORD_ARGON2ID);
    }else{
      $hashPassword = $users[$idUser]["password"];
    }
    $data["user"][$idUser]=[
      "email"=>$email,
      "name"=>$name,
      "firstname"=> $firstname,
      "password"=>$hashPassword,
      "role"=>$role,
      "files"=> $files,
    ];
    WriteBD($data);
    $_SESSION["user"] = [
      "email"=>$email,
      "name"=>$name,
      "firstname"=> $firstname,
      "role"=>$role,
      "files"=> $files,
    ];
    header(("Location:/compte.php"));
  }
  
}else{
  extract($_SESSION["user"],EXTR_OVERWRITE);
  $errormsg = "L'adresse mail est déjà utiliser aucune modification prise en comte";
}
}

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>information</title>
  </head>
  <body>
  <?php include_once("./partial/_navBar.php") 
 ?>
<div class="container">
<?php if ($errormsg ?? false): ?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?php echo $errormsg ?></strong>
</div>
<?php endif?>
    <h1>voici les infos</h1>
    <form method="POST" enctype="multipart/form-data">
<div class="form-group col-md-10 mt-5">
    <input type="text" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter name" name="name" value="<?php echo $name;?>">
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="text" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter first name" name="firstname" value="<?php echo $firstname;?>" >
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="email" class="form-control rounded-pill"  aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email;?>">
  </div>
  <div class="form-group col-md-10 mt-5">
    <input type="password" class="form-control rounded-pill"  name="password" placeholder="Nouveaux password" >
  </div>
  <div class="form-group col-md-10 mt-5">
          <input type="file" class="form-control rounded-pill"   name="files">
        </div>
  <button type="submit" class="btn btn-primary mt-5 rounded-pill btn-lg " id="btn-envoie">Modifer les informations</button>
</form>
</div>
<script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>