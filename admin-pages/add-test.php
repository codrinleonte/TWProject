<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../javascript/formular.js"></script>

</head>

<body>
    
 <div class="wrapper">
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
	<a href = "statistics.html">Statistics</a>
	<a href = "add-test.html">Add new test</a>
	<a href = "notification.php">Notification</a>
	<a href = "admin-first-page.html">Home</a>
	
</div>
</div>
  

<div class ="container"><form method="post">
        <div class ="domain" id="grad1">
        
            <?php
    include("dbconnect.php");
        
            
        
         
            if(isset($_POST['send'])){
                 $question1 = $_POST['question1'];
                 $question2 = $_POST['question2'];
                 $question3 = $_POST['question3'];
                 $question4 = $_POST['question4'];
                 $question5 = $_POST['question5'];
                 $question6 = $_POST['question6'];
                 $question7 = $_POST['question7'];
                $sql_t = oci_parse($conn,"select * from (select * from proposed_tests order by test_id desc) where rownum =1");
                oci_execute($sql_t);
                if(ociFetch($sql_t)){
                    $result = ociresult($sql_t, "TEST_ID");
                    $test_id = ($result +1);
                    
                }
                
                $sql_q = oci_parse($conn, "select * from (select * from QUESTIONS_JFK order by question_id desc) where rownum =1");
                 oci_execute($sql_q);
                    if(ociFetch($sql_q)){
                        
                        $q_id = ociresult($sql_q,"QUESTION_ID");
                        $question_id1 = ($q_id+1);
                         $question_id2 =($q_id+2);
                         $question_id3 = ($q_id+3);
                         $question_id4 = ($q_id+4);
                         $question_id5 = ($q_id+5);
                         $question_id6 = ($q_id+6);
                         $question_id7 = ($q_id+7);
                    }
                
                   
                $sql_a = oci_parse($conn, "select * from (select * from ANSWERS_JFK order by answer_id desc) where rownum =1");
                 oci_execute($sql_a);
                    if(ociFetch($sql_a)){
                        
                        $a_id = ociresult($sql_a,"ANSWER_ID");
                        $answer_id1 = ($a_id+1);
                         $answer_id2 =($a_id+2);
                         $answer_id3 = ($a_id+3);
                         $answer_id4 = ($a_id+4);
                         $answer_id5 = ($a_id+5);
                         $answer_id6 = ($a_id+6);
                         $answer_id7 = ($a_id+7);
                    }
            
                $proposer_id = 200;
                $active = 1;
                $domain_id = 100;
                $solved = 0;
                $exist = 1;
                
                $sqt = oci_parse($conn, "INSERT INTO PROPOSED_TESTS(TEST_ID, PROPOSER_ID, DOMAIN_ID, ACTIVE) VALUES (:mtest_id, :mproposer_id, :mdomain_id, :mactive)");
                oci_bind_by_name($sqt, ':mtest_id',$test_id);
                oci_bind_by_name($sqt, ':mproposer_id',$proposer_id);
                oci_bind_by_name($sqt, ':mdomain_id',$domain_id);
                oci_bind_by_name($sqt, ':mactive',$active);
                    oci_execute($sqt);
                
            $sql1 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql1, ':mquestion_id', $question_id1);
            oci_bind_by_name($sql1, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql1, ':mtest_id', $test_id);
            oci_bind_by_name($sql1, ':mquestion', $question1);
            oci_bind_by_name($sql1, ':msolved', $solved);
            oci_bind_by_name($sql1, ':mexist', $exist);
         oci_execute($sql1);
            
            
             $sql2 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql2, ':mquestion_id', $question_id2);
            oci_bind_by_name($sql2, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql2, ':mtest_id', $test_id);
            oci_bind_by_name($sql2, ':mquestion', $question2);
            oci_bind_by_name($sql2, ':msolved', $solved);
            oci_bind_by_name($sql2, ':mexist', $exist);
         oci_execute($sql2);
            
            
             $sql3 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql3, ':mquestion_id', $question_id3);
            oci_bind_by_name($sql3, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql3, ':mtest_id', $test_id);
            oci_bind_by_name($sql3, ':mquestion', $question3);
            oci_bind_by_name($sql3, ':msolved', $solved);
            oci_bind_by_name($sql3, ':mexist', $exist);
         oci_execute($sql3);
            
            
             $sql4 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql4, ':mquestion_id', $question_id4);
            oci_bind_by_name($sql4, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql4, ':mtest_id', $test_id);
            oci_bind_by_name($sql4, ':mquestion', $question4);
            oci_bind_by_name($sql4, ':msolved', $solved);
            oci_bind_by_name($sql4, ':mexist', $exist);
         oci_execute($sql4);
            
            
             $sql5 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql5, ':mquestion_id', $question_id5);
            oci_bind_by_name($sql5, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql5, ':mtest_id', $test_id);
            oci_bind_by_name($sql5, ':mquestion', $question5);
            oci_bind_by_name($sql5, ':msolved', $solved);
            oci_bind_by_name($sql5, ':mexist', $exist);
         oci_execute($sql5);
            
        
             $sql6 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql6, ':mquestion_id', $question_id6);
            oci_bind_by_name($sql6, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql6, ':mtest_id', $test_id);
            oci_bind_by_name($sql6, ':mquestion', $question6);
            oci_bind_by_name($sql6, ':msolved', $solved);
            oci_bind_by_name($sql6, ':mexist', $exist);
         oci_execute($sql6);
            
            
             $sql7 = oci_parse($conn, ' INSERT INTO QUESTIONS_JFK(QUESTION_ID, DOMAIN_ID, TEST_ID, QUESTION, SOLVED, EXIST) values (:mquestion_id, :mdomain_id, :mtest_id, :mquestion, :msolved, :mexist) ' );
            oci_bind_by_name($sql7, ':mquestion_id', $question_id7);
            oci_bind_by_name($sql7, ':mdomain_id', $domain_id);
            oci_bind_by_name($sql7, ':mtest_id', $test_id);
            oci_bind_by_name($sql7, ':mquestion', $question7);
            oci_bind_by_name($sql7, ':msolved', $solved);
            oci_bind_by_name($sql7, ':mexist', $exist);
         oci_execute($sql7);
                
            $sqa1 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa1, ':manswer_id',$answer_id1);
                  oci_bind_by_name($sqa1, ':mquestion_id', $question_id1);
                  oci_bind_by_name($sqa1, ':mcorect_answer',$_POST['corect1']);
                  oci_bind_by_name($sqa1, ':mwrong_answer_1',$_POST['wrong11']);
                    oci_bind_by_name($sqa1, ':mwrong_answer_2',$_POST['wrong12']);
                    oci_bind_by_name($sqa1, ':mwrong_answer_3',$_POST['wrong13']);
                    oci_bind_by_name($sqa1, ':mexist',$exist);
                oci_execute($sqa1);
                
                
                $sqa2 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa2, ':manswer_id',$answer_id2);
                  oci_bind_by_name($sqa2, ':mquestion_id', $question_id2);
                  oci_bind_by_name($sqa2, ':mcorect_answer',$_POST['corect2']);
                  oci_bind_by_name($sqa2, ':mwrong_answer_1',$_POST['wrong21']);
                    oci_bind_by_name($sqa2, ':mwrong_answer_2',$_POST['wrong22']);
                    oci_bind_by_name($sqa2, ':mwrong_answer_3',$_POST['wrong23']);
                    oci_bind_by_name($sqa2, ':mexist',$exist);
                oci_execute($sqa2);
                
                
                $sqa3 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa3, ':manswer_id',$answer_id3);
                  oci_bind_by_name($sqa3, ':mquestion_id', $question_id3);
                  oci_bind_by_name($sqa3, ':mcorect_answer',$_POST['corect3']);
                  oci_bind_by_name($sqa3, ':mwrong_answer_1',$_POST['wrong31']);
                    oci_bind_by_name($sqa3, ':mwrong_answer_2',$_POST['wrong32']);
                    oci_bind_by_name($sqa3, ':mwrong_answer_3',$_POST['wrong33']);
                    oci_bind_by_name($sqa3, ':mexist',$exist);
                oci_execute($sqa3);
                
                
                $sqa4 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa4, ':manswer_id',$answer_id4);
                  oci_bind_by_name($sqa4, ':mquestion_id', $question_id4);
                  oci_bind_by_name($sqa4, ':mcorect_answer',$_POST['corect4']);
                  oci_bind_by_name($sqa4, ':mwrong_answer_1',$_POST['wrong41']);
                    oci_bind_by_name($sqa4, ':mwrong_answer_2',$_POST['wrong42']);
                    oci_bind_by_name($sqa4, ':mwrong_answer_3',$_POST['wrong43']);
                    oci_bind_by_name($sqa4, ':mexist',$exist);
                oci_execute($sqa4);
                
                
                $sqa5 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa5, ':manswer_id',$answer_id5);
                  oci_bind_by_name($sqa5, ':mquestion_id', $question_id5);
                  oci_bind_by_name($sqa5, ':mcorect_answer',$_POST['corect5']);
                  oci_bind_by_name($sqa5, ':mwrong_answer_1',$_POST['wrong51']);
                    oci_bind_by_name($sqa5, ':mwrong_answer_2',$_POST['wrong52']);
                    oci_bind_by_name($sqa5, ':mwrong_answer_3',$_POST['wrong53']);
                    oci_bind_by_name($sqa5, ':mexist',$exist);
                oci_execute($sqa5);
                
                
                $sqa6 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa6, ':manswer_id',$answer_id6);
                  oci_bind_by_name($sqa6, ':mquestion_id', $question_id6);
                  oci_bind_by_name($sqa6, ':mcorect_answer',$_POST['corect6']);
                  oci_bind_by_name($sqa6, ':mwrong_answer_1',$_POST['wrong61']);
                    oci_bind_by_name($sqa6, ':mwrong_answer_2',$_POST['wrong62']);
                    oci_bind_by_name($sqa6, ':mwrong_answer_3',$_POST['wrong63']);
                    oci_bind_by_name($sqa6, ':mexist',$exist);
                oci_execute($sqa6);
                
                
                $sqa7 = oci_parse($conn, ' INSERT INTO ANSWERS_JFK(ANSWER_ID, QUESTION_ID, CORECT_ANSWER, WRONG_ANSWER_1, WRONG_ANSWER_2, WRONG_ANSWER_3, EXIST) VALUES(:manswer_id, :mquestion_id, :mcorect_answer, :mwrong_answer_1, :mwrong_answer_2, :mwrong_answer_3, :mexist)');
                oci_bind_by_name($sqa7, ':manswer_id',$answer_id7);
                  oci_bind_by_name($sqa7, ':mquestion_id', $question_id7);
                  oci_bind_by_name($sqa7, ':mcorect_answer',$_POST['corect7']);
                  oci_bind_by_name($sqa7, ':mwrong_answer_1',$_POST['wrong71']);
                    oci_bind_by_name($sqa7, ':mwrong_answer_2',$_POST['wrong72']);
                    oci_bind_by_name($sqa7, ':mwrong_answer_3',$_POST['wrong73']);
                    oci_bind_by_name($sqa7, ':mexist',$exist);
                oci_execute($sqa7);
                
                 header("Location: add-test.php");
                
                
                
            }
          
    
    ?> 
          <h3>Choose domain</h3>
         <p><input type="checkbox" name="domain[]" value="math" ><b>Math</b></p>
         <p><input type="checkbox" name="domain[]" value="biology" ><b> Biology</b></p>
         <p><input type="checkbox" name="domain[]" value="geography" ><b> Geography</b></p>
         <p><input type="checkbox" name="domain[]" value="history" ><b> History</b></p>
         <p><input type="checkbox" name="domain[]" value="english" ><b> English</b></p>
            <br><br>
         <h3>Choose difficulty</h3>
         <p><input type="checkbox" name="domain[]" value="easy" ><b>EASY</b></p>
         <p><input type="checkbox" name="domain[]" value="normal" ><b> NORMAL</b></p>
         <p><input type="checkbox" name="domain[]" value="hard" ><b> HARD</b></p>
        
        
    </div>
    
         
        <div class = "formular" >
             
            <div class ="question">
                
                <textarea maxlength="400"  name="question1" placeholder="Enter the first question..." required></textarea>
            </div>
            <div class = "answer" >    
                <textarea maxlength="50" name="corect1" placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50" name="wrong11" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50" name="wrong12" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50" name="wrong13"  placeholder="Enter a wrong answer..." required></textarea>
            </div>
            <div class="save">
                <button class="saves" type="submit" name ="save1" onclick="showDiv('q1')">Save</button>
                
            </div>
			</div>
			<div class = "formular1"   id="q1" >

            <div class ="question">
                <textarea maxlength="400" name="question2" placeholder="Enter the second question..." required></textarea>
            </div>
            <div class = "answer">    
                <textarea maxlength="50" name="corect2"  placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50" name="wrong21"  placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50" name="wrong22" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50" name="wrong23" placeholder="Enter a wrong answer..." required></textarea>
            </div>

            <div class="save">
                <button class="saves" type="submit" name ="save2" onclick="showDiv('q2')">Save</button>
            </div>
        </div> 
         <div class = "formular1" id="q2">

           <div class ="question">
                <textarea maxlength="400" name="question3" placeholder="Enter the third question..." required></textarea>
            </div>
            <div class = "answer">    
                <textarea maxlength="50" name="corect3"  placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50" name="wrong31" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50" name="wrong32" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50" name="wrong33"  placeholder="Enter a wrong answer..." required></textarea>
            </div>
            <div class="save">
                <button class="saves" type="submit" name ="save3" onclick="showDiv('q3')">Save</button>
            </div>            
        </div> 
         <div class = "formular1" id="q3">

            <div class ="question">
                <textarea maxlength="400" name="question4" placeholder="Enter the fourth question..."></textarea>
            </div>
            <div class = "answer">    
                <textarea maxlength="50" name="corect4"  placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50"  name="wrong42"  placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong42"  placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong43" placeholder="Enter a wrong answer..." required></textarea>
            </div>
            <div class="save">
                <button class="saves" type="submit" name ="save4" onclick="showDiv('q4')">Save</button>
            </div>
            
        </div> 
         <div class = "formular1" id="q4">

            <div class ="question">
                <textarea maxlength="400" name="question5" placeholder="Enter the fifth question..." required></textarea>
            </div>
            <div class = "answer">    
                <textarea maxlength="50" name="corect5"  placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50"  name="wrong51" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong52" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong53" placeholder="Enter a wrong answer..." required></textarea>
            </div>
            <div class="save">
                <button class="saves" type="submit" name ="save5" onclick="showDiv('q5')">Save</button>
            </div>
            
        </div> 
         <div class = "formular1" id="q5">

           <div class ="question">
                <textarea maxlength="400" name="question6" placeholder="Enter the sixth question..." required></textarea>
            </div>
            <div class = "answer">    
                <textarea maxlength="50" name="corect6"  placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50"  name="wrong61" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong62" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong63"  placeholder="Enter a wrong answer..." required></textarea>
            </div>
            <div class="save">
                <button class="saves" type="submit" name ="save6" onclick="showDiv('q6')">Save</button>
            </div>
            
        </div>   
        <div class = "formular1" id="q6">

            <div class ="question">
                <textarea maxlength="400" name="question7" placeholder="Enter the seventh question..." required></textarea>
            </div>
            <div class = "answer">    
                <textarea maxlength="50" name="corect7"  placeholder="Enter the good answer..." required></textarea>
                <textarea maxlength="50"  name="wrong71" placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong72"  placeholder="Enter a wrong answer..." required></textarea>
                <textarea maxlength="50"  name="wrong73" placeholder="Enter a wrong answer..." required></textarea>
            </div>
             <div class="save">
                <button class="saves" >Save</button>
            </div>
            
        

        <button id = "btn"  name="send" type = "submit" class="button" style="vertical-align:middle"><span>Send </span></button>
            </form>
    </div>  
    </div>


	</div>
	
	
	
 
</body>
</html>