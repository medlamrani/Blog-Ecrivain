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
                    
                    echo '<h4><a href="?id=', $post->id(), '">', $post->title(), '</a></h4>', "\n",
                        '<p>', nl2br($contain), '</p>';
                  ?>
                    </article>
                <?php
                }
            ?>
            </div>
        </div>
</section>





<?php $content = ob_get_clean(); ?>
<?php require(__DIR__ . "/templates/layout.php"); ?>