<?php

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

$result=mysqli_query($conn,"SELECT name,surname,scores FROM users ORDER BY scores DESC LIMIT 3");
  //while($row = mysqli_fetch_array($result)){
    //$name=$row['name'];
    //$surname=$row['surname'];
	//$scores=$row['scores'];
	////header("Location: top_users.html");
    //echo "<p>$name - $surname - $scores</p>";
  //}
	
 mysqli_close($conn);
?>
<head>
    <meta charset="UTF-8">
    <title>Top users</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Kalnia:wght@500&family=Lemonada:wght@600&family=Michroma&family=Tenor+Sans&display=swap" rel="stylesheet">
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
		body{
			background: radial-gradient(#F8AD9D,#57CC99,#C7F9CC);
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
            font-size: 50;
            font-family:'Michroma',sans-serif;
        }
 
        td {
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
			font-color: white;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: bold;
        }
    </style>
</head>
 
<body>
<div class="box_nav">
        <div class="navbar" style="position: fixed;">
            <a href="logout"> Logout </a>
            <a href="user_kabinet1.php">Back to account</a>
        </div>
</div>
    <section>
        <h1>Here are the champions!</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <!--<tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Scores</th>
            </tr>-->
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['surname'];?></td>
                <td><?php echo $rows['scores'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>