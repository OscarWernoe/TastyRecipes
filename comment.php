<?php
require_once 'config.php';

session_start();
$username = $_SESSION['username'];
$current_page = $_SESSION['current_page'];

if(isset($_POST['recipe_id']) && isset($_POST['comment'])) {
    $recipe_id = $_POST['recipe_id'];
    $comment = $_POST['comment'];

    $sql = "SELECT user_id FROM users WHERE username = '$username'";

    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_assoc($result);

    $user_id = $row['user_id'];

    $sql = "INSERT INTO comments (user_id, recipe_id, comment) VALUES ($user_id, $recipe_id, '$comment')";

    if (mysqli_query($link, $sql)) {
        header("location:" . $current_page);
    } else {
        echo mysqli_error($link);
    }
}

if(isset($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];

    $sql = "DELETE FROM comments WHERE comment_id = '$comment_id'";

    if (mysqli_query($link, $sql)) {
        header("location:" . $current_page);
    } else {
        echo mysqli_error($link);
    }
}