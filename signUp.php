<?php
    session_start();
    if (isset($_SESSION['info'])){
        $info = $_SESSION['info'];
    }
    unset($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Sign Up</title>
</head>
<body>
    <header>

    </header>
    <div class="log">
        <fieldset>
            <legend>Sign up</legend>
            <form method="post" action="doSignUp.php" class="login-form">
                <label class="label-class">First name</label>
                <input type="text" placeholder="First name" name="first_name">
                <br>
                <label class="label-class">Last name</label>
                <input type="text" placeholder="Last name" name="last_name">
                <br>
                <label class="label-class">Phone Number</label>
                <input type="int" placeholder="Phone number" name="phoneNumber">
                <br>
                <label class="label-class">Login</label>
                <input type="text" placeholder="Login" name="login">
                <br>
                <label class="label-class">Password</label>
                <input type="password" placeholder="Password" name="password">
                <br>
                <input type="submit" name="" id="" value="signUp">
                <?php
                    if (!empty($info)){
                        echo "<span>$info</span>";
                    }
                ?>
            </form>
        </fieldset>
    </div>
</body>
</html>