<?php ob_start(); ?>
<?php 
    echo 'Bonjour '. $_SESSION['username'];
?>
    <div class="newpost">
        <div class="container-fluid">
            <form action="?action=inscription" method="post" class="form-signin">
                <img class="mb-4" src="public/images/booki.png" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

                <label for="username" >Pseudo :</label>
                <input type="text" name="username" class="form-control" value="Pseudo"/>

                <label for="password" >Mot de passe : </label>
                <input type="password" name="password" class="form-control" value=""/>
                
                

                <input type="submit" value="Inscription" name="inscription" class="btn btn-lg btn-primary btn-block mt-3"/>
            </form>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/templates/adminLayout.php"); ?>