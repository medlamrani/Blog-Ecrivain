<?php ob_start(); ?>
<?php 
      echo 'Bonjour '. $_SESSION['username'];
      ?>
<h1>Administration</h1>


<?php 
  
    foreach ($postManager->getPosts(0, 5) as $post)
    {
?>
      <article class="mb-5 mt-5">
<?php
      if (strlen($post->contain()) <= 200)
      {
            $contain = $post->contain();
      }
                  
      else
      {
            $debut = substr($post->contain(), 0, 100);
            $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                        
            $contain = $debut;
      }
?>                      
      <h4>
            <a href="index.php?action=post&amp;id=<?= $post->id() ?>"><?= $post->title() ?></a>
      </h4>
      <p><?= nl2br($contain) ?> </p>
      <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modifier</a>
      <a href="index.php?action=deletePost&amp;id=<?= $post->id() ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Supprimer</a>
              

      <hr>
      </article>
<?php
    }
?>
<?php $content = ob_get_clean(); ?>





<?php require(__DIR__ . "/templates/adminLayout.php"); ?>