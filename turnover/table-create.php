<?php
require "db-connection.php";

$sql = "CREATE TABLE `turnover2`.`turnover` (`product_name` VARCHAR(255) NOT NULL , `product_price` DECIMAL(10,2) NOT NULL , `product_sale` INT NOT NULL ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);