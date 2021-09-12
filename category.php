<?php


$db_host='localhost'; // ваш хост
$db_name='curs4'; // ваша бд
$db_user='root'; // пользователь бд
$db_pass=''; // пароль к бд
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $category=$_POST['category'];
$mysqli->query("INSERT INTO category(category) VALUES ('{$category}')");

header('Refresh: 3; url=http://localhost/%D0%9F%D0%BB%D0%B0%D1%82%D0%B5%D0%B3%D0%B8/%D0%9A%D1%83%D1%80%D1%81%D0%BE%D0%B2%D0%B0%D1%8F/categories.html');
echo '<h1>Запись успешно добавлена</h1>';
}
else {
    $result = $mysqli->query("SELECT * FROM category"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
    echo '<p>Запись id='.$row['category_id'].'. Текст: '.$row['category'].'</p>';// выводим данные
}
    
}
?>