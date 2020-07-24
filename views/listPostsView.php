<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>
<header>
  <div class="container h-100">
      <div class="row">
          <div class="col-lg-7 headtext list">
              <div class="header-content mx-auto">
                  <h1 class="mb-5">
                  Billet simple pour l'Alaska
                  </h1> 
              </div>
          </div>
      </div>
  </div> 
<header>  
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

  <section id="articles">
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-10 offset-1 mb-5 mt-5">
                <h2 class="text-justify" style="36px">Retrouvez les derniers chapitres.</h2>
                <br />
                <hr>
                
                <?php 
                foreach ($postManager->getPosts(0, 5) as $post)
                {
                ?>
                    <article class="mb-5 mt-5">
                    <?php
                    if (strlen($post->content()) <= 400)
                    {
                      $content = $post->content();
                    }
                    
                    else
                    {
                      $debut = substr($post->content(), 0, 400);
                      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                      
                      $content = $debut;
                    }
                    
                    echo '<h4><a href="index.php?action=post&amp;id=', $post->id(), '">', $post->title(), '</a></h4>', "\n",
                        '<p>', nl2br($content), '</p>',
                        '<a href="index.php?action=post&amp;id=', $post->id(),'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Lire la suite</a>';
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