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
        <div>
            <table border=1;>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Destination</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Activites</th>
                </tr>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "mysql";

                    try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM contact_entry WHERE 1";
                    $result = $conn->query($sql);
                    if($result->rowCount() > 0){
                        while ($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['phone_number']."</td>";
                            echo "<td>".$row['adults']."</td>";
                            echo "<td>".$row['children']."</td>";
                            echo "<td>".$row['destination']."</td>";
                            echo "<td>".$row['travel_start_date']."</td>";
                            echo "<td>".$row['travel_end_date']."</td>";
                            echo "<td>".$row['interested_activities']."</td>";
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
        <footer>
            <div style="margin-bottom: 20px;">Copyright Protected. All rights reserved.</div>
            <div>
                MEGA TRAVELS<br>
                mega@travels.com
            </div>
        </footer>
    </body>
</html>