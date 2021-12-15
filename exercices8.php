<?php
include "script/function8s.php";
$data = openBD();

if (!empty($_POST)) {
    $securized = treatFormData(
        $_POST,
        "title",
        "note",
    );
    extract($securized, EXTR_OVERWRITE);
}
// var_dump($note, $title);
if (isset($title, $note)) {
    array_push($data['note'], [
        'title' => $title,
        'note' => $note,
    ]);
    // var_dump($data);
    WriteBD($data);
}
$notes = $data["note"];
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
  <?php include_once "./partial/_navBar.php"
?>
<div class="container">
    <h1>Prise de notes </h1>
    <form action="" method="post">
      <div class="form-group col-md-10">
        <input type="text" name="title" class="form-control border border-3" placeholder="titre de la note">
      </div>
      <div class="form-group col-md-10">
  <textarea name="note" placeholder="la note" class="form-control border border-3 mt-3" ></textarea>
      </div>
      <div class="form-group col-md-10">
        <input type="submit"  class="btn btn-success mt-3 " value="ajouter">
      </div>
    </form>
    <?php
if ($notes):
?>
            <div class="accordion mb-3" id="accordionNotes">
                <?php foreach ($notes as $index => $actualNote): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo "$index"; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo "$index"; ?>" aria-expanded="false" aria-controls="collapse<?php echo "$index"; ?>">
                                <?php echo $actualNote['title']; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo "$index"; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo "$index"; ?>" data-bs-parent="#accordionNotes">
                            <div class="accordion-body">
                                <pre>
<?php echo $actualNote['note']; ?>
</pre>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        <?php else: // if no note
    ?>
													            <p>Vous n'avez pas encore de note</p>
													        <?php endif?>
</div>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>