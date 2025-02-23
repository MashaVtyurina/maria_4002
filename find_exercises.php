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
if (isset($_POST['done'])) {
$num=$_POST['number_of_exercises'];
//echo $num;
$target=$_POST['target'];
$stmt=$conn->prepare("SELECT name,scores_for_exercise FROM exercises WHERE target = ? ");//LIMIT ?");
$stmt->bind_param('s',$target);//,$num);
$stmt->execute();
$result = $stmt->get_result();
$exercises_with_target=$result->fetch_array();

//$exercises = $result->fetch_assoc();
//echo count($exercises);
#вынести в html
//$exercises_sep=implode("<br>\r\n", $exercises);
//echo $exercises_sep;
#вот до сюда
$stmt->close();


}	
 mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>users's diet plan</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Kalnia:wght@500&family=Lemonada:wght@600&family=Michroma&family=Tenor+Sans&display=swap" rel="stylesheet">
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
		body{
			background:radial-gradient(#F8AD9D,#57CC99,#C7F9CC);
			display:flex;
			justify-content: space-between;
			font-family:'Michroma',sans-serif;
			height:100%;

		}
		.navbar{
	overflow: hidden;
	background: #22577A;
	position:fixed;
    top:0;
	width: 100%;
    box-sizing: border-box;
}

.navbar a{
	float: right;
	display: block;
	color: rgb(255, 255, 255);
	text-align:right;
	padding: 30px 30px;
	text-decoration: none;
	font-family: 'Michroma',sans-serif;
	font-style: oblique;
	font-size: 24px;
	margin: 3px;
	}
.navbar a:hover{
	background:rgba(147, 211, 243, 0.815);
	color: #ffffff;
	}
.box_nav{
    height: 25px;
}
        table {
			width:80%;
			height:60%;
            margin-top: 0%;
			margin-left: 10%;
			margin-right: 5%;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
			margin-top: 10%;
			margin-left: 10%;
			margin-right: 5%;
            text-align: center;
            color: #000000;
            size: 50;
            font-family:'Michroma',sans-serif;
        }
 
        .auth-container {
			margin-top:8%;
            background-color: rgba(255, 255, 255, 0.95); /* Устанавливаем полупрозрачный белый фон для контейнера */
            padding: 30px; /* Устанавливаем внутренние отступы */
            border-radius: 20px; /* Закругляем углы контейнера */
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2); /* Добавляет тень к контейнеру */
            
            width: 600px; /* Устанавливаем максимальную ширину контейнера */
			max-heigth: 70%;
            text-align: center; /* Выравниваем  текст по центру */
        }
		
		.auth-container form {
            display: flex; /* Использует Flexbox для размещения элементов формы */
            flex-direction: column; /* Располагает элементы формы в колонку */
        }
		
		.auth-container input {
            margin-bottom: 15px; /* Устанавливает нижний отступ для полей ввода */
            padding: 10px; /* Устанавливает внутренние отступы для полей ввода */
            border: 1px solid #ccc; /* Устанавливает рамку для полей ввода */
            border-radius: 5px; /* Закругляет углы полей ввода */
            transition: border-color 0.3s; /* Добавляет плавный переход для изменения цвета рамки */
        }
		
		.auth-container button {
            background-color: #57CC99; /* Устанавливает цвет фона для кнопок */
            color: white; /* Устанавливает цвет текста кнопок */
            padding: 10px; /* Устанавливает внутренние отступы для кнопок */
			margin-top:15px;
            border: none; /* Убирает рамку у кнопок */
            border-radius: 10px; /* Закругляет углы кнопок */
            cursor: pointer; /* Меняет курсор на указатель при наведении */
            transition: background-color 0.3s; /* Добавляет плавный переход для изменения цвета фона */
        }
		
		p{
			size:50;
			
		}
		
		
    </style>
</head>
 
<body>
<div class="box_nav">
        <div class="navbar" style="position: fixed;">
            <a href="logout.php"> Logout </a>
			<a href="user_kabinet1.php">Back to account</a>

        </div>
</div>
<div class="auth-container">

				<h1><p><font size="+15" width="+10">Your list of exercises:</font></p></h1>
				<font size="+2"><?php
				//foreach ($exercises as $row){<p><font size="+8"><?php echo $row;</font></p>
				$index=1;
				$sum=0;
				while ($row = mysqli_fetch_array($result) and $index<$num+1) {
				echo $index. ') ' .$row[0] . "<br>\r\n";
					$sum=$sum+$row[1];
				
				$index++;
}
				echo '<br>You will get '.$sum.' additional scores!';
				$_SESSION['sum']=$sum;
?></font>
                



<form id="upd_sc" action="update_scores.php" method="POST">
	<button name='exercises_done' type="submit">Exercises done</button></input>
	<p><font size="-2">*we hope you don't lie*</p>
	</form>
</div>
</body>

 
</html>