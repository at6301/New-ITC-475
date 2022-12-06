<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            $racerOne = $_POST["racerOneValue"];
            $racerTwo = $_POST["racerTwoValue"];
            $winner =  $_POST["winnerValue"];
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "race_game";

            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO race(
                racer_one,
                racer_two, 
                winner) 
            VALUES (
                '$racerOne',
                '$racerTwo',
                '$winner')";
            // use exec() because no results are returned
            $conn->exec($sql);
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;

            header("Location: raceHome.html");
            exit();
        ?>
    </body>
</html>