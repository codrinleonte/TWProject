var questionCount = 0;


function showImageMed() {				/*functie care afiseaza imaginea in functie de dificultate si butonul de start */
  document.getElementById('imageMed').style.content = "url('../images/Sonic_sonicx.png')";
  document.getElementById('imageMed').style.display = "block";
  document.getElementById('StartBut').style.display = "block";
   
}

				/*functie care afiseaza imaginea in functie de dificultate si butonul de start */
function showImageEasy() {						
   document.getElementById('imageMed').style.content = "url('../images/yin_by_lucius4277-d53xsf1.png')";
   document.getElementById('imageMed').style.display = "block";
   document.getElementById('StartBut').style.display = "block";
}

			/*functie care afiseaza imaginea in functie de dificultate si butonul de start */
function showImageHard() {
   document.getElementById('imageMed').style.content = "url('../images/Johnny_Bravo.png')";
   document.getElementById('imageMed').style.display = "block";
   document.getElementById('StartBut').style.display = "block";
   
}
			/*functie care afiseaza formularul de selectie al dificultatii */
	
function hideDifficultyForm(){
	var difOption = document.getElementsByName("difficulty");
    for(var i=0;i<difOption.length;i++)
      difOption[i].checked = false;
   
    document.getElementById('StartBut').style.display = "none";
	document.getElementById('imageMed').style.display = "none";
}

function showDifficultyForm(){
	
	hideDifficultyForm();
	document.getElementById('difficultyForm').style.display = "block";
}

			/*functie care afiseaza urmatoarea intrebare imreuna cu raspunsurile */
function nextQuestion(){
	
	if(questionCount===7){
		document.getElementById('finishButton').style.display = "block";
		document.getElementById('nextButton').style.display = "none";
		exit();
}
	
	
	questionCount++;
	
	document.getElementById('quest').innerHTML = "Intrebare".concat(questionCount.toString());
	var r = document.getElementsByTagName("label")   

	r[0].innerHTML ="answerA".concat(questionCount.toString());
	r[1].innerHTML ="answerB".concat(questionCount.toString());
	r[2].innerHTML ="AnswerC".concat(questionCount.toString());
	r[3].innerHTML ="answerD".concat(questionCount.toString());
    
}
		/*functie care afiseaza fereastra de dupa terminarea unui test  */
function showScore(){
	var modal = document.getElementById('modalWindow');
	var span = document.getElementById("close");

	
    modal.style.display = "block";

span.onclick = function() {
    modal.style.display = "none";
}


}


function setCharacterImage(domain){
	var charImg = document.getElementById('characterImg');
	var question = document.getElementById('quest');

	if(domain == "math"){
		charImg.style.content = "url('../images/minion.png')";
		charImg.style.width="500px";
		charImg.style.height="600px";
		charImg.style.marginTop="30px";
		question.innerHTML = "Math tis sweet, pelo non sim sweet sim a banana! Yi kai yai yai! Luck ivy !";
		charImg.style.marginTop="80px";
	}
	else if(domain == "geography"){
		charImg.style.content = "url('../images/pirate.png')";
		charImg.style.width="500px";
		charImg.style.height="610px";
		charImg.style.marginTop="80px";
		charImg.style.marginLeft="5px";
		question.innerHTML = "Ahoy kid, i be Red Beard! I heard ye want some questions from a travaler, so here I be. Fair winds! ";
	}
	else if(domain == "biology"){
		charImg.style.content = "url('../images/jarjar.png')";
		charImg.style.width="450px";
		charImg.style.height="610px";
		charImg.style.marginTop="80px";
		charImg.style.marginLeft="50px";
		question.innerHTML = "Hi! Mesa name is Jar Jar Binks. Mesa wants for yousa to score many many points ! ";
	}
	else if(domain == "english"){
		charImg.style.content = "url('../images/fudd.png')";
		charImg.style.width="470px";
		charImg.style.height="610px";
		charImg.style.marginTop="80px";
		charImg.style.marginLeft="50px";
		question.innerHTML = "Wet's see how many wabbits you can catch, buddy   ";
		question.style.marginTop="130px";
	}
	else if(domain == "history"){
		charImg.style.content = "url('../images/yoda.png')";
		charImg.style.width  =  "500px";
		charImg.style.height = "600px";
		charImg.style.marginTop = "40px";
		question.innerHTML = "Hello ! Master Yoda, I am! See if you are as prepared as you think, let us, young padawan. Yes, hmmm. ";
	}
}

function setDomain(domain){
	 localStorage.setItem("domain", domain);
}

function getDomain(){
	return localStorage.getItem("domain");
}

function showTestForm() {
   document.getElementById("startTest").style.display="none";
   document.getElementById("answersForm").style.display="block";
   nextQuestion();
}