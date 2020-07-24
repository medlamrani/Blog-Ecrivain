<?php $title = 'Modifier le chapitre'; ?>

<?php ob_start(); ?>
<?php 
      echo 'Bonjour '. $_SESSION['username'];
      ?>
    <div class="newpost">
        <div class="container-fluid">
            <form action="?action=updatePost&amp;id=<?= $_GET['id'] ?>" method="post" class="form-signin">
                <img class="mb-4" src="public/images/booki.png" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Modifier l'article</h1>

                <label for="title" >Titre article :</label>
                <input type="text" name="title" class="form-control" value="Titre"/>

                <label for="contain" >Contenu article </label>
                <textarea class="form-control" id="content" name="content" rows="3" value="Contenu"></textarea>
                

                <input type="submit" value="Modifier" name="updatePost" class="btn btn-lg btn-primary btn-block mt-3"/>
            </form>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/templates/adminLayout.php"); ?>