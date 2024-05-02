<?php
require "includes/database.php";
require "includes/articles.php";
require "includes/url.php";
$conn = getDB();


if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
    if ($article) {

        $id = $article['id'];
        $title = $article['title'];
        $content = $article['content'];
        $published_at = $article['published_at'];
    } else {
        die("article not found");
    }
} else {
    die("id not supplied,article not found");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM article 
        WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {

        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {

            redirect("/Php%20Practice/index.php");
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>

<?php require "includes/header.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="card" style="width: 25rem;">
    <img src="includes\images\markus-winkler-7EwWeNyzSwQ-unsplash.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h2>Delete Article</h2>
        <form method="post">
            <p>Are you sure?</p>
            <button>Delete</button>
            <a href="/Php%20Practice/article.php?id=<?= $article['id']; ?>">Cancel</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


<?php require "includes/footer.php"; ?>