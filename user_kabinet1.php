<?php
   session_start();

$dbc=mysqli_connect('localhost','root','B@dfencer2020','training_helper')or die('Error connecting to MySQL server');

if(isset($_POST["submit"])){
$this_email=$_POST["email"];
//$_SESSION['email']=$this_email;
$this_password=$_POST["password"];

$query_user="SELECT `name`,`surname`,`scores` from `users` where `email`=$this_email,`password`=$this_password";
//$result=mysqli_query($dbc,$query_user) or die("Error querying database");
$row=mysqli_fetch_array($query);
//$_SESSION['email']=$row;
//$_SESSION['name']=$row['name'];
$_SESSION['surname']=$row['surname'];
$_SESSION['scores']=$row['scores'];
//$_SESSION['photo']=$result[6];

}
mysqli_close($dbc);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="user_kabinet.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Kalnia:wght@500&family=Lemonada:wght@600&family=Michroma&family=Tenor+Sans&display=swap" rel="stylesheet">
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
    <div class="box_nav">
        <div class="navbar" style="position: fixed;">
            <a href="logout.php" method='POST'> Logout </a>
			<a href="set_photo.html" method='POST'> Update photo</a>
        </div>
    </div>
	<div class="wrapper">
    <div class="main">
        <div class="box">
            <div class="photo">
                <img><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['photo']).'"/>'?></img>
            </div>
        </div>
        <div class="sidebar">
            
            <div class="info">
                <div>
                    <h1><?php echo $_SESSION['name'],' ',$_SESSION['surname'];?></h1>
                    <div class="scores"><h2><?php echo $_SESSION['scores'];?></h2></div>
                </div>
            </div> 
            <div class="button_training" >
			<a class="button_select" href="find_exercises.html" >Select exercises</a>
                    <!--<a href="find_exercices.html"></a>-->
            </div>
        </div>
    </div>
	<div class="footer">
    <div class="buttons_footer">
            <!--<div class="button_top">Top users-->
			<a class="button_top" href="top_users.php">Top users</a>
            <!--</div>-->
            <a class="button_diet" method='POST' href="show_diet_plan.php">Show my diet plan</a>
            <!--</div>-->
    </div>
	</div>
	</div>
</body>
</html>