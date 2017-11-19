<?php

function get_comments($link, $recipe_id) {
    ?>
    <div class="container comment-sec background">
        <h3>Comments</h3>
    <?php

    $sql = "SELECT comment_id, username, comment FROM comments JOIN users ON comments.user_id = users.user_id WHERE recipe_id = $recipe_id ORDER BY comment_id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><?=$row["username"]?></h4>
                    <p><?=$row["comment"]?></p>
                </div>
            <?php
            if($row["username"] === $_SESSION['username']) {
                ?>
                <div class="media-right">
                    <form action="comment.php" method="post">
                        <input type="hidden" name="comment_id" value="<?=$row["comment_id"]?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
    }

    if(isset($_SESSION['username'])) {
        ?>
        <form action="comment.php" method="post">
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment" id="comment"></textarea>
                <input type="hidden" name="recipe_id" value=<?=$recipe_id?>>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </form>
        <?php
    }

    else {
        ?>
        <span class="help-block">You must sign in to comment.</span>
        <?php
    }
    ?>
    </div>
    <?php
}