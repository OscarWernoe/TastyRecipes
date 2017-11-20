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
    include 'fragments/nav.php';
    ?>

    <div class="container text-center">
        <h2>Calendar</h2>
    </div>

    <div id="calendar" class="container-fluid text-center">
        <div class="row calendar-top-row">
            <div class="col-xs-1 col-md-1 calendar-col">Mon</div>
            <div class="col-xs-1 col-md-1 calendar-col">Tue</div>
            <div class="col-xs-1 col-md-1 calendar-col">Wed</div>
            <div class="col-xs-1 col-md-1 calendar-col">Thu</div>
            <div class="col-xs-1 col-md-1 calendar-col">Fri</div>
            <div class="col-xs-1 col-md-1 calendar-col">Sat</div>
            <div class="col-xs-1 col-md-1 calendar-col">Sun</div>
        </div>
        <div class="row calendar-row">
            <div class="col-xs-12 col-md-1 calendar-inactive">
                <span class="label label-default">30</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-inactive">
                <span class="label label-default">31</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">1</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">2</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">3</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">4</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">5</span>
            </div>
        </div>
        <div class="row calendar-row">
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">6</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">7</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">8</span>
            </div>
            <a href="recipe.php?recipe=0">
                <div class="col-xs-12 col-md-1 calendar-entry calendar-recipe recipe1-image" title="Meatballs">
                    <span class="label label-default">9</span>
                </div>
            </a>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">10</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">11</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">12</span>
            </div>
        </div>
        <div class="row calendar-row">
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">13</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">14</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">15</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">16</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">17</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">18</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">19</span>
            </div>
        </div>
        <div class="row calendar-row">
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">20</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">21</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">22</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">23</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">24</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">25</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">26</span>
            </div>
        </div>
        <div class="row calendar-row">
            <div class="col-xs-12 col-md-1">
                <span class="label label-default calendar-entry">27</span>
            </div>
            <a href="recipe.php?recipe=1">
                <div class="col-xs-12 col-md-1 calendar-entry calendar-recipe recipe2-image" title="Pancakes">
                    <span class="label label-default">28</span>
                </div>
            </a>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">29</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-entry">
                <span class="label label-default">30</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-inactive">
                <span class="label label-default">1</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-inactive">
                <span class="label label-default">2</span>
            </div>
            <div class="col-xs-12 col-md-1 calendar-inactive">
                <span class="label label-default">3</span>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center footer">
        <p>ID1354 Internet Applications</p>
    </footer>
</body>
</html>