<?php ob_start(); ?>

    <div class="newpost">
        <div class="container-fluid">
            <form action="?action=addPost" method="post" class="form-signin">
                <img class="mb-4" src="public/images/booki.png" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Nouveau article</h1>

                <label for="author" >Auteur : </label>
                <input type="text" name="author"class="form-control"  value="<?php if (isset($post)) echo $post->author(); ?>" />

                <label for="title" >Titre article :</label>
                <input type="text" name="title" class="form-control" value="<?php if (isset($post)) echo $post->title(); ?>"/>

                <label for="contain" >Contenu article </label>
                <textarea class="form-control" id="contain" name="contain" rows="3"></textarea>
                

                <input type="submit" value="Ajouter" name="addpost" class="btn btn-lg btn-primary btn-block"/>
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/templates/adminLayout.php"); ?>