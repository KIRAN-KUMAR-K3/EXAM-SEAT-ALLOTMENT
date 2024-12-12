<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Allotment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #11998e, #38ef7d);
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
            max-width: 800px;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: rgba(255, 255, 255, 0.3);
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        p {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Room Allotment</h2>
        <?php
        $sql = "SELECT s.usn, s.name, s.subject_code, r.room_number 
                FROM students s 
                JOIN rooms r 
                ON MOD(s.id - 1, (SELECT COUNT(*) FROM rooms)) + 1 = r.id
                ORDER BY s.usn";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Room Number</th>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Subject Code</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['room_number']}</td>
                        <td>{$row['usn']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['subject_code']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No allotments found.</p>";
        }
        ?>
    </div>
</body>
</html>
