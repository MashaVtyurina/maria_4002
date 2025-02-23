<?php
if(isset($_POST["submit"])){

 $check = getimagesize($_FILES["output_image"]["tmp_name"]);
 if($check !== false){
 $image = $_FILES['output_image']['tmp_name'];
 $imgContent = addslashes(file_get_contents($image));
 
 $dbHost = 'localhost';
 $dbUsername = 'root';
 $dbPassword = 'B@dfencer2020';
 $dbName = 'training_helper';
 $user_id = $_POST["user_id"];
 $user_name = $_POST["user_name"];
 $user_surname= $_POST["user_surname"];

 //Create connection and select DB
 $dbc = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) or
die("Connection failed: " );
$null = NULL;
$sql = "INSERT into users (user_id, user_name, user_surname, photo)
VALUES (?, ?, ?, '$imgContent')";
if($stmt = mysqli_prepare($dbc, $sql)){

 mysqli_stmt_execute($stmt);

 echo "Запись успешно вставлена.";
} else{
 echo "ERROR: Не удалось подготовить запрос: $sql. " . mysqli_error($link);
}
mysqli_stmt_close($stmt);
//Here we will get the extension of the file being uploaded
$temp = explode(".",$_FILES["output_image"]["name"]);
//Here we provide the new name and append the extension
$target_file = "uploads/".$user_name.'.jpg';
move_uploaded_file($_FILES["output_image"]["tmp_name"], $target_file);

 }else{
 echo "Please select an image file to upload.";
 }
}
?>