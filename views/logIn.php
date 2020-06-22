<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>    
    <div class="login-bloc text-center">
        <form class="login">
            <img class="mb-4" src="public/images/booki.png" alt="" width="72" height="72">

            <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>

            <label for="pseudo" class="sr-only">Peudo : </label>
            <input type="text" id="pseudo" class="form-control" placeholder="Pseudo" required="" autofocus="">

            <label for="password" class="sr-only">Mot de passe :</label>
            <input type="password" id="password" class="form-control" placeholder="Mot de passe" required="">

            <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
            <!--<p class="mt-5 mb-3 text-muted">© 2017-2020</p>-->
        </form>
    </div>    
    </body>
</html>