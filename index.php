<?php
require 'includes/database.php';
require 'includes/auth.php';



session_start();

$conn = getDB();

$sql = "SELECT *
       FROM article
        ORDER BY id;";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <li><a href="/Php%20Practice/contact.php">Contact</a></li>
    <div class="bg-image card shadow-1-strong"
        style="background-image: url('https://plus.unsplash.com/premium_photo-1670475872881-6ac52730b6ee?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <?php require "includes/header.php"; ?>

        <div class="container mt-2">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card px-5 py-5" id="form1">
                        <?php if (isLoggedIn()) : ?>
                        <div class="mb-2">
                            <p class="p-3 bg-dark text-white w-100 d-flex justify-content-center">You Logged In::<a
                                    href="logout.php">Log out</a></p>
                        </div>
                        <div class="mb-2">
                            <p class="p-3 bg-dark text-whitew-100 d-flex justify-content-center"><a
                                    href="new-article.php">Now
                                    You
                                    Can Add New
                                    article</a></p>
                        </div>
                        <?php else : ?>
                        <div class="mb-2">
                            <p class="p-3 bg-dark text-white w-100 d-flex justify-content-center">You Are Not Logged In.
                                First::<a href="login.php">Log In</a></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <?php foreach ($articles as $article) : ?>
            <div class="col-sm-6 mt-3 mb-sm-0">
                <div class="card">
                    <div class="card-body" class="bg-image card shadow-1-strong"
                        style="background-image: url('https://images.unsplash.com/photo-1710170600429-0d6e04d2d96e?q=80&w=1883&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

                        <a href="article.php?id=<?= $article['id']; ?>"
                            class="btn btn-primary"><?= htmlspecialchars($article['title']) ?></a>

                        <p class="card-text">
                        <p><?= htmlspecialchars($article['content']) ?>.</p>


                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <?php require "includes/footer.php"; ?>
    </div>
</body>

</html>