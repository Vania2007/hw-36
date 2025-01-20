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

// Зміна даних про певного студента
$sql = "UPDATE educational_part SET `attendance` = '85%' WHERE `student_id` = 3";
echo "<h2>Зміна даних про певного студента</h2>";
if (mysqli_query($conn, $sql)) {
    echo "<p>Дані про студента змінені успішно</p><br/>\n";
} else {
    echo "Помилка зміни даних про студента: " . mysqli_error($conn) . "<br/>\n";
}
echo "<br/>\n";


// Вивід студентів, в яких середній бал вище за 4,5 за спаданням дати народження
$sql = "SELECT s.student_name, s.student_surname, s.sudent_burthday, sm.average_mark, sa.attendance FROM students s JOIN educational_part sm ON s.student_id = sm.student_id JOIN educational_part sa ON s.student_id = sa.student_id WHERE sm.average_mark > 4.5 ORDER BY sm.average_mark DESC";
echo "<h2>Вивід студентів, в яких середній бал вище за 4,5 за спаданням дати народження</h2><br/>\n";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Ім'я</th><th>Прізвище</th><th>Дата народження</th><th>Середній бал</th><th>Відвідуваність</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["student_surname"] . "</td>";
        echo "<td>" . $row["sudent_burthday"] . "</td>";
        echo "<td>" . $row["average_mark"] . "</td>";
        echo "<td>" . $row["attendance"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Результатів не знайдено<br/><br/>\n";
}
echo "<br/>\n";

// Вивід імені, прізвища, назви предмета, кількості годин
$sql = "SELECT s.student_name, s.student_surname, sub.subject_name, sub.subject_hours FROM students s JOIN students_and_subjects ss ON s.student_id = ss.student_id JOIN subjects sub ON ss.subject_name = sub.subject_name";
echo "<h2>Вивід імені, прізвища, назви предмета, кількості годин</h2><br/>\n";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Ім'я</th><th>Прізвище</th><th>Предмет</th><th>Кількість годин</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["student_surname"] . "</td>";
        echo "<td>" . $row["subject_name"] . "</td>";
        echo "<td>" . $row["subject_hours"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Результатів не знайдено<br/>\n";
}
mysqli_close($conn);
?>
</body>
</html>