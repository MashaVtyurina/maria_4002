<?php 

$server = 'localhost';
$username = 'root';
$password = 'B@dfencer2020';
$dbname = 'training_helper';
// Create connection using mysqli_connect()
$conn = mysqli_connect($server, $username,
$password, $dbname);
// If $conn is false, connection is failed
if (!$conn ) {
 die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD']==='POST'){
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	session_start();
	$_SESSION['email']=$email;
//Проверяем существует ли уже такой пользователь по email
$stmt=$conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param('s',$email);
$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0){
	echo "Пользователь с таким email уже существует. Проверьте корректность данных!";
	exit();
}

//INSERT нового пользователя
$stmt=$conn->prepare("INSERT INTO users (name,surname,email,password) VALUES(?,?,?,?)");
$stmt->bind_param('ssss',$name,$surname,$email,$password);
if ($stmt->execute()){
	$stmt=$conn->prepare("SELECT id_user FROM users WHERE email = ? ");
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$result = $stmt->get_result();
	$id_us=$result->fetch_array();
	$_SESSION['id_user']=$id_us[0];
	header ("Location: characteristic.html");
	exit();
} else{
	echo "Возникла ошибка при регистрации!";
}

//Закрываем подготовленный запрос
$stmt->close();
} else {
	echo "Неправильный запрос";
}

//Закрываем соединение
$conn->close();
?>

