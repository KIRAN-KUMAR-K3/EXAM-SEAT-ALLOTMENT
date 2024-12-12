<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #00c6ff, #0072ff); /* Cool-toned gradient */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.6); /* Dark background with opacity */
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 90%;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 25px;
            font-weight: 600;
            color: #fff;
            letter-spacing: 1px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 16px;
            font-weight: 500;
            color: #fff;
        }

        input[type="text"] {
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"] {
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            background: #00c6ff;
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s;
        }

        input[type="submit"]:hover {
            background: #0072ff;
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

        p {
            margin-top: 20px;
            font-size: 14px;
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Room</h2>
        <form method="POST" action="">
            <label for="room_number">Room Number:</label>
            <input type="text" name="room_number" id="room_number" required>
            <input type="submit" value="Add Room">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room_number = $_POST['room_number'];

            $sql = "INSERT INTO rooms (room_number) VALUES ('$room_number')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Room added successfully!</p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>

