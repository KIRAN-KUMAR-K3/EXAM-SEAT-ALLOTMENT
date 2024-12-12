<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
        }

        h2 {
            font-size: 24px;
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
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            background: #6a11cb;
            color: #fff;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s;
        }

        input[type="submit"]:hover {
            background: #2575fc;
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

        p {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Student</h2>
        <form method="POST" action="">
            <label for="usn">USN:</label>
            <input type="text" name="usn" id="usn" required>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="semester">Semester:</label>
            <input type="number" name="semester" id="semester" required>
            <label for="subject_code">Subject Code:</label>
            <input type="text" name="subject_code" id="subject_code" required>
            <input type="submit" value="Add Student">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usn = $_POST['usn'];
            $name = $_POST['name'];
            $semester = $_POST['semester'];
            $subject_code = $_POST['subject_code'];

            $sql = "INSERT INTO students (usn, name, semester, subject_code) VALUES ('$usn', '$name', '$semester', '$subject_code')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Student added successfully!</p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
