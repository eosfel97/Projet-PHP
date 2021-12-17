<?php
session_start();
include "script/function8s.php";
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>test</title>
  </head>
  <body>
      <?php 
 include_once "./partial/_navBar.php";
  
              ?>
    <div class="container">

      <pre>


      ===========================================================
      
      <?php
     
            if(!empty($_POST)){
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
                  $message = "il y a eu un soucis lors de la transmition du fichier";
                }else{
                  $message = "OK, fichier a bien été transmit";
                }


              }
          }
       ?>
      </pre>




=========================================
<pre>
  <?php if($errormsg ?? false) : ?>
    <p>  <?php echo $errormsg ;?></p>
    <?php endif ?>

  <?php if($message ?? false) : ?>
    <p>  <?php echo $message; ?></p>
    <?php endif ?>
      </pre>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group col-md-10 mt-5">
          <input type="file" class="form-control rounded-pill"   name="files">
        </div>
       <input type="submit"  value="envoie" class="btn btn-primary" name="submit">
      </form>
    </div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>