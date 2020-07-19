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
            <a class="navbar-brand" href="index.php?action=administration">
                <img src="public/images/booki.png" width="60" height="50" alt="" loading="lazy">
            </a>           
            <a href="index.php?action=addPost">Ajouter un article</a>
            <?php if(isset($_SESSION['username'])) : ?>
                <a href="index.php?action=logout"> Se deconnecter </a>
            <?php endif; ?>
        </div>
    </header> 
    <?php if(isset($_SESSION['message'])) : ?> 
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['message'] ;?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="main">
        <?= $content ?>
    </div>    

    <script src="https://cdn.tiny.cloud/1/sopaorxqnp7cw8uwfjzg8qv2avtkkhniwt0bombfmer6v2f0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/sopaorxqnp7cw8uwfjzg8qv2avtkkhniwt0bombfmer6v2f0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>        
    <script src="public/js/main.js"></script>
    </body>
</html>