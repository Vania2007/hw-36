<?php
require "db-connection.php";

$sql = "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Хліб', 20.50, '250');";
$sql .= "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Молоко', 60.48, '176');";
$sql .= "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Шоколад', 62.15, '73');";
$sql .= "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Печиво', 48.99, '110');";
$sql .= "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Яйця', 4.30, '360');";
$sql .= "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Машинка', 245.99 , '22');";
$sql .= "INSERT INTO `turnover` (`product_name`, `product_price`, `product_sale`) VALUES ('Батарейки', 18.35, '360');";
if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
