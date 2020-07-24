<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>  
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">

            <a class="navbar-brand">
                <img src="public/images/booki.png" width="50" height="40" alt="" loading="lazy">
                Jean Forteroche
            </a>    
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <a class="navlink" href="index.php">Accueil</a>
                <a class="navlink" href="index.php?action=listPosts">Chapitres</a>             
            </div>
        </nav>  

        <?php if(isset($_SESSION['message'])) : ?> 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['message'] ;?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        
        <?= $header ?>   
    
        <div class="main">
            <?= $content ?>
        </div>

    
        <footer class="page-footer font-small blue pt-4">
            <div class="container-fluid text-center text-md-left">

                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">Me contacter</h5>
                        <p>N'hesitez pas a me contacter sur mon adresse email personnel : JeanForteroche@gmail.com .</p>
                    </div>

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Liens</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a class="navlink" href="index.php">Accueil</a>
                            </li>
                            <li>
                                <a class="navlink" href="index.php?action=listPosts">Chapitres</a> 
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Administration</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a class="navlink" href="index.php?action=administration">Se connecter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <p> Projet 4 : OC</p>
            </div>
            
        </footer>




          
    <script src="https://cdn.tiny.cloud/1/sopaorxqnp7cw8uwfjzg8qv2avtkkhniwt0bombfmer6v2f0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>        
    <script src="public/js/main.js"></script>    
    </body>
</html>