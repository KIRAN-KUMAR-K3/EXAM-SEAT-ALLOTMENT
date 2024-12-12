<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'exam_seating';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add student
if (isset($_POST['add_student'])) {
    $usn = $_POST['usn'];
    $name = $_POST['name'];
    $semester = $_POST['semester'];
    $subject_code = $_POST['subject_code'];

    $conn->query("INSERT INTO students (usn, name, semester) VALUES ('$usn', '$name', $semester)");
    $conn->query("INSERT INTO subjects (subject_code, semester) VALUES ('$subject_code', $semester)");

    echo "<p>Student added successfully!</p>";
}

// Fetch students and allocate rooms
if (isset($_POST['generate'])) {
    $students = $conn->query("SELECT * FROM students ORDER BY semester");
    $rooms = $conn->query("SELECT * FROM rooms");

    // Clear previous allocations
    $conn->query("TRUNCATE TABLE seating_allocation");

    $roomList = [];
    while ($room = $rooms->fetch_assoc()) {
        $roomList[] = $room['room_number'];
    }

    $roomCount = count($roomList);
    $roomIndex = 0;

    while ($student = $students->fetch_assoc()) {
        $subject = $conn->query("SELECT subject_code FROM subjects WHERE semester = " . $student['semester'])->fetch_assoc();

        $roomNumber = $roomList[$roomIndex];
        $roomIndex = ($roomIndex + 1) % $roomCount;

        $conn->query("INSERT INTO seating_allocation (room_number, usn, subject_code) VALUES 
            ('$roomNumber', '{$student['usn']}', '{$subject['subject_code']}')");
    }

    echo "<p>Seating arrangements generated successfully!</p>";
}

// Fetch generated seating arrangement
$allocations = $conn->query("SELECT * FROM seating_allocation");

// Fetch available subjects for selection
$subjects = $conn->query("SELECT * FROM subjects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Seating Arrangements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 8px 0;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <h1>Exam Seating Arrangements</h1>

    <!-- Add Student Form -->
    <div class="form-container">
        <form method="POST">
            <h2>Add Student</h2>
            <label for="usn">USN</label>
            <input type="text" id="usn" name="usn" required>

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" required>

            <label for="subject_code">Subject Code</label>
            <select id="subject_code" name="subject_code" required>
                <?php while ($row = $subjects->fetch_assoc()): ?>
                    <option value="<?php echo $row['subject_code']; ?>"><?php echo $row['subject_code']; ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit" name="add_student">Add Student</button>
        </form>
    </div>

    <!-- Generate Seating Arrangements Form -->
    <form method="POST">
        <button type="submit" name="generate">Generate Seating Arrangements</button>
    </form>

    <!-- Display Seating Allocations -->
    <h2>Seating Allotment</h2>
    <table>
        <tr>
            <th>Room Number</th>
            <th>Student USN</th>
            <th>Subject Code</th>
        </tr>
        <?php while ($row = $allocations->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['usn']; ?></td>
                <td><?php echo $row['subject_code']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
