<?php
require "db-connection.php";
$sql = "INSERT INTO `educational_part` (`student_id`, `average_mark`, `attendance`) VALUES (1, 5.00, 100), (2, 4.70, 85), (3, 3.50, 75);";
$sql .= "INSERT INTO `students` (`student_id`, `student_name`, `student_surname`, `sudent_burthday`) VALUES (1, 'Іван', 'Іванов', '1986-04-20'), (2, 'Іван', 'Петров', '1987-01-14'), (3, 'Петро', 'Іванов', '1986-04-20');";
$sql .= "INSERT INTO `students_and_subjects` (`student_id`, `subject_name`) VALUES (1, 'PHP'), (1, 'Англійська мова'), (1, 'JavaScript'), (2, 'PHP'), (2, 'JavaScript'), (3, 'Англійська мова'), (3, 'JavaScript');";
$sql .= "INSERT INTO `subjects` (`subject_name`, `subject_hours`) VALUES ('PHP', 640), ('Англійська мова', 480), ('JavaScript', 320);"; 
if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
