<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L3Task-2</title>
    <style>

        .error {
            color: red;
        }

        div {
            text-align: right;

            width: 420px;
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    // define variables and set to empty values
    $currentpasswordError = $newpasswordError = $confirmpasswordError = "";
    $currentpassword = $newpassword = $confirmpassword = "";

    $currentpassword = "Abc!23";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["newpassword"])) {
            $newpasswordError = "Can not be empty";
        } else {
            $newpassword = $_POST["newpassword"];
            if ($newpassword == $currentpassword) {
                $newpasswordError = "Password can not be same as old password";
            } elseif (!preg_match("/\W/", $newpassword)) {
                $newpasswordError = "Should have atleast one special character";
            }
        }

        if (empty($_POST["confirmpassword"])) {
            $confirmpasswordError = "Can not be empty";
        } else {
            $confirmpassword = $_POST["confirmpassword"];
            if ($confirmpassword != $newpassword) {
                $confirmpasswordError = "Password did not match";
            }
        }
    }
    ?>

    <h2>CHANGE PASSWORD</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            Current Password : <input type="password" name="currentpassword" value="<?php echo $currentpassword ?>"><br>
            <span style="font-size: 14px;" class="error"><?php echo $currentpasswordError; ?></span>
        </div>
        <div>
            New Password : <input type="password" name="newpassword" value="<?php echo $newpassword ?>"><br>
            <span style="font-size: 14px;" class="error"><?php echo $newpasswordError; ?></span>
        </div>
        <div>
            Retype New Password : <input type="password" name="confirmpassword" value="<?php echo $confirmpassword ?>"><br>
            <span style="font-size: 14px;" class="error"><?php echo $confirmpasswordError ?></span>
        </div><br>
        <div> <input type="submit" name="submit" value="submit"></div>
    </form>
</body>

</html>