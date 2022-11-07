<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L3Task-1</title>
    <style>

        .error {
            color: red;
        }

        div {
            text-align: right;

            width: 270px;
            padding: 10px;
            border: 1px solid black;
        }

        .others {
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
    // define variables and set to empty values
    $usernameError = $passwordError = "";
    $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameError = "User Name is required";
        } elseif (strlen($_POST["username"]) < 2) {
            $usernameError = "Username must be atleast 2 characters length";
        } else {
            $username = $_POST["username"];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9-_ ]+$/", $username)) {
                $usernameError = "Special characters are not allowed";
            }
        }

        if (empty($_POST["password"])) {
            $passwordError = "Password is required";
        } elseif (strlen($_POST["password"]) < 8) {
            $passwordError = "Password must be 8 characters long";
        } else {
            $password = $_POST["password"];
            // check if password is well-formed
            if (!preg_match("/\W/", $password)) {
                $passwordError = "Should have atleast one special character";
            }
        }
    }
    ?>

    <h2>LOGIN</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            User Name : <input type="text" name="username" value="<?php echo $username; ?>">
            <span style="font-size: 14px;" class="error"><?php echo $usernameError; ?></span>
        </div>
        <div>
            Password : <input type="password" name="password" value="<?php echo $password; ?>">
            <span style="font-size: 14px;" class="error"><?php echo $passwordError; ?></span>
        </div>
        <div>
            <input type="checkbox" value="XYZ">
            <span>Remember Me</span>
        </div><br>
        <div> <input type="submit" name="submit" id="submit"> <a href="">Forgot Password?</a></div>
    </form>
</body>

</html>