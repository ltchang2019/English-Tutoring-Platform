<!DOCTYPE html>

<?php session_start(); ?>

<html>
<title>English Program</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html{
  position: relative;
/*  overflow: hidden;
*/}
input[type=text] {
      width: 15%;
      position: absolute;
      left: 150px;
      max-width: 100%;
      height: 22px;
    }
input[type=password] {
      width: 15%;
      position: absolute;
      left: 150px;
//      margin-bottom: 200px;
   //   margin: 20px 0px 20px 0px;
      max-width: 100%;
      height: 22px;
    }
  /*input[type=submit]{
    height: 20px;
    text-align: center;
  }*/

    hr{
      margin-top: 5px; margin-bottom: 5px;
    }
    p{
      margin-top: 5px; margin-bottom: 5px;
    }
    h2{
      margin-top: 5px; margin-bottom: 5px;
    }
    h6{
      margin-top: 3px; margin-bottom: 2px;
    }

    .inputElement {
      margin: 3px 0px;
    }
.w3-third{
      height: 100%;
      float: left;
      resize: both;
}
.w3-twothird{
  height: 100%;
  float: right;
  resize: both;
}
.sendForm{
  resize: both;
}

#body{
  max-width: 100%;
}
#reportAreaContainer{
    height: 200px;
}
#reportArea{
  line-height: 1.5;
  width: 100%;
  margin-top: 20px;
  vertical-align: middle;
}

.democlass{
  color:red;
}

</style>

<script>

    function showAssignments(responseText) {
      document.getElementById("reportArea").innerHTML = responseText; 
    }

    function showQuestionsInBox(responseText){
      document.getElementById("questionArea").innerHTML = responseText; 
    }

    function httpGetAsync(theUrl, callbackWhenPageLoaded) { 
      var xmlHttp = new XMLHttpRequest();

      xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
          callbackWhenPageLoaded(xmlHttp.responseText);
      }
      xmlHttp.open("GET", theUrl, true); 
      xmlHttp.send(null);
      // resetFieldStyles();
    }

    function httpQuestionAsync(theUrl, callbackWhenPageLoaded) { 
      var xmlHttp = new XMLHttpRequest();

      xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
          callbackWhenPageLoaded(xmlHttp.responseText);
      }
      xmlHttp.open("GET", theUrl, true); 
      xmlHttp.send(null);
      // resetFieldStyles();
    }


    function httpDisplayAsync(theUrl, callbackWhenPageLoaded) { 
      var xmlHttp = new XMLHttpRequest();

      xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
          callbackWhenPageLoaded(xmlHttp.responseText);
      }
      xmlHttp.open("GET", theUrl, true); 
      xmlHttp.send(null);
      // resetFieldStyles();
    }

    function addFields(){
          var number = document.getElementById("numbQuestions").value;
          var container = document.getElementById("fieldContainer");
          while (container.hasChildNodes()) {
              container.removeChild(container.lastChild);
          }
          for (i=0;i<number;i++){
              container.appendChild(document.createTextNode("Question " + (i+1)));
               var input = document.createElement("input");
              input.type = "text";
              input.setAttribute("id", ("input" + i));
               container.appendChild(input);
              container.appendChild(document.createElement("br"));
              container.appendChild(document.createElement("br"));
            }
        }

        function submitQuestions(){
            url = "submitQuestions.php";
            var number = 1;
            if(number == 1){
              for (i=0;i<number;i++){
                var question1 = document.getElementById("input" + i);
                url += "?numbQuestions=" + number + "&question1=" + question1;
              }
            }
            else if(number == 2){
                i = 1
                var question1 = document.getElementById("input" + i);
                i = 2 
                var question2 = document.getElementById("input" + i);
          }
          else if(number == 3){
                i = 1
                var question1 = document.getElementById("input" + i);
                i = 2 
                var question2 = document.getElementById("input" + i);
                i = 3
                var question3 = document.getElementById("input" + i);
          }
          httpQuestionAsync(url, showTextInBox);
        }

    function showTextInBox(responseText){
      document.getElementById("bookArea").innerHTML = responseText; 
    }

    function adminShowText(){
      var url = "adminShowText.php"; 
      var textName = document.getElementById("textName").value;

      url += "?textName=" + textName;

      httpQuestionAsync(url, showTextInBox);
    }


    function adminShowAssignments() {
      
      var url = "adminShowAssignments.php"; 
      var username = "mmcgrath";
        
      httpGetAsync(url, showAssignments);
    }

    function SendMessage(){
      var url = "SendMessage.php"; 
      var toUsername = document.getElementById("toUsername").value;
      var fromUsername = document.getElementById("fromUsername").value;
      var subject = document.getElementById("subject").value;
      var body = document.getElementById("body").value;
      
      resetFieldStyles();

      var errorMessage = "Missing data: ";
      var somethingBlank = false;
      if(fromUsername == ""){
        errorMessage += "from";
        somethingBlank = true;
        document.getElementById("fromUsername").style.background = "yellow";
      }

      if(toUsername == "" && somethingBlank == true){
        errorMessage += ", to";
        document.getElementById("toUsername").style.background = "yellow";
      }
      else if(toUsername == ""){
        errorMessage += "to";
        somethingBlank = true;
        document.getElementById("toUsername").style.background = "yellow";
      }

      if(subject == "" && somethingBlank == true){
        errorMessage += ", subject";
        document.getElementById("subject").style.background = "yellow";
      }
      else if(subject == ""){
        errorMessage += "subject";
        somethingBlank = true;
        document.getElementById("subject").style.background = "yellow";
      }

      if(body == "" && somethingBlank == true){
        errorMessage += ", body";
        document.getElementById("body").style.background = "yellow";
      }
      else if(body == ""){
        errorMessage += "body";
        somethingBlank = true;
        document.getElementById("body").style.background = "yellow";
      }

      url += "?fromWho=" + fromUsername + "&toWhom=" + toUsername + "&subject=" + subject + "&body=" + body;

    
      if(errorMessage == "Missing data: ")
        httpGetAsync(url, showResults);
      else{
        alert(errorMessage);
        somethingBlank = false;
        errorMessage = "Missing data: "
      }
    }

    function adminShowQuestions(){

      var url = "adminShowQuestions.php"; 
      var textName = document.getElementById("textName").value;

      url += "?textName=" + textName;

      httpQuestionAsync(url, showQuestionsInBox);
    }

  </script>



