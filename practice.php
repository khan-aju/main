<?php

$posts = [1 => 'Good news', 3 => 'Read this', 5 => 'Important announcement'];
foreach ($posts as $id => $post) {
    var_dump($id);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Posts</title>
</head>

<body>

    <h1>Posts</h1>

    <ul>
        <?php foreach ($posts as $id => $title) : ?>

        <p>
            <li><a href="post.php?id=<?= $id; ?>"><?php $title; ?></a></li>
        </p>

        <?php endforeach; ?>
    </ul>

</body>

</html>