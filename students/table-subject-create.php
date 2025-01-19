<?php
require "db-connection.php";
$sql = "CREATE TABLE `subjects` (`subject_name` varchar(255) NOT NULL, `subject_hours` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);