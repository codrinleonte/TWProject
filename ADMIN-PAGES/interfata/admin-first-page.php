<?php 

session_start();

if(!isset($_SESSION['login'])){
     header("Location: 404.php");
}


?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body > 
 
	<div class = "pageWrap">
	<div class = "top-nav">
	<div class = "top-logo"></div>
	<div class = "settingsBut">
		<button class="dropbtn"></buton>
		<div class = "settings-content">
			<a href = "changePsw.php">Change password</a><br>
			<a href = "adminLogin.php"  >Logout</a>
		</div>
	</div>
	<a href = "statistics.php">Statistics</a>
	<a href = "add-test.php">Add new test</a>
	<a href = "notification.php">Notification</a>
	<a href = "admin-first-page.php">Home</a>
	
</div>
</div>
 <div class="wrapper">
   
  <center><span class="t1">Hello, Boss!<br> What are you up for today?</span></center>
   
</div>
<div class= "bottom-second-bar">
      <br><label class = "bottom-label">2017 ©Codrin's Leonte team | All Rights Reserved.</label>
  </div>
 
 
</body>
</html>