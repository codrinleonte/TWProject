<?php 
  include("dbconnect.php");
session_start();

if(!isset($_SESSION['login'])){
     header("Location: 404.php");
}
    if(isset($_POST['change'])){
        $current_pass =$_POST['oldPass'];
        $new_pass = $_POST['newPass'];
        $repete_pass = $_POST['newPassRetyped'];
        
        $spass = oci_parse($conn, "select PASS from ADMIN_USERS WHERE FIRST_NAME = 'RALUCA'");
        oci_execute($spass);
        
        if(ociFetch($spass)){
            $pass = ociresult($spass, 1);
            
            if($pass==$current_pass)
            {
                if($new_pass = $repete_pass)
                {
                $update = oci_parse($conn, "UPDATE ADMIN_USERS SET PASS = '$new_pass' where FIRST_NAME = 'RALUCA' ");
                     oci_execute($update,OCI_COMMIT_ON_SUCCESS);
                          oci_commit($conn); 
                    echo "<script type='text/javascript'>alert('Your password is changed!');location.href= 'notification.php'</script>";
                }
            
                else
                {echo "<script type='text/javascript'>alert('Please type the same new password')</script>";}
        }
            else{echo "<script type='text/javascript'>alert('Failed! That is not your current password')</script>";}
        }
        else
        {echo "<script type='text/javascript'>alert('Failed!')'</script>";}
        
        
        
    }


?>

<html>
<head>
      <link rel="stylesheet" type="text/css" href="/tw/public/css/change_password.css">
     
   
</head>


<body>

   


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
        <div class = "wrapper">
            <div class="container_chpw">
              <form  method="post">
    <h3>Change Password</h3>
    <fieldset>
      <label for="current_pw">Current password</label>
      <input name = "oldPass" type="password" tabindex="1" id="current_pw" required autofocus>
    </fieldset>
    <fieldset>
      <label for="new_pw">New password</label>
      <input name = "newPass" type="password" id="new_pw" tabindex="2" required>
    </fieldset>
    <fieldset>
      <label for="retype_pw">Retype password</label>
      <input name = "newPassRetyped" type="password" id="retype_pw" tabindex="3" required>
    </fieldset>
    <fieldset>
      <button name="change" type="submit" id="contact-submit" >Change password</button>
    </fieldset>
  </form>
            </div>

           
         </div>






  
  <div class= "bottom-second-bar">
      <br><label class = "bottom-second-bar-label">2017 ©Codrin's Leonte team | All Rights Reserved.</label>
  </div>

 </div>


</body>
</html>