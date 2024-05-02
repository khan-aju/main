<?php
require "includes/database.php";
require "includes/articles.php";

$conn = getDB();

if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
} else {
    $article = null;
}
?>
<?php require "includes/header.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="card" style="width: 25rem;">
    <img src="includes/images/kimberly-farmer-lUaaKCUANVI-unsplash.jpg" class="card-img-top" alt="...">
    <div class="card-body">

        <?php if ($article === null) : ?>
        <p>Article not found:</p>
        <?php else : ?>
        <article>
            <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($article['content']) ?></p>
        </article>

        <a href="edit-article.php?id=<?= $article['id']; ?>" class="btn btn-primary">Edit</a>
        <a href="delete-article.php?id=<?= $article['id']; ?>" class="btn btn-primary">Delete</a>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


<?php require "includes/footer.php"; ?>