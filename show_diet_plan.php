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
$email = $_SESSION['email'];

//$id_us=mysqli_query($conn,"SELECT id_user FROM users WHERE email='".$email."'");
//$arr_1=mysqli_fetch_assoc($id_us);
//$plan=mysqli_query($conn,"SELECT `id_plan` FROM `user_diet_plan_connection` WHERE `id_user`='".$arr_1."'");
//$arr_2=mysqli_fetch_assoc($plan);
$query= mysqli_query($conn,"SELECT calories,proportions,workout_amount FROM diet_plan WHERE id_plan = '".$_SESSION['id_plan']."'");
$arr = mysqli_fetch_array($query);

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
			justify-content: space-between;
			font-family:'Michroma',sans-serif;
			height:100%;
			overflow:hidden;
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
 
        .box_output{

			text-align:center;
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
<div class='box_output'>
				<h1>Your  recommended  calories:</h1>
                <p><font size="+8"><?php echo $arr['calories'];?></font></p>
				<br><h3>The most healthy proportions:</h3></br>
                <p><font size="+3"><?php echo $arr['proportions'];?></font></p>
				<br><h3>Your programm assume <font size="+1"> <?php echo $arr['workout_amount'];?></font> workouts a week!</h3></br>

</div>
</body>
 
</html>