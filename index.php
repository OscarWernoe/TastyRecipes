<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Recipes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php
    include 'fragments/header.php';
    include 'fragments/nav.php'
    ?>
    <div class="container text-center">
        <h2>Recipes</h2>
    </div>
    <div class="container text-center recipes">
        <a href="recipe.php?recipe=0">
            <div class="col-sm-12 col-md-6 recipe-box recipe1-image">
                <div><span class="label label-primary recipe-label">Meatballs</span></div>
            </div>
        </a>
        <a href="recipe.php?recipe=1">
            <div class="col-sm-12 col-md-6 recipe-box recipe2-image">
                <div><span class="label label-primary recipe-label">Pancakes</span></div>
            </div>
        </a>
    </div>
    <footer class="container-fluid text-center footer">
        <p>ID1354 Internet Applications</p>
    </footer>
</body>
</html>