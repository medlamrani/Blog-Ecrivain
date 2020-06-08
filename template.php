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
        <div class="sidenav">
            <a class="navbar-brand" href="#">
                <img src="public/images/booki.png" width="50" height="40" alt="" loading="lazy">
            </a>
            <a href="#services">Add</a>
            <a href="#clients">Update</a>
            <a href="#contact">Delete</a>
        </div>
    </header> 
    <div class="main">
        <?= $content ?>
    </div>    
    </body>
</html>