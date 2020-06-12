<?php ob_start(); ?>

    <div class="newpost">
        <div class="container-fluid">
            <form action="?action=addPost" method="post" class="form-signin">
                <img class="mb-4" src="public/image/booki.png" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Nouveau article</h1>
                <label for="title" class="sr-only">Titre article :</label>
                <input type="text" name="title" class="form-control"/>

                <label for="content" class="sr-only">Contenu article </label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                

                <input type="submit" value="Ajouter" name="addpost" class="btn btn-lg btn-primary btn-block"/>
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>    


<?php require(__DIR__ . "/../template/layout.php"); ?>