var questionCount = -1;
var score = 0;
var testId = 0;
function showImageMed() {                /*functie care afiseaza imaginea in functie de dificultate si butonul de start */
    document.getElementById('imageMed').style.content = "url('/tw/public/images/Sonic_sonicx.png')";
    document.getElementById('imageMed').style.display = "block";
    document.getElementById('StartBut').style.display = "block";

}

/*functie care afiseaza imaginea in functie de dificultate si butonul de start */
function showImageEasy() {
    document.getElementById('imageMed').style.content = "url('/tw/public/images/yin_by_lucius4277-d53xsf1.png')";
    document.getElementById('imageMed').style.display = "block";
    document.getElementById('StartBut').style.display = "block";
}

/*functie care afiseaza imaginea in functie de dificultate si butonul de start */
function showImageHard() {
    document.getElementById('imageMed').style.content = "url('/tw/public/images/Johnny_Bravo.png')";
    document.getElementById('imageMed').style.display = "block";
    document.getElementById('StartBut').style.display = "block";

}
/*functie care afiseaza formularul de selectie al dificultatii */

function hideDifficultyForm() {
    var difOption = document.getElementsByName("difficulty");
    for (var i = 0; i < difOption.length; i++)
        difOption[i].checked = false;

    document.getElementById('StartBut').style.display = "none";
    document.getElementById('imageMed').style.display = "none";
}

function showDifficultyForm() {

    hideDifficultyForm();
    document.getElementById('difficultyForm').style.display = "block";
}

/*functie care afiseaza urmatoarea intrebare imreuna cu raspunsurile */
function nextQuestion() {

    console.log(questionCount);
    if (questionCount === 5) {
        document.getElementById('finishButton').style.display = "block";
        document.getElementById('nextButton').style.display = "none";
        return;
    }
    if(validateForm() ){
        if(questionCount != -1){
            validateAnswer();
        }
        questionCount++;
        populateContainers(testData[questionCount])
    }
    

}
/*functie care afiseaza fereastra de dupa terminarea unui test  */
function showScore() {
    var modal = document.getElementById('modalWindow');
    var span = document.getElementById("close");
    var scoreContainer = document.getElementById("scoreContainer");
    scoreContainer.innerHTML = score;

    modal.style.display = "block";

    span.onclick = function () {
        modal.style.display = "none";
    }

    var http = new XMLHttpRequest();
    var url = "/tw/test/insert";
    var params = "score="+score+"&test="+testId;
    http.open("POST", url, true);

//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            alert(http.responseText);
        }
    }
    http.send(params);
}


function setCharacterImage(domain) {
    domain = domain.toLowerCase();
    var charImg = document.getElementById('characterImg');
    var question = document.getElementById('quest');

    if (domain == "math") {
        charImg.style.content = "url('/tw/public/images/minion.png')";
        charImg.style.width = "500px";
        charImg.style.height = "600px";
        charImg.style.marginTop = "30px";
        question.innerHTML = "Math tis sweet, pelo non sim sweet sim a banana! Yi kai yai yai! Luck ivy !";
        charImg.style.marginTop = "80px";
    }
    else if (domain == "geography") {
        charImg.style.content = "url('/tw/public/images/pirate.png')";
        charImg.style.width = "500px";
        charImg.style.height = "610px";
        charImg.style.marginTop = "80px";
        charImg.style.marginLeft = "5px";
        question.innerHTML = "Ahoy kid, i be Red Beard! I heard ye want some questions from a travaler, so here I be. Fair winds! ";
    }
    else if (domain == "biology") {
        charImg.style.content = "url('/tw/public/images/jarjar.png')";
        charImg.style.width = "450px";
        charImg.style.height = "610px";
        charImg.style.marginTop = "80px";
        charImg.style.marginLeft = "50px";
        question.innerHTML = "Hi! Mesa name is Jar Jar Binks. Mesa wants for yousa to score many many points ! ";
    }
    else if (domain == "english") {
        charImg.style.content = "url('/tw/public/images/fudd.png')";
        charImg.style.width = "470px";
        charImg.style.height = "610px";
        charImg.style.marginTop = "80px";
        charImg.style.marginLeft = "50px";
        question.innerHTML = "Wet's see how many wabbits you can catch, buddy   ";
        question.style.marginTop = "130px";
    }
    else if (domain == "history") {
        charImg.style.content = "url('/tw/public/images/yoda.png')";
        charImg.style.width = "500px";
        charImg.style.height = "600px";
        charImg.style.marginTop = "40px";
        question.innerHTML = "Hello ! Master Yoda, I am! See if you are as prepared as you think, let us, young padawan. Yes, hmmm. ";
    }
}

function setDomain(domain) {
    setDomainInputValue(domain);
    localStorage.setItem("domain", domain);
}

function getDifficulty() {
    return localStorage.getItem("domain");
}

function setDifficulty(difficulty) {
    localStorage.setItem("difficulty", difficulty);
}


function getDomain() {
    return localStorage.getItem("domain");
}

function showTestForm() {
    document.getElementById("startTest").style.display = "none";
    document.getElementById("answersForm").style.display = "flex";
    nextQuestion();
}

function setDomainInputValue(domain) {
    document.getElementById('domainInput').value = domain;
}

function populateContainers(questionData){
    questionContainer.innerHTML = questionData.question;
    answerA.innerHTML = questionData.answers[0];
    answerB.innerHTML = questionData.answers[1];
    answerC.innerHTML = questionData.answers[2];
    answerD.innerHTML = questionData.answers[3];
}

function formatTestData(testData) {
    var result = [];
    var obj = {};
    for(var i=0; i<testData.length; i++){
        obj = {};
        obj.question = testData[i].QUESTION;
        obj.answers = [testData[i].CORECT_ANSWER, testData[i].WRONG_ANSWER_1,testData[i].WRONG_ANSWER_2, testData[i].WRONG_ANSWER_3];
        shuffle(obj.answers);

        for(var j=0; j<4; j++){
            if(obj.answers[j] == testData[i].CORECT_ANSWER){
                obj.correctAnswer = j+1;
                break;
            }
        }
        result.push(obj);
    }
    return result;
}

function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}

function validateForm() {
    var val = document.querySelector('input[name="answer"]:checked').value;
    return !(val >= 5 || val <= 0);

}

function validateAnswer(){

    var isCorrect = testData[questionCount].correctAnswer == document.querySelector('input[name="answer"]:checked').value;
    if(isCorrect){
        score += 10;
    }
}