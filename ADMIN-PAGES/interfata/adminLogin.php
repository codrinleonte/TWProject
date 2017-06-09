
<?php
include("dbconnect.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $sql_admin = "SELECT * FROM ADMIN_USERS WHERE Username = '$email' and Pass = '$pass'"; 
    $stia = oci_parse($conn, $sql_admin);
    
    if (ociFetch($stia))
    {
 $uname_a =  ociresult($stia, "USERNAME");
 $pass_a =  ociresult($stia, "PASS");
   
     if( $_POST['pass'] = $pass_a)
     {
         $_SESSION['login']=$uname_a; 
 header("Location: admin-first-page.html");
        
    }
        else{
             echo "<script type='text/javascript'>alert('Failed! Please verify your  password!')</script>";}
            
    }
    
    
    
    
}




?>



<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/loginA.css">
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
