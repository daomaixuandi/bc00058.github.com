<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location: products.php'); // Chuyển hướng đến trang products.php
      exit;
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   
   <style>
   	body {
   		margin: 0;
   		padding: 0;
   		display: flex;
   		justify-content: center;
   		align-items: center;
   		min-height: 100vh;
   		font-family: 'Jost', sans-serif;
   		background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
   	}
   	.form-container {
   		width: 350px;
   		height: 500px;
   		background: red;
   		overflow: hidden;
   		background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
   		border-radius: 10px;
   		box-shadow: 5px 20px 50px #000;
   	}
   	.message {
   		color: #fff;
   		text-align: center;
   		margin-top: 10px;
   	}
   	.box {
   		width: 60%;
   		height: 20px;
   		background: #e0dede;
   		justify-content: center;
   		display: flex;
   		margin: 20px auto;
   		padding: 10px;
   		border: none;
   		outline: none;
   		border-radius: 5px;
   	}
   	.btn {
   		width: 60%;
   		height: 40px;
   		margin: 10px auto;
   		justify-content: center;
   		display: block;
   		color: #fff;
   		background: #573b8a;
   		font-size: 1em;
   		font-weight: bold;
   		margin-top: 20px;
   		outline: none;
   		border: none;
   		border-radius: 5px;
   		transition: .2s ease-in;
   		cursor: pointer;
   	}
   	.btn:hover {
   		background: #6d44b8;
   	}
   	p {
   		color: #fff;
   		text-align: center;
   		margin-top: 10px;
   	}
   	a {
   		color: #fff;
   		text-decoration: underline;
   	}
   </style>
</head>
<body>
   
<div class="main">  	
	<input type="checkbox" id="chk" aria-hidden="true">

	<div class="form-container">

	   <form action="" method="post" enctype="multipart/form-data">
      <h3 style="color: white; text-align: center; font-size:larger;">Login</h3>
	      <?php
	      if(isset($message)){
	         foreach($message as $message){
	            echo '<div class="message">'.$message.'</div>';
	         }
	      }
	      ?>
	      <input type="email" name="email" placeholder="Enter email" class="box" required>
	      <input type="password" name="password" placeholder="Enter password" class="box" required>
	      <input type="submit" name="submit" value="Login" class="btn">
         <br>
	      <p>Don't have an account? <a href="register.php">Regiser now</a></p>
	   </form>

	</div>

</div>

</body>
</html>
