<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            text-align: left;
        }

        input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #ff4b2b;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #ff416c;
        }

        p {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Student</h2>
        <form method="POST" action="">
            <label for="usn">USN:</label>
            <input type="text" name="usn" required>
            <input type="submit" value="Delete Student">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usn = $_POST['usn'];

            $sql = "DELETE FROM students WHERE usn='$usn'";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Student deleted successfully!</p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
