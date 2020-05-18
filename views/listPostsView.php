<?php $title = 'Mon blog'; ?>
<?php require(__DIR__ . "/../header.php");?>
<?php require(__DIR__ . "/../footer.php");?>

<?= $header ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
<div class="card text-center">
  <div class="card-header">
    Article
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
    <p class="card-text"><?= nl2br(htmlspecialchars($data['content'])) ?></p>
    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Commentaires</a>
  </div>
  <div class="card-footer text-muted">
  <em>le <?= $data['creation_date_fr'] ?></em>
  </div>
<?php
}
$posts->closeCursor();
?>

    <div class="newpost">
        <div class="container-fluid">
            <form action="" method="post" class="form-signin">
                <img class="mb-4" src="public/image/booki.png" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Nouveau article</h1>
                <label for="title" class="sr-only">Titre article :</label>
                <input type="text" name="title" class="form-control"/>

                <label for="pass" class="sr-only">Contenu article : :</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                

                <input type="submit" value="Ajouter" name="addpost" class="btn btn-lg btn-primary btn-block"/>
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>





<?php require(__DIR__ . "/../template.php"); ?>

<?= $footer ?>