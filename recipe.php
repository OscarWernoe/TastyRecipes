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
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
        echo 'Could not load recipes!';
        exit;
    }

    if(empty($recipes->recipe[$recipe_number])) {
        echo 'Could not find the specified recipe, try again!';
        exit;
    }

    include 'fragments/header.php';
    include 'fragments/nav.php';
    ?>

    <div class="container">
        <div class="row background">
            <div class="col-md-6 col-sm-12">
                <?php
                echo '<img class="img-responsive" src="' . $recipes->recipe[$recipe_number]->imagepath . '" alt="Picture of ' . $recipes->recipe[$recipe_number]->title . '">'
                ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2><?php echo $recipes->recipe[$recipe_number]->title?></h2>
            </div>
        </div>
        <div class="row background">
            <div class="col-sm-12">
                <h3>Ingredients</h3>
                <ul>
                    <?php
                    foreach($recipes->recipe[$recipe_number]->ingredient->li as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row background">
            <div class="col-sm-12">
                <h3>Directions</h3>
                <ol>
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
    ?>

    <footer class="container-fluid text-center footer">
        <p>ID1354 Internet Applications</p>
    </footer>
</body>
</html>