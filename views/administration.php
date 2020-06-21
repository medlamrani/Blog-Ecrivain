<?php ob_start(); ?>
<h1>Administration</h1>


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
    <p class="card-text"><?= nl2br($data['contain']) ?></p>
    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Commentaires</a>
  </div>
  <div class="card-footer text-muted">
  <em>le <?= $data['addDate'] ?></em>
  </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>





<?php require(__DIR__ . "/templates/adminLayout.php"); ?>