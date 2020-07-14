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
                Jean Forteroche
            </a>
            <div>
                <a href="index.php">Accueil</a>
                <a href="index.php?action=listPosts">Articles</a>
                <a href="index.php?action=administration">Administration</a>               
            </div>
        </nav>        
    </header>
    <?php if(isset($_SESSION['message'])) : ?> 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">

  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php endif; ?>
    <div class="main">
        <?= $content ?>
    </div>    
    </body>
</html>