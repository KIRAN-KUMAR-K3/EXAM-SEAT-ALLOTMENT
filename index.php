<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Seating Arrangement</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #FF5F6D, #FFC371); /* Sunset gradient */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.5); /* Dark background for contrast */
            border-radius: 20px;
            padding: 50px 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 100%;
            backdrop-filter: blur(10px); /* Background blur for a modern feel */
        }

        .container h1 {
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: 600;
            text-transform: uppercase;
            color: #fff;
            letter-spacing: 1px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .buttons button {
            font-size: 18px;
            font-weight: 600;
            padding: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            color: #fff;
            background: linear-gradient(145deg, #FF5F6D, #FFC371); /* Gradient background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .buttons button:hover {
            transform: translateY(-5px) scale(1.05);
            background: linear-gradient(145deg, #FFC371, #FF5F6D); /* Hover animation */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .buttons button:active {
            transform: translateY(2px) scale(0.98);
            background: linear-gradient(145deg, #FF5F6D, #FFC371); /* Active state effect */
        }

        .buttons button:focus {
            outline: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Exam Seating Arrangement</h1>
        <div class="buttons">
            <button onclick="location.href='add_student.php'">Add Students</button>
            <button onclick="location.href='delete_student.php'">Delete Present Students</button>
            <button onclick="location.href='add_room.php'">Add Room Number</button>
            <button onclick="location.href='allotment.php'">Generate Room Allotment</button>
        </div>
    </div>
</body>
</html>