<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content" style="max-width:1400px; margin-left: -10px;">


  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third" style="width:36%">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">

          <h2 style="padding: 0px 2px 0px 10px; margin-bottom: -10px; color: teal"><b><?php echo "Welcome " . $_SESSION['firstName'] . "!" ?></b></h2>
        </div>

        <div class="w3-container">
          <h6><b>Pending Assignments</b></h6>
          <p>
            <div class="w3-container w3-card w3-white" style="margin-top: 5px" id="reportAreaContainer" >
              <p id="reportArea"></p>
            </div>
          </form>
          </p>
          <hr>

          <form action="javascript:adminShowAssignments();" method="GET">
          <input type="submit" value="View Assignments">
          </form>
          </p>
          <hr>

          <h6><b>Assigned Questions and Reading</b></h6>
          <p>
            <div class="inputElement">Text: <input class = "input" type="text" name="subject"; id="textName"></div>
            <div class="w3-container w3-card w3-white" style="margin-top: 5px; height: 200px" id="questionsContainer">
              <p id="questionArea" style="margin-top: 20px"></p>
            </div>
          </form>
          </p>

          <form action="javascript:adminShowQuestions(); javascript:adminShowText();" method="GET">
          <input type="submit" value="View Questions" style="margin-top: 5px">
          </form>
          </p>
          <hr>

          <h6><b>Assign Homework</b></h6>
         
            <div id="fieldContainer"/></div>
            Number of Questions
            <select id="numbQuestions">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <br>
            <form action="javascript:addFields();" method="GET">
            <input type="submit" value="Write Questions">
            </form>

            <form action="javascript:submitQuestions();" method="GET">
            <input type="submit" value="Submit Questions"></div>
            </form>
          </p>
          <hr>
          
          <!-- <h6><b>Ask Tutors Questions</b></h6>
          <p><form action="javascript:SendMessage();" method="GET">  -->
          <!--   <div class="inputElement">Subject: <input class = "input" type="text" name="subject" placeholder="subject: "; id="subject"></div>  -->
            <!-- <div class="inputElement"></div> -->

            <!-- <textarea class = "input" rows="2" cols="34" name="body" placeholder="Message... "; style="margin-bottom: -5px" id="body"></textarea> -->
        
         <!-- THIS NEEDS TO STAY -->
          </div> 


    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird" style="width: 63%; margin: 0 auto;">
  
      <div class="w3-container w3-card w3-white" style="margin-top: 5px; height: 910px;" id="bookContainer" >

          <p id="bookArea"></p>
      </div>
    

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
 
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>
