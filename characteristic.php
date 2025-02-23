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
if (isset($_POST['set_characetristic'])) {
}
$a=$_POST['age'];
$w=$_POST['weight'];
$h=$_POST['height'];
$s=$_POST['sex'];
$al=$_POST['activity_level'];
$wg=$_POST['weight_gain'];
$id_h=$_SESSION['id_user'];
echo $_SESSION['id_user'];
$l='base';
$stmt=$conn->prepare("INSERT INTO characteristic (age,weight,height,sex,activity_level,weight_gain,id_har,level) values(?,?,?,?,?,?,?,?)");
$stmt->bind_param('iiisdsis',$a,$w,$h,$s,$al,$wg,$id_h,$l);
$stmt->execute();
//header("Refresh:0; url=user_kabinet1.php"); 
header ("Location: set_photo.html");
mysqli_close($conn);
?>