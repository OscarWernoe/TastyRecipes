<?php
require_once 'config.php';
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
    <link rel="stylesheet" type="text/css" href="resources/css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/tasty.css">
</head>
<body>
    <?php
    if(isset($_GET['recipe'])) {
        $recipe_number = (int) $_GET['recipe'];
        $_SESSION['current_page'] = 'recipe.php?recipe=' . $recipe_number;
    } else {
        echo 'Something went wrong, try again!';
        exit;
    }

    $recipes = simplexml_load_file('xml/recipes.xml');
    if($recipes === false) {
        echo 'ERROR: Could not load the recipes!';
        exit;
    }

    if(empty($recipes->recipe[$recipe_number])) {
        echo 'ERROR: Could not find the specified recipe!';
        exit;
    }

    include 'fragments/header.html';
    include 'fragments/nav.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <?php
                echo '<img class="img-responsive img-rounded" src="' . $recipes->recipe[$recipe_number]->imagepath . '" alt="Picture of ' . $recipes->recipe[$recipe_number]->title . '">'
                ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2><?php echo $recipes->recipe[$recipe_number]->title?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>Ingredients</h3>
                <ul class="recipe-list-unordered">
                    <?php
                    foreach($recipes->recipe[$recipe_number]->ingredient->li as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>Directions</h3>
                <ol class="recipe-list-ordered">
                    <?php
                    foreach($recipes->recipe[$recipe_number]->recipetext->li as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>

    <?php
    require 'get-comments.php';
    get_comments($link, $recipe_number + 1);

    include 'fragments/footer.html';
    ?>
</body>
</html>