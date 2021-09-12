<?php

$db_host='localhost'; // ваш хост
$db_name='curs4'; // ваша бд
$db_user='root'; // пользователь бд
$db_pass=''; // пароль к бд
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$size=$_POST['size'];
$mysqli->query("INSERT INTO sizes(size) VALUES ('{$size}')");

// header('Location: http://localhost/%D0%9F%D0%BB%D0%B0%D1%82%D0%B5%D0%B3%D0%B8/%d0%9a%d1%83%d1%80%d1%81%d0%be%d0%b2%d0%b0%d1%8f/sizes.html');
header('Refresh: 3; url=http://localhost/%D0%9F%D0%BB%D0%B0%D1%82%D0%B5%D0%B3%D0%B8/%d0%9a%d1%83%d1%80%d1%81%d0%be%d0%b2%d0%b0%d1%8f/sizes.html');
echo 'Запись успешно добавлена';
}

else {
    $result = $mysqli->query("SELECT * FROM sizes"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
    echo '<p>Запись id='.$row['id_size'].'. Текст: '.$row['size'].'</p>';// выводим данные
}
    
}
?>