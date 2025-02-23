<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "B@dfencer2020";
$dbname = "training_helper";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if(isset( $_POST['upload_photo'])){
//$photo = $_FILES['photo']["tmp_name"];
$stmt=$conn->prepare("UPDATE users SET photo= ? WHERE id_user= ?");
$stmt->bind_param('si',file_get_contents($_FILES['photo']["tmp_name"]),$_SESSION['id_user']);
$stmt->execute();
header("Location:forma3.html");
}else{
 echo "failure to save file!";
}
?>