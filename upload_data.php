<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Data Entry</title>
</head>
<body>
    <h1>Jewellery Data Entry</h1>

    <!-- HTML Form for data entry -->
    <form action="upload_data.php" method="post">
        <label for="entry_date">Entry Date:</label><br>
        <input type="date" id="entry_date" name="entry_date" required><br><br>   
        
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="phone_number">Phone Number:</label><br>
        <input type="text" id="phone_number" name="phone_number" required><br><br>

        <label for="add">Address:</label><br>
        <input type="text" id="add" name="add" required><br><br>
  
        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" required><br><br>

        <label for="jewellery">Jewellery Type:</label><br>
        <input type="text" id="jewellery" name="jewellery" required><br><br>

        <label for="material">Material:</label><br>
        <input type="text" id="material" name="material" required><br><br>

        <label for="weight">Weight:</label><br>
        <input type="number" id="weight" name="weight" step="0.01" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Database configuration
        $servername = "localhost";
        $username = "id22248968_ambal_jewellery_db";
        $password = "Naresh_12345";
        $dbname = "id22248968_ambal_jewellery_db"; // Corrected variable name to match the script

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Collect form data
        $entry_date = $_POST['entry_date'];
        $fname = $_POST['fname'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['add'];
        $amount = $_POST['amount'];
        $jewellery_type = $_POST['jewellery'];
        $material = $_POST['material'];
        $weight = $_POST['weight'];

        // Sanitize input data
        $entry_date = $conn->real_escape_string($entry_date);
        $fname = $conn->real_escape_string($fname);
        $phone_number = $conn->real_escape_string($phone_number);
        $address = $conn->real_escape_string($address);
        $amount = $conn->real_escape_string($amount);
        $jewellery_type = $conn->real_escape_string($jewellery_type);
        $material = $conn->real_escape_string($material);
        $weight = $conn->real_escape_string($weight);

        // Insert data into the database
        $sql = "INSERT INTO jewellery_data (entry_date, fname, phone_number, address, amount, jewellery_type, material, weight)
        VALUES ('$entry_date', '$fname', '$phone_number', '$address', '$amount', '$jewellery_type', '$material', '$weight')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br><br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br><br>";
        }

        $conn->close();
    }
    ?>
</body>
</html>