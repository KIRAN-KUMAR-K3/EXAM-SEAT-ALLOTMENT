CREATE DATABASE exam_seating;

USE exam_seating;

-- Table for students
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usn VARCHAR(15) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    semester INT NOT NULL,
    subject_code VARCHAR(20) NOT NULL
);

-- Table for rooms
CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) NOT NULL UNIQUE,
    capacity INT DEFAULT 24
);

-- Table for room allotments
CREATE TABLE room_allotments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) NOT NULL,
    student_usn VARCHAR(15) NOT NULL,
    subject_code VARCHAR(20) NOT NULL,
    FOREIGN KEY (room_number) REFERENCES rooms(room_number),
    FOREIGN KEY (student_usn) REFERENCES students(usn)
);
