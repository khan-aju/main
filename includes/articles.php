<?php

/**
 *@param
 *@param
 *
 * @return
 */
function getArticle($conn, $id)
{
    $sql = "SELECT *
              FROM article
                WHERE id= ?";

    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {

        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}
/**
 * 
 * @param
 * @param
 * @param
 * 
 * @return
 */
function validateArticle($title, $content, $published_at)
{
    $error = [];
    if ($title == '') {

        $error[] = 'Title is required';
    }
    if ($content == '') {
        $error[] = 'Content is requird';
    }
    return $error;
}
