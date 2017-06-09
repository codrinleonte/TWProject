<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../css/statistics.css">
	<script src="../javascript/functii.js"></script>
	
</head>

<body> 

	<div class = "pageWrap">
	<div class = "top-nav">
	<div class = "top-logo"></div>
	<div class = "settingsBut">
		<button class="dropbtn"></buton>
		<div class = "settings-content">
			<a href = "#">Change password</a><br>
			<a href = "#">Logout</a>
		</div>
	</div>
	<a href = "statistics.php">Statistics</a>
	<a href = "add-test.php">Add new test</a>
	<a href = "notification.php">Notification</a>
	<a href = "admin-first-page.html">Home</a>
	
</div>
</div>
 
    <div class="wrapper">
     
		    <span class="t1">See what's going on!</span><br>
                   <div class="butoane">
                       
					<button class="scores" type="submit" name= "scores" onclick="ShowScores()">Scores</button>
					<button class="scores" type="submit" name"kids" onclick="ShowKids()">Kids List</button>
					<button class="scores" type="submit" name="parents" onclick="ShowParents()">Parents List</button>
					<button class="scores" type="submit" name="distribution" onclick="Distribution()">Test's Distribution</button>
					
				</div>
            <?php
             include("dbconnect.php");
              
                  $sql_s= oci_parse($conn, "select * from (select * from scores) where rownum <10 ");
                  oci_execute($sql_s);
              
            
            ?>
				<div id="getScores" style="display:none;" class="table-content">
                       <table>
                        <tr>
                          <th>Name</th>
                          <th>Domain</th>
                          <th>Score</th>
                        </tr>
                           <?php while(ociFetch($sql_s)):
                             $kid_id = ociresult($sql_s, 3);
                             $test_id = ociresult($sql_s, 2);
                  
                            $sql_k = oci_parse($conn,"select * from kids_users where kid_user_id ='$kid_id' ");
                            oci_execute($sql_k);
                            $name = ociresult($sql_k,3);
                  
                            $sql_d = oci_parse($conn, "select domains.domain, scores.score from scores join proposed_tests on scores.test_id = proposed_tests.test_id join domains on proposed_tests.domain_id = domains.domain_id where proposed_tests.test_id = '$test_id'");
                            oci_execute($sql_d);
                            $domain = ociresult($sql_d,1);
                            $score = ociresult($sql_d,2);
                  
                           
                           ?>
                  
                        <tr>
                          <td><?php echo $name?></td>
                          <td><?php echo $domain?></td>
                          <td><?php echo $score?></td>
                        </tr>
                         <?php endwhile   ?>
                      </table>
                    
      			</div>
        <?php 
            $sql_kid = oci_parse($conn,"select * from (select * from kids_users where active=1) where rownum <10");
            oci_execute($sql_kid);
                              
                              
        ?>
				<div id="getKids" style="display:none;" class="table-content">
				<table>
                        <tr>
                          <th>Name</th>
                          <th>Do you want to delete this user?</th>
                          
                        </tr>
                    <?php while(ociFetch($sql_kid)):
                
                    $kid_name = ociresult($sql_kid, 5)." ".ociresult($sql_kid, 6);
                    $kid_id = ociresult($sql_kid,1);
                    ?>
                        <tr>
                          <td><?php echo $kid_name ?></td>
                             <form  method="post">
                          <td><button id = "btn"  name="<?php echo $kid_id?>" type = "submit" class="button" onclick="window.location.reload(true)" ><span>Delete </span></button></td>
                            </form>
                        </tr>
                         <?php 
                    if(isset($_POST[$kid_id]))
                    {
                        $delete_k = oci_parse($conn,"UPDATE KIDS_USERS SET ACTIVE=0 WHERE KID_USER_ID= '$kid_id'");
                       oci_execute($delete_k,OCI_COMMIT_ON_SUCCESS);
                          oci_commit($conn); 
                    
                          echo '
                        <script type="text/javascript">
                        location.reload();
                        </script>';
                        
                    }
                              endwhile;
                               
                              
                    
                    ?>
                      </table>
				</div>
        <?php 
            $sql_par = oci_parse($conn,"select * from (select * from parents_users where active=1) where rownum <10");
            oci_execute($sql_par);
                              
                              
        ?>
				<div id="getParents" style="display:none;" class="table-content">
				<table>
                        <tr>
                          <th>Name</th>
                          <th>Do you want to delete this parent?</th>
                          
                         <?php while(ociFetch($sql_par)):
                    $parent_name = ociresult($sql_par, 4)." ".ociresult($sql_par, 5);
                    $parent_id = ociresult($sql_par,1);
                    ?>
                        <tr>
                          <td><?php echo $parent_name ?></td>
                             <form  method="post">
                          <td><button id = "btn"  name="<?php echo $parent_id?>" type = "submit" class="button"  ><span>Delete </span></button></td>
                            </form>
                        </tr>
                          <?php 
                    if(isset($_POST[$parent_id]))
                    {
                        $delete_p = oci_parse($conn,"UPDATE PARENTS_USERS SET ACTIVE=0 WHERE PARENT_USER_ID= '$parent_id'");
                       oci_execute($delete_p,OCI_COMMIT_ON_SUCCESS);
                          oci_commit($conn); 
                        echo '
                        <script type="text/javascript">
                        location.reload();
                        </script>';
                    
        
                        
                    }
                              endwhile;
                               
                              
                    
                    ?>
                      </table>
				</div>

				   
                   	<div id="getDis" style="display:none;">
           
					<div class="firsthalf">
                            <?php
        $sql_dis = oci_parse($conn, "select * from DISTRIBUTIE_MATERII");
        oci_execute($sql_dis);
        while(ociFetch($sql_dis)):
        $domain = ociresult($sql_dis,1)." ".ociresult($sql_dis,2);
        $procent = ociresult($sql_dis,3);
        ?>
                  <div class="container a">
                   
                    <div class="hrd">
					
                       <div class="t mhard h"><?php echo $procent?></div>
                    </div>
                    
                    
                    <div class="name"><?php echo $domain?></div>
                  </div>
				  <br>
 
                  <?php  endwhile; ?> 

                </div>
                        
				</div>
       
        
        
    </div>
				  
				   
		 
		 
				  <div class= "bottom-second-bar">
      <br><label class = "bottom-label">2017 ©Codrin's Leonte team | All Rights Reserved.</label>
  </div>
              

</body>
</html>