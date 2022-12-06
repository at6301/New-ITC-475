<!DOCTYPE html>
<html>
    <head>
        <title>Race History</title>
    </head>
    <body>
        <div style="margin: auto;">
            <h3>The most recent 5 race results are: </h3>
            <table border=1;>
                <tr>
                    <th>Racer One</th>
                    <th>Racer Two</th>
                    <th>Winner</th>
                    <th>Timestamp</th>
                </tr>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "race_game";

                    $racerOne = $_POST['racerOne'];
                    $racerTwo = $_POST['racerTwo'];

                    try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM race ORDER BY timestamp DESC LIMIT 5";
                    $result = $conn->query($sql);
                    if($result->rowCount() > 0){
                        while ($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>".$row['racer_one']."</td>";
                            echo "<td>".$row['racer_two']."</td>";
                            echo "<td>".$row['winner']."</td>";
                            echo "<td>".$row['timestamp']."</td>";
                            echo "</tr>";
                        }
                        unset($result);
                    }
                    } catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                    }

                    $conn = null;
                ?>
            </table>
        </div>
        <div style="margin: auto;">
            <h3>Select two racers to view past racing results: </h3>
            <form id="selectRacersForm" method="POST" action="raceHistory.php">
                <label for="racerOne">Racer One:</label>
                <select id="racerOne" name="racerOne">
                    <option value=""></option>
                    <option value="dog" <?php if($racerOne == 'dog'){echo 'selected';} ?>>Dog</option>
                    <option value="dragon" <?php if($racerOne == 'dragon'){echo 'selected';}?>>Dragon</option>
                </select>
                <label for="racerTwo" style="margin-left: 10px;">Racer Two:</label>
                <select id="racerTwo" name="racerTwo">
                    <option value=""></option>
                    <option value="hamster" <?php if($racerTwo == 'hamster'){echo 'selected';} ?>>Hamster</option>
                    <option value="pigeon" <?php if($racerTwo == 'pigeon'){echo 'selected';} ?>>Pigeon</option>
                </select>
                <input type="submit" value="Submit" style="margin-left: 10px;">
            </form>
            <br>
            <table border=1;>
                <tr>
                    <th>Racer One</th>
                    <th>Racer Two</th>
                    <th>Winner</th>
                    <th>Timestamp</th>
                </tr>
                <?php
                    try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM race WHERE racer_one = '$racerOne' AND racer_two = '$racerTwo' ORDER BY timestamp DESC LIMIT 10";
                    $result = $conn->query($sql);
                    if($result->rowCount() > 0){
                        while ($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>".$row['racer_one']."</td>";
                            echo "<td>".$row['racer_two']."</td>";
                            echo "<td>".$row['winner']."</td>";
                            echo "<td>".$row['timestamp']."</td>";
                            echo "</tr>";
                        }
                        unset($result);
                    }
                    } catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                    }

                    $conn = null;
                ?>
            </table>
        </div>
    </body>
</html>