<!DOCTYPE html>
<html lang="en">
<head>
    <title>EXPLORE INDIA</title>
    
    <style>
        body {
            transition: background-image 1s ease-in-out;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:lightseagreen ;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        #content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2, h3 {
            color:black;
        }

        p {
            color: #333;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #1a237e;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3949ab;
        }

        .city-box {
            display: inline-block;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        .city-box:hover {
            transform: scale(1.05);
        }

     
    </style>
</head>
<body>
    <header>
        <h1>Tourist Places in India</h1>
        <form method="get" action="index2.php">
            <button> Book Now</button>
    </form>
       
    </header>
    <main id="content">
        <h2>EXPLORE INDIA!!!</h2>
        <h3>Type a city name to explore tourist places:</h3>

        <form method="get" action="city.php">
            <input type="text" name="city" placeholder="Enter a city" />
            <button type="submit">Explore</button>
        </form>

        <?php
        include "db.php";

        $sql = "SELECT * FROM cities";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cityId = $row['city_id'];
                $cityName = $row['cities'];

                echo "<div class='city-box' onclick='toggleCityInfo(this)'>";
                
                echo "<a href='city.php?city=$cityName'>";
                echo "<h3>$cityName</h3>";
                echo "</a>";

                echo "<div class='city-info'>";
                echo "</div></div>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </main>
    <script>

    document.addEventListener("DOMContentLoaded", function () {
        console.log("DOM Content Loaded!");
        

        const body = document.body;
        const links = [
            'url("1.jpg")',
            'url("2.jpg")',
            'url("3.jpg")',
            'url("4.jpg")',
            'url("5.jpg")',
            'url("6.jpg")',
            'url("7.jpg")',
            'url("8.jpg")',
        ];

        let currentIndex = 0;

        function changeBackground() {
            body.style.backgroundImage = links[currentIndex];
            currentIndex = (currentIndex + 1) % links.length;
        }

        setInterval(changeBackground, 2000);
    });
</script>
    <script src="script.js"></script>
</body>
</html>

