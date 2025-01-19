<?php
require "db-connection.php";
$sql = "CREATE TABLE `educational_part` (`student_id` int(11) NOT NULL, `average_mark` decimal(10,2) NOT NULL, `attendance` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
