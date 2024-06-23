<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Data</title>
</head>
<body>
    <h1>Jewellery Records</h1>

    <?php
    // Database configuration
    $servername = "localhost";
    $username = "id22248968_ambal_jewellery_db";
    $password = "Naresh_12345";
    $dbname = "id22248968_ambal_jewellery_db"; // Define $dbname variable

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update status
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Your update status, update money received, and update received date code here
    }

    // SQL query to select data
    $sql = "SELECT id, fname, phone_number, address, jewellery_type, material, weight, entry_date, amount, money_received, status, received_date FROM jewellery_data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data as an HTML table
        echo "<table border='1'>
                <tr>
                    <th>Entry Date</th>    
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Jewellery Type</th>
                    <th>Material</th>
                    <th>Weight</th>
                    <th>Money Received</th>
                    <th>Status</th>
                    <th>Received Date</th>
                    <th>Update Status</th>
                    <th>Update Money Received</th>
                    <th>Update Received Date</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['entry_date']}</td>
                    <td>{$row['id']}</td>
                    <td>{$row['fname']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['jewellery_type']}</td>
                    <td>{$row['material']}</td>
                    <td>{$row['weight']}</td>
                    <td>{$row['money_received']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['received_date']}</td>
                    <td>
<td>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
        <input type='radio' name='status' value='With Customer' <?php echo ($row['status'] == 'With Customer') ? 'checked' : ''; ?>> With Customer
        <input type='radio' name='status' value='With Us' <?php echo ($row['status'] == 'With Us') ? 'checked' : ''; ?>> With Us
        <input type='hidden' name='jewelry_id' value='<?php echo $row['id']; ?>'>
        <input type='submit' name='update_status' value='Update Status'>
    </form>
</td>
<td>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
        <input type='text' name='money_received' placeholder='Enter Money Received' required>
        <input type='hidden' name='jewelry_id' value='<?php echo $row['id']; ?>'>
        <input type='submit' name='update_money' value='Update Money Received'>
    </form>
</td>
<td>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
        <input type='date' name='received_date' value='<?php echo $row['received_date']; ?>' required>
        <input type='hidden' name='jewelry_id' value='<?php echo $row['id']; ?>'>
        <input type='submit' name='update_received_date' value='Update Received Date'>
    </form>
</td>

                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>
