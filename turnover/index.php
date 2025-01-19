<?php
require "db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
//Максимальний продаж
$sql = "SELECT MAX(`product_sale`) AS MaxSale FROM `turnover`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Максимальна к-сть продаж: " . $row["MaxSale"] . "<br/>\n";
    }
} else {
    echo "Результатів не знайдено";
}
echo "<br/>\n";

//Сума цін
$sql = "SELECT SUM(`product_price`) AS SumOfPrices FROM `turnover`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Сума цін: " . $row["SumOfPrices"] . "<br/>\n";
    }
} else {
    echo "Результатів не знайдено";
}
echo "<br/>\n";

//Сортування за алфавітом
$sql = "SELECT * FROM `turnover` ORDER BY `product_name` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Список товарів</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Продукт</th><th>Ціна</th><th>Продаж</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_name"] . "</td><td>" . $row["product_price"] . "</td><td>" . $row["product_sale"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Результатів не знайдено";
}
echo "<br/>\n";

//Виведення товарів, продажі яких більші за певне значення, а ціна знаходиться у певному діапазоні
$sql = "SELECT * FROM `turnover` WHERE `product_sale` > 150 AND `product_price` BETWEEN 50 AND 400";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Товари, продажі яких більші за певне значення, а ціна знаходиться у певному діапазоні</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Продукт</th><th>Ціна</th><th>Продаж</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_name"] . "</td><td>" . $row["product_price"] . "</td><td>" . $row["product_sale"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Результатів не знайдено";
}
$conn->close();
?>
</body>
</html>