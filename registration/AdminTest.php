<!DOCTYPE html>

<?php session_start(); ?>

<html>
<title>Grace English Program - Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html{
  position: relative;
  overflow: scroll;
  resize: both;
}
input[type=text] {
      width: 50%;
      position: relative;
      max-width: 100%;
      height: 22px;
    }
input[type=url]{
    width: 50%;
    position: relative;
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
    .col{
      display: table-cell;
      padding: 5px;
    }
.content{
  display: table;
  border-spacing: 10px;
  width:100%;
}
.sendForm{
  resize: both;
}

#body{
  max-width: 100%;
}
#reportAreaContainer{
    display: flex;
    flex-direction: column;
    min-height: 200px;
}
#questionsContainer{
    display: flex;
    flex-direction: column;
    min-height: 200px;
}
#reportArea{
  line-height: 1.5;
  width: 100%;
  margin-top: 20px;
  vertical-align: middle;
}
.assignmentMessageContainer{
  color: green;
}
.democlass{
  color:red;
}

</style>

<script>


//     $(document).ready(function(){

// //get height of right div

//       var eRightHt = $(“.w3-twothird).outerHeight();

// // apply height to image in leftdiv

//       $(“.w3-third).css(“height”,eRightHt);

//     });
    

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

    function httpFieldsAsync(theUrl, callbackWhenPageLoaded) { 
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
          var submitTextName = document.getElementById("adminTextName").value;
          localStorage.setItem("storedTextName", submitTextName);

          var url = "storeNumbQuestions.php";
          var number = document.getElementById("numbQuestions").value;
          url += "?numbQuestions=" + number;

          localStorage.setItem("number", number);

          var container = document.getElementById("fieldContainer");
          while (container.hasChildNodes()) {
              container.removeChild(container.lastChild);
          }
          for (i=0;i<number;i++){
              if(i==0){
                container.appendChild(document.createElement("br"));
              }
              container.appendChild(document.createTextNode("Question " + (i+1 + ": ")));
               var input = document.createElement("input");
              input.type = "text";
              input.setAttribute("id", ("input" + i));
               container.appendChild(input);
              container.appendChild(document.createElement("br"));
              container.appendChild(document.createElement("br"));
            }

          httpFieldsAsync(url, showBlank);
        }

        function submitQuestions(){
            var submitTextName = document.getElementById("adminTextName").value;
            localStorage.setItem("storedTextName", submitTextName);

            if(localStorage.getItem("storedTextName")!==""){
              var submitTextName = document.getElementById("adminTextName").value;
              localStorage.setItem("storedTextName", submitTextName);
              var storedTextName = localStorage.getItem("storedTextName");

              var storedNumber = localStorage.getItem("number");
              url = "submitQuestions.php";

              var link = document.getElementById("pdfLink").value;

              var blankQuestion = false;

            if(storedNumber == 1){
              for (i=0;i<storedNumber;i++){
                var question1 = document.getElementById("input" + i).value;
                url += "?storedTextName=" + storedTextName + "&numbQuestions=" + storedNumber + "&question1=" + question1 + "&link=" + link;
                if(question1 == "")
                  blankQuestion=true;
              }
            }
            else if(storedNumber == 2){
                for (i=0;i<1;i++){
                  var question1 = document.getElementById("input" + i).value;
                }
                for (i=1;i<2;i++){
                var question2 = document.getElementById("input" + i).value;
              }
              url += "?storedTextName=" + storedTextName + "&numbQuestions=" + storedNumber + "&question1=" + question1 + "&question2=" + question2 + "&link=" + link;
              if(question1 == "" || question2 == "")
                blankQuestion=true;
          }
          else if(storedNumber == 3){
                for (i=0;i<1;i++){
                var question1 = document.getElementById("input" + i).value;
                }
                for (i=1;i<2;i++){
                var question2 = document.getElementById("input" + i).value;
                }
                for (i=2;i<3;i++){
                var question3 = document.getElementById("input" + i).value;
                }
              url += "?storedTextName=" + storedTextName + "&numbQuestions=" + storedNumber + "&question1=" + question1 + "&question2=" + question2 + "&question3=" + question3 + "&link=" + link;
              if(question1 == "" || question2 == "" || question3 == "")
                blankQuestion=true;
          }
          else if(storedNumber == 4){
                for (i=0;i<1;i++){
                var question1 = document.getElementById("input" + i).value;
                }
                for (i=1;i<2;i++){
                var question2 = document.getElementById("input" + i).value;
                }
                for (i=2;i<3;i++){
                var question3 = document.getElementById("input" + i).value;
                }
                for (i=3;i<4;i++){
                var question4 = document.getElementById("input" + i).value;
                }
              url += "?storedTextName=" + storedTextName + "&numbQuestions=" + storedNumber + "&question1=" + question1 + "&question2=" + question2 + "&question3=" + question3 + "&question4=" + question4 + "&link=" + link;
              if(question1 == "" || question2 == "" || question3 == "" || question4 == "")
                blankQuestion=true;
          }
          else if(storedNumber == 5){
                for (i=0;i<1;i++){
                var question1 = document.getElementById("input" + i).value;
                }
                for (i=1;i<2;i++){
                var question2 = document.getElementById("input" + i).value;
                }
                for (i=2;i<3;i++){
                var question3 = document.getElementById("input" + i).value;
                }
                for (i=3;i<4;i++){
                var question4 = document.getElementById("input" + i).value;
                }
                for (i=4;i<5;i++){
                var question5 = document.getElementById("input" + i).value;
                }
              url += "?storedTextName=" + storedTextName + "&numbQuestions=" + storedNumber + "&question1=" + question1 + "&question2=" + question2 + "&question3=" + question3 + "&question4=" + question4 +  "&question5=" + question5 + "&link=" + link;
              if(question1 == "" || question2 == "" || question3 == "" || question4 == "" || question5 == "")
                blankQuestion=true;
            }
            
            httpQuestionAsync(url, showAssignmentMessage);
            if(blankQuestion==false){
              document.getElementById("fieldContainer").innerHTML = "";
              document.getElementById("assignHW").reset();
            }
            }
            else{
              alert("Please specify a text name and/or link...");
            }
        }

    function showBlank(responseText){
    }

    function showAssignmentMessage(responseText){
      document.getElementById("assignmentMessageContainer").innerHTML = responseText; 
    }

    function showTextInBox(responseText){
      document.getElementById("bookContainer").innerHTML = responseText; 
    }

    function adminShowText(){
      var url = "adminShowText.php"; 
      var textName = document.getElementById("textName").value;

      url += "?textName=" + textName + "&output=embed";

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
<div class="content">


    <!-- LEFT COLUMN -->
      <div class="w3-white w3-text-grey w3-card-4 col" style="width:40%; float: top;">
      <h2 style="padding: 0px 2px 0px 10px; margin-bottom: -50px; color: teal"><b><?php echo "Welcome " . $_SESSION['firstName'] . "!" ?></b> <a href="adminlogin.php"><img src="logout.png" style="float: right; margin-right: 15px; margin-top: 10px; width:40px; height:35px;"></a></h2>
      
      <div class="w3-container" style="margin-top: -50px">
          <h6><b>Pending Assignments</b></h6>
          <p>
            <div class="w3-container w3-card w3-white" style="margin-top: 5px; padding-bottom: 15px;" id="reportAreaContainer" >
              <p id="reportArea"></p>
            </div>
          </form>
          </p>
          <hr>

          <form action="javascript:adminShowAssignments();" method="GET">
          <input type="submit" value="View Assignments" style="margin-bottom: 10px">
          </form>
          </p>
          <hr>


          <!-- NEXT SECTION -->

          <h6><b>View Readings, Questions, and Answers</b></h6>
          <p>
            <div class="inputElement">Text Name: <input class = "input" type="text" name="subject" id="textName" ></div>
            <div class="w3-container w3-card w3-white" style="padding-bottom: 10px;" id="questionsContainer">
              <p id="questionArea" style="margin-top: 10px"></p>
            </div>
          </form>
          </p>

          <form action="javascript:adminShowQuestions(); javascript:adminShowText();" method="GET">
          <input type="submit" value="View Questions" style="margin-top: 5px">
          </form>
          </p>
          <hr>



        </div>
      </div>


    <!-- RIGHT COLUMN -->

      <div class="w3-white w3-text-grey w3-card-4 col" id="bookContainer" style="width: 60%">
        <p id="bookArea">apudshfpasiudhfpiushifuhapidufpiuhwepfuhpiohbouhbp<br>sadfoiuhapsufpaisdbfoiahbdsf<br><br>apsudfpauisbdpfiuabspdiubfap</p>
      </div>

</div>
</body>
</html>
