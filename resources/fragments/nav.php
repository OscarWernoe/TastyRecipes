<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="/index.php">Recipes</a></li>
            <li><a href="/calendar.php">Calendar</a></li>
            <?php
            if(isset($_SESSION['username'])) {
                echo '<li><a href="/logout.php">Sign out</a></li>';
            } else {
                echo '<li><a href="/register.php">Register</a></li>';
                echo '<li><a href="/login.php">Sign in</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>