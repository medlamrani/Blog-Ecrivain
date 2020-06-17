<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>


<header id="view-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">Article</h1>
                <h2 class="text-center text-white text-break"><?= $post['title'] ?></h2>
            </div>
        </div>
    </div>
</header>

<article id="view-article">
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-10 offset-1 mb-5 mt-5 article-content">
                <div class="text-justify mb-5">Publié le <?= $post['addDate'] ?></div>
                <div class="text-justify article-text text-reader"><?= $post['contain'] ?></div>
            </div>
        </div>
</article>


<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['commentDate'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><a href="index.php?action=reportComment&amp;id=<?= $comment['id']?>">Signaler</a></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/templates/layout.php"); ?>
