<?php
require "includes/database.php";
require "includes/articles.php";
require "includes/url.php";
require "includes/auth.php";

session_start();

if (!isLoggedIn()) {
    die("unauthorised");
}

$title = '';
$content = '';
$published_at = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    $error = validateArticle($title, $content, $published_at);

    if (empty($error)) {
        $conn = getDB();
        $sql = "INSERT INTO article (title,content,published_at)
                VALUES (?,?,?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            if ($published_at == '') {
                $published_at = null;
            }
            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);
            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);
                redirect("/Php%20Practice/article.php?id=$id");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>


<?php require 'includes/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<h2 class="d-flex justify-content-center">Add New Article</h2>
<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>




<?php //http://localhost:3000/Php%20Practice/article.php