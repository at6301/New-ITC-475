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
        <div id="returnInfoDiv" class="returnInfoDiv" style="padding: 10px;">
        <?php

            $name = $_POST["fname"] . " " . $_POST["lname"];
            $email = $_POST["email"];
            $phone =  $_POST["phoneNum"];
            $adults = $_POST["adults"];
            $children = $_POST["children"];
            $destination = $_POST["location"];
            $travelStart = $_POST["dateStart"];
            $dateStart=date("Y-m-d H:i:s",strtotime($travelStart));
            $travelEnd = $_POST["dateEnd"];
            $dateEnd=date("Y-m-d H:i:s",strtotime($travelEnd));
            $activities = implode(', ', $_POST['activity'] );
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mysql";

            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO contact_entry(
                name,
                email, 
                phone_number, 
                adults, 
                children,
                destination,
                travel_start_date,
                travel_end_date,
                interested_activities) 
            VALUES (
                '$name',
                '$email',
                '$phone',
                $adults,
                $children,
                '$destination',
                '$dateStart',
                '$dateEnd',
                '$activities')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        ?>
        <p>
            Thank you for submitting your travel agent contact request! Here is the information you submitted: <br>
            <br>
            Client Name: <?php echo $name; ?> <br>
            Client Email: <?php echo $email; ?> <br>
            Client Phone Number: <?php echo $phone; ?> <br>
            Number of Adults: <?php echo $adults;?> <br>
            Number of Children: <?php echo $children; ?> <br>
            Destination: <?php echo $destination; ?> <br>
            Travel Start Date: <?php echo $travelStart; ?> <br>
            Travel End Date: <?php echo $travelEnd; ?> <br>
            Interested Activities: <?php echo $activities; ?> <br>
            <br>
            <br>
            An agent will be in touch with you soon! <br>
        </p>
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