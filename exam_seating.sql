
USE exam_seating;

-- Students Table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usn VARCHAR(20) NOT NULL,
    name VARCHAR(100) NOT NULL,
    semester INT NOT NULL
);

-- Rooms Table
CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) NOT NULL
);

-- Subjects Table
CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_code VARCHAR(20) NOT NULL,
    semester INT NOT NULL
);

-- Seating Allocation Table
CREATE TABLE seating_allocation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) NOT NULL,
    usn VARCHAR(20) NOT NULL,
    subject_code VARCHAR(20) NOT NULL
);

-- Insert Sample Data
INSERT INTO students (usn, name, semester) VALUES
('S001', 'Alice', 1),
('S002', 'Bob', 1),
('S003', 'Charlie', 2),
('S004', 'David', 2),
('S005', 'Eve', 3);

INSERT INTO rooms (room_number) VALUES
('Room-101'),
('Room-102'),
('Room-103');

INSERT INTO subjects (subject_code, semester) VALUES
('CS101', 1),
('CS102', 2),
('CS103', 3);
