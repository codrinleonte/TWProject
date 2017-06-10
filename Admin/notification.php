<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="/tw/public/css/style.css">
</head>

<body> 
    <?php
   session_start();

      if(!isset($_SESSION['login'])){
     header("Location: 404.php");
}
   
    include("dbconnect.php");
    $sql = "select parents_users.username, domains.domain, domains.difficulty, proposed_tests.test_id from parents_users join proposed_tests  on parents_users.parent_user_id= proposed_tests.proposer_id join domains  on domains.domain_id = proposed_tests.domain_id where proposed_tests.active = 0 ";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    ?>

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
	
  <center><span class="t2">Tests Requests</span></center>
   <div class="tab-content">
  <div class="tab-pane active" id="inbox">
      
      <div class="container">
           <div class="content-container clearfix">
               <div class="col-md-12">
                   
                   <ul class="mail-list">
                       <?php  while(ociFetch($stid)) : 
                       $id = ociresult($stid, 4);
                       
                       $questions = "select * from QUESTIONS_JFK WHERE TEST_ID = '$id'";
                        $stiq = oci_parse($conn, $questions);
                        oci_execute($stiq);
                        ?>
                        <li>
                           <a href="#<?php echo $id;?> " >
                               <span class="mail-sender"><?php echo ociresult($stid, 1)?></span>
                               <span class="mail-subject"><?php echo ociresult($stid, 2)?></span>
                               <span class="mail-message-preview"><?php echo ociresult($stid, 3)?></span>
                           </a>
                       </li>
     <div id="<?php echo $id ?>" class="overlay">
         <form  method="post">
	<div class="popup">
	<h2> Proposed Test</h2>
	<a class="close" href="#">X</a>
	<div class="content">
        <?php  while(ociFetch($stiq)) : ?>
	 <p><?php echo ociresult($stiq, "QUESTION")?></p>
        <?php $q_id = ociresult($stiq, "QUESTION_ID");
         $answers = "select * from ANSWERS_JFK WHERE QUESTION_ID = '$q_id'";
          $stia = oci_parse($conn, $answers);
                        oci_execute($stia);
         ?>
         
	   <ul style="list-style-type:square">
             <?php  while(ociFetch($stia)) : ?>
		<li><font color="red"><?php echo ociresult($stia, "CORECT_ANSWER")?></font></li>
		<li><?php echo ociresult($stia, "WRONG_ANSWER_1")?></li>
		<li><?php echo ociresult($stia, "WRONG_ANSWER_2")?></li>
		<li><?php echo ociresult($stia, "WRONG_ANSWER_3")?></li>
	  </ul
	    <?php endwhile; endwhile?> 
           
	  
	  <br><br>
          
            <?php 
    if(isset($_POST[$id])) {
           $update = "update PROPOSED_TESTS set ACTIVE = 1 WHERE TEST_ID = '$id'";
    
           $stiu = oci_parse($conn, $update);
        
                        oci_execute($stiu,OCI_COMMIT_ON_SUCCESS);
        oci_commit($conn); 
       echo '
                        <script type="text/javascript">
                        location.reload();
                        </script>';
        
    
    }
            
     ?> 
        <button id = "btn"  name="<?php echo $id?>" type = "submit" class="button"  ><span>Add Test </span></button>
           </form>
	  
	  
	  
	 </div>
	 </div>
	 </div>
                      <?php endwhile  ?>           
                   </ul>
               </div>
           </div>
       </div>
      
  </div>
  </div>
 
	
</div>

 
 
</body>
</html>