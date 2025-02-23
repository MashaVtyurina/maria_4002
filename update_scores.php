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
if (isset($_POST['exercises_done'])) {
}
$new_scores=$_SESSION['scores']+$_SESSION['sum'];
$_SESSION['scores']=$new_scores;
$stmt=$conn->prepare("UPDATE users SET scores= ? WHERE id_user= ?");
$stmt->bind_param('ii',$new_scores,$_SESSION['id_user']);
$stmt->execute();
//header("Refresh:0; url=user_kabinet1.php"); 
header ("Location: user_kabinet1.php");
mysqli_close($conn);
?>