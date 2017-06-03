<?php
include("dbconnect.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

   
$sql_kids = "SELECT * FROM KIDS_USERS WHERE Username = '$email' and Pass = '$pass'"; 
$sql_parents = "SELECT * FROM PARENTS_USERS WHERE Username = '$email' and Pass = '$pass'"; 
$sql_admin = "SELECT * FROM ADMIN_USERS WHERE Username = '$email' and Pass = '$pass'"; 
 
$stic = oci_parse($conn, $sql_kids);
$stip = oci_parse($conn, $sql_parents);
$stia = oci_parse($conn, $sql_admin);
    
oci_execute($stic);
oci_execute($stip);
oci_execute($stia);

    
$answer = $_POST['userType'];
    
    if($answer == "child"){
     if (ociFetch($stic)){
    $uname_c =  ociresult($stic, "USERNAME");
    $pass_c =  ociresult($stic, "PASS");
    
    if($_POST['pass'] = $pass_c){
     header("Location: kids-user-first-page.html");
      
    }
        
}
    else {  echo "<script type='text/javascript'>alert('Failed! Please verify your email and password')</script>";}
    }
    
 else {
     
     if($answer == "parent"){
          if (ociFetch($stip)){
 $uname_p =  ociresult($stip, "USERNAME");
 $pass_p =  ociresult($stip, "PASS");
   
     if( $_POST['pass'] = $pass_p){
 header("Location: kids-user-first-page.html");
    
  }
    
}
          else{
          echo "<script type='text/javascript'>alert('Failed! Please verify your email and password!')</script>";}
}
     else{
              if($answer == "admin"){
          if (ociFetch($stia)){
 $uname_a =  ociresult($stia, "USERNAME");
 $pass_a =  ociresult($stia, "PASS");
   
     if( $_POST['pass'] = $pass_a){
 header("Location: kids-user-first-page.html");
    
  }
   
}   else {  echo "<script type='text/javascript'>alert('Failed! Please verify your email and password!')</script>";}
                  
              }
}
         
     }
     
     
     
     
 }

       
?>
  
  
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
</head>
<body>
 
<div class = "wrapper">

 <form method="post" action="/TW-SGBD/pageLoginProcess">
  
  
  <div class="container">
  <div class="imgcontainer">
    <img src="http://www.free-for-kids.com/welcome-directory-of-kids-quizzes.jpg" alt="Avatar" class="avatar">
  </div>
  
  <div class = "datasPanel">
    <p><input type="text" placeholder="Enter Username" name="uname" > </p>
    <p><input type="password" placeholder="Enter Password" name="psw" ></p>
        
    <p><button  type="submit" name ="login">Login</button>
    <input type="checkbox" checked="checked"> Remember me</p>
    
  
    <div>
    <button  type="submit"  name ="signUp" >Sign Up</button>
    </div>
    </div>

    
    <div class ="userType">
    I am a 
     <p><input type="radio" name="userType" value="child" required> Child</p>
     <p><input type="radio" name="userType" value="parent" required> Parent</p>
    </div>
 
  </div>

 
 
</form>
</div>
</body>
</html>
