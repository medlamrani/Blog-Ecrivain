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
    <header>
        <nav class="navbar navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand">
                <img src="public/images/booki.png" width="50" height="40" alt="" loading="lazy">
                Mohamed LAMRANI
            </a>
            <div>
                <a href="index.php">Accueil</a>
                <a href="index.php?action=listPosts">Articles</a>
                <a href="index.php?action=administration">Administration</a>               
            </div>
        </nav>        
    </header> 
    <div class="main">
        <?= $content ?>
    </div>    
    </body>
</html>