<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php

  echo '<h2 style="text-align:center">Liste des 5 dernières news</h2>';
  
  while ($data = $posts->fetch())
  {
  ?>
    <div class="card text-center">
      <div class="card-header">
        Article
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $data['title'] ?></h5>
        <p class="card-text"><?= $data['contain'] ?></p>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Commentaires</a>
      </div>
      <div class="card-footer text-muted">
      <em>le <?= $data['addDate'] ?></em>
      <em>le <?= $data['updateDate'] ?></em>
    </div>
  <?php
  }
  $posts->closeCursor();
  ?>



<?php $content = ob_get_clean(); ?>
<?php require(__DIR__ . "/../template.php"); ?>