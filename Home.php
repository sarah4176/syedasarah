<?php 
    define("t", "../Project/Project/Model/news.json");
    $handle = fopen(t, "r");
    $fr1 = fread($handle, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
     
        <title>Home</title>
    </head>
    <body>
        <fieldset>
            <?php include '../Project/Project/View/Header.php'; ?> 
            <div style="float: right;">
                <a href="/Project/Project/View/login.php">Login</a> | <a href="/Project/Project/View/Registration.php">Sign Up</a>
            </div>
        </fieldset>
          
        <h3 align="center">Welcome to EZ Learning</h3>
        <h3>News and Events</h3>
        <?php 
            if($arr1 == NULL){}
            else {
                for ($i = 0; $i < count($arr1); $i++) {
                    echo "<ul>";
                    echo "<li>" . $arr1[$i]->news . "</li>";
                    echo "</ul>";
                }
            }
        ?>
        
        <fieldset>
            <?php include '../Project/Project/View/Footer.php'; ?>
        </fieldset>
        
    </body>
</html>