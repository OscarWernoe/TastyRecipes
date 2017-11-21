<?php
require_once 'config.php';

$username = $password = $confirm_password = "";
$username_error = $password_error = $confirm_password_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["username"]))) {
        $username_error = "Please enter a username.";
    } else {
        $sql = "SELECT user_id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    $username_error = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST['password']))) {
        $password_error = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 4) {
        $password_error = "Password must have at least 4 characters.";
    } else {
        $password = trim($_POST['password']);
    }

    if(empty(trim($_POST["confirm_password"]))) {
        $confirm_password_error = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_error = 'Password did not match.';
        }
    }

    if(empty($username_error) && empty($password_error) && empty($confirm_password_error)) {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
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
    include 'resources/fragments/header.html';
    include 'resources/fragments/nav.php';
    ?>
    <div class="container text-center">
        <h2>Register</h2>
    </div>
    <div class="container">
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                <label for="username">Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                <label for="password">Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label for="confirm_password">Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>
    <?php
    include 'resources/fragments/footer.html';
    ?>
</body>
</html>