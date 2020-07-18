<?php ob_start(); ?>

<h1>Mon blog !</h1>

  <section id="billet-section">
    <div class="container bg-white">
        <div class="row">
            <div class="col-10 offset-1 mb-5 mt-5">
                <h2 class="text-justify" style="36px">Retrouvez les 5 dernières articles.</h2>
                <br />
                <hr>
                
                <?php 
                foreach ($postManager->getPosts(0, 5) as $post)
                {
                ?>
                    <article class="mb-5 mt-5">
                    <?php
                    if (strlen($post->content()) <= 200)
                    {
                      $content = $post->content();
                    }
                    
                    else
                    {
                      $debut = substr($post->content(), 0, 200);
                      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                      
                      $content = $debut;
                    }
                    
                    echo '<h4><a href="index.php?action=post&amp;id=', $post->id(), '">', $post->title(), '</a></h4>', "\n",
                        '<p>', nl2br($content), '</p>';
                  ?>
                  <hr>
                    </article>
                <?php
                }
            ?>
            </div>
        </div>
</section>





<?php $content = ob_get_clean(); ?>
<?php require(__DIR__ . "/templates/layout.php"); ?>