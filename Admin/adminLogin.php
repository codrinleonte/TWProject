<?php
include("dbconnect.php");
session_start(); session_destroy();
if(isset($_POST['login'])){
  
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $sql_admin = "SELECT USERNAME, PASS, ADMIN_USER_ID FROM ADMIN_USERS WHERE Username = '$email' and Pass = '$pass'"; 
    $stia = oci_parse($conn, $sql_admin);
    oci_execute($stia);
    
    if (ociFetch($stia))
    {
 $uname_a =  ociresult($stia, 1);
 $pass_a =  ociresult($stia, 2);
$id_a =  ociresult($stia, 2);
   
     if( $_POST['pass'] = $pass_a)
     {   session_start();
         $_SESSION['login']=$id_a; 
 header("Location: admin-first-page.php");
        
    }
        else{
             echo "<script type='text/javascript'>alert('Failed! Please verify your  password!')</script>";}
            
    }   
    
}
?>



<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="/tw/public/css/loginA.css">
</head>
<body>
 
<div class = "wrapper">
 <form method="post">
  
  
  <div class="container">
  
  
  <div class = "datasPanel">
    <p><input type="text" placeholder="Enter Username" name="email" ></p>
    <p><input type="password" placeholder="Enter Password" name="pass" ></p>
        
    <p><button  type="submit" name ="login">Login</button>
    <input type="checkbox" checked="checked"> Remember me</p>
    
  
    
    </div>

    
      

 
 
</form>
</div>
</body>
</html>