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
        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
$checkIDSql = "SHOW COLUMNS FROM educational_part LIKE 'ID'";
$result = mysqli_query($conn, $checkIDSql);

if (mysqli_num_rows($result) == 0) {
    $sql = "ALTER TABLE educational_part ADD COLUMN ID INT PRIMARY KEY AUTO_INCREMENT";
    if (mysqli_query($conn, $sql)) {
        echo "Поле ID успішно додано<br/>\n";
    } else {
        echo "Помилка додавання поля ID: " . mysqli_error($conn) . "<br/>\n";
    }
} else {
    echo "Поле ID вже існує в таблиці educational_part.<br/>\n";
}

echo "<br/>\n";
mysqli_close($conn);
?>
</body>
</html>