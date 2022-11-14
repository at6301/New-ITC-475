<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/dbConnection.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        header("Location: admin.php");
        exit();
    }
    else {
        $error = "Error";
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mega Travel</title>
        <link rel="stylesheet" href="styles.css">
        <script src="welcome.js" defer></script>
    </head>
    <body>
        <header>
            <img src="mega travel logo.png" alt="logo" style = "height: 140px;">
        </header> 
        <form method="post">
            <div id="loginForm">
                <h1>Log In</h1>
                <?php
                    if($error){
                        echo "<div><p id='errorMessage'>Login Invalid</p></div>";
                    }
                ?>
                <div>
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <button>Log in</button>
                </div>
            </div>
        </form>
        <footer>
            <div style="margin-bottom: 20px;">Copyright Protected. All rights reserved.</div>
            <div>
                MEGA TRAVELS<br>
                mega@travels.com
            </div>
        </footer>
    </body>
</html>