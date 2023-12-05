<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tourism Booking Form</h1>
    <form id="contactForm" method="post" action="process_form.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required>
        <br>
        <label for="checkin">Travel Date:</label>
        <input type="date" id="checkin" name="checkin" required>
        <br>
        <label for="t">Number of Travelers:</label>
        <input type="number" id="t" name="t" min="1" >
        <br>
        <div class="tour-selection">
                <h2>Select Your Tour Package</h2>
                <label for="tourPackage">Choose a Tour Package:</label>
                <select id="tourPackage" name="tourPackage" required>
                    <option value="0">-- Please Select --</option>
                    <option value="1">Package1</option>
                    <option value="2">package2</option>
                    <option value="3">package3</option>
                    <option value="4">package4</option>
                    <option value="5">package5</option>
                    
                </select>
            </div>
            <div class="booking-details">
                <h2>Booking Details</h2>
                <p id="bookingSummary"></p>
            </div>
        <button type="submit">SUBMIT</button>
    </form>

    <script src="script.js"></script>
</body>
</html>