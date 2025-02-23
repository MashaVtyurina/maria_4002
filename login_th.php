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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
	$sql_1=mysqli_query($conn,"SELECT name,surname,scores,photo,id_user FROM users WHERE email='".$email."'");
	$n=mysqli_fetch_array($sql_1);
	//$n=mysqli_query($conn,"SELECT `name` FROM `users` WHERE `email`=$email");
	
	$_SESSION['email']=$email;
	$_SESSION['name']=$n[0];
	$_SESSION['surname']=$n[1];
	$_SESSION['scores']=$n[2];
	$_SESSION['photo']=$n[3];
	$_SESSION['id_user']=$n[4];
	$sql_2=mysqli_query($conn,"SELECT `id_plan` FROM `user_diet_plan_connection` WHERE `id_user`='".$_SESSION['id_user']."'");
	$diet=mysqli_fetch_array($sql_2);
	$_SESSION['id_plan']=$diet[0];
    // Проверяем, существует ли пользователь с указанной почтой
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
	session_write_close();
    if ($user && $password==$user['password']) {
        // Перенаправление на личный кабинет
        header("Location: user_kabinet1.php");
        exit();
    } else {
        echo "Неверная почта или пароль. Проверьте корректность данных!";
    }

    // Закрываем подготовленный запрос
    $stmt->close();
} else {
    echo "Неправильный запрос!";
}

// Закрываем соединение
$conn->close();
?>