<?php
$message = $error = "";

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $error = "<label class='text-danger'>Enter Name</label>";
    } else if (empty($_POST["email"])) {
        $error = "<label class='text-danger'>Enter an e-mail</label>";
    } else if (empty($_POST["username"])) {
        $error = "<label class='text-danger'>Enter a username</label>";
    } else if (empty($_POST["password"])) {
        $error = "<label class='text-danger'>Enter a password</label>";
    } else if (empty($_POST["rePassword"])) {
        $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";
    } else if (empty($_POST["gender"])) {
        $error = "<label class='text-danger'>Gender cannot be empty</label>";
    } else {
        if (file_exists('data.json')) {
            $current_data = file_get_contents('data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                "name"               =>     $_POST['name'],
                "email"          =>     $_POST["email"],
                "username"     =>     $_POST["username"],
                "gender"     =>     $_POST["gender"],
                "dob"     =>     $_POST["dob"]
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('data.json', $final_data)) {
                $message = "<label class='text-success'>File Appended Success fully</p>";
            }
        } else {
            $error = 'JSON File does not exist';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L3Task-4</title>
</head>

<body>
    <h2>REGISTRATION</h2>
    <form method="POST">

        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>

        <div>
            <span>Name</span>
            <input type="text" name="name" class="alpha">
        </div>
        <div>
            <span>Email</span>
            <input type="text" name="email" class="alpha">
        </div>
        <div>
            <span>User Name</span>
            <input type="text" name="username" class="alpha">
        </div>
        <div>
            <span>Password</span>
            <input type="text" name="password" class="alpha">
        </div>
        <div>
            <span>Confirm Password</span>
            <input type="text" name="rePassword" class="alpha">
        </div>
        <div>
            <Span>Gender</Span><br><br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Other
        </div>
        <div>
            <span>Date of Birth</span><br><br>
            <input type="date" name="dob">
        </div>
        <div>
            <input type="submit" name="submit"> <input type="reset" name="reset">
        </div>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </form>
</body>

</html>