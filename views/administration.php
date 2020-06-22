<?php ob_start(); ?>
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
          $debut = substr($post->contain(), 0, 200);
          $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                        
          $contain = $debut;
        }
                      
        echo '<h4><a href="index.php?action=post&amp;id=', $post->id(), '">', $post->title(), '</a></h4>', "\n",
              '<p>', nl2br($contain), '</p>';
?>
      <hr>
      </article>
<?php
    }
?>
<?php $content = ob_get_clean(); ?>





<?php require(__DIR__ . "/templates/adminLayout.php"); ?>