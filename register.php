<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

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
   		height: 600px;
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
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3 style="color: white; text-align: center;">Register</h3>
   
<?php
include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exists';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password does not match!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form` (name, email, password, image) VALUES ('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location:login.php');
            exit;
         }else{
            $message[] = 'registration failed!';
         }
      }
   }
}
?>

      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register" class="btn">
      <br>
      <p>Already have an account? <a href="login.php">Login</a></p>
   </form>

</div>

</body>
</html>
