<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>City Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e7e3e3;
            text-align: center;
        }

        header {
            background-color: rgb(98, 98, 172);
            color: #fff;
            padding: 20px 0;
        }

        main {
            padding: 20px;
            box-sizing: border-box;
            max-width: 1200px;
            margin: 0 auto;
        }

        h2, h3 {
            color: rgb(98, 98, 172);
        }

        img {
            width: 100%;
            max-height: auto;
            object-fit: cover;
            margin: 10px 0;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            text-align: left;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: rgb(98, 98, 172);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>City Information</h1>
    </header>
    <main>
        <?php
        if (isset($_GET['city'])) {
            $city = $_GET['city'];

            $sqlCity = "SELECT * FROM cities WHERE cities = '$city'";
            $resultCity = $conn->query($sqlCity);

            if ($resultCity->num_rows > 0) {
                $rowCity = $resultCity->fetch_assoc();
                echo "<h2>" . $rowCity['cities'] . "</h2>";

                $cityId = $rowCity['city_id'];
                $sqlPlaces = "SELECT * FROM places WHERE city_id = $cityId";
                $resultPlaces = $conn->query($sqlPlaces);

                if ($resultPlaces->num_rows > 0) {
                    echo "<h3>Places to Visit in " . $rowCity['cities'] . "</h3>";
                    while ($rowPlace = $resultPlaces->fetch_assoc()) {
                        echo "<img src='" . $rowPlace['img'] . "' alt='" . $rowPlace['places'] . "' />";
                        echo "<p><strong>" . $rowPlace['places'] . "</strong>: " . $rowPlace['INFO'] . "</p>";
                       echo "<p><strong>" . "</strong> " . $rowPlace['FEE'] . "</p>";
                        echo "<p><strong>" . "</strong> " . $rowPlace['TIMMINGS'] . "</p>";
                    }
                } else {
                    echo "<p>No places found in " . $rowCity['cities'] . "</p>";
                }
            } else {
                echo "<p>City information not found.</p>";
            }
        } else {
            echo "<p>City parameter not provided.</p>";
        }

        $conn->close();
        ?>
        <a href="index.php">Back to Home</a>
    </main>
    
</body>
</html>


