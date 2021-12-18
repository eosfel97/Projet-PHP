<?php
$nameUtilisateur = $_SESSION["user"]["name"] ?? "";
$firstnameUtilisateur = $_SESSION["user"]["firstname"] ?? "";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><?php echo "$nameUtilisateur $firstnameUtilisateur"?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/">Accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/test.php">test</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/exercices.php">Exo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/notes.php">notes</a>
        </li>
        <?php if ($_SESSION["user"] ?? false):
    if (in_array("ROLE_ADMIN", $_SESSION["user"]["role"])):

    ?>
					<li class="nav-item">
					 <a class="nav-link active" href="/admin.php">admin</a>
		      </li>
					 <?php endif?>
           <li class="nav-item">
             <a class="nav-link active " href="/compte.php">mon compte</a>
           </li>
	        <li class="nav-item">
	          <a class="nav-link active btn btn-dark" href="/deconnection.php">deconnection</a>
	        </li>
	        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link active btn btn-success" href="/connection.php">connection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/inscription.php">inscription</a>
        </li>
        <?php endif?>
      </ul>
    </div>
  </div>
</nav>
