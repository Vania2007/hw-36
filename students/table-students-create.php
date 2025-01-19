<?php
require "db-connection.php";
$sql = "CREATE TABLE `students2`.`students` (`student_id` INT NOT NULL AUTO_INCREMENT , `student_name` VARCHAR(255) NOT NULL , `student_surname` VARCHAR(255) NOT NULL , `sudent_burthday` DATE NOT NULL , PRIMARY KEY (`student_id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);