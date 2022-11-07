<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Styles/style.css">
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

    <div>
        <span>
            <h1>XCompany</h1>
            <span><a href="http://localhost/LabTask/Lab%20Task%204/Homepage/homepage.html">Home</a></span>
            <span><a href="">Login</a></span>
            <span><a href="http://localhost/LabTask/Lab%20Task%204/Homepage/registration.php">Registration</a></span>
        </span>
    </div>
    <div>
        <h3>LOGIN</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div>
                User Name <input type="text" name="username" value="<?php echo $username; ?>"><br>
                <span style="font-size: 12px;"><?php echo $usernameError; ?></span>
            </div>
            <div>
                Password <input class="alpha" type="password" name="password" value="<?php echo $password; ?>"><br>
                <span style="font-size: 12px;"><?php echo $passwordError; ?></span>
            </div>
            <div>
                <input type="checkbox" value="XYZ">
                <span>Remember Me</span>
            </div><br>
            <div> <input type="submit" name="submit" id="submit"> <a href="http://localhost/LabTask/Lab%20Task%204/Homepage/forgotPassword.php">Forgot Password?</a></div>
        </form>
    </div>
    <div>
        <p>Copyright &copy; 2017</p>
    </div>

</body>

</html>