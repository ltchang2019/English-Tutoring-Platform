<!DOCTYPE html>
<html>
<title>User Panel</title>
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
  margin-top: 150px;
  vertical-align: middle;
}

.democlass{
  color:red;
}


</style>

<script>
    function showResults(responseText) {
      document.getElementById("reportArea").innerHTML = responseText; 
    }
       

    function httpGetAsync(theUrl, callbackWhenPageLoaded) { 
      var xmlHttp = new XMLHttpRequest();

      xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
          callbackWhenPageLoaded(xmlHttp.responseText);
      }
      xmlHttp.open("GET", theUrl, true); 
      xmlHttp.send(null);
      resetFieldStyles();
    }

    function resetFieldStyles() {
      document.getElementById("viewMessageUsername").style.background = "white";

      document.getElementById("toUsername").style.background = "white";
      document.getElementById("fromUsername").style.background = "white";
      document.getElementById("subject").style.background = "white";
      document.getElementById("body").style.background = "white";

      document.getElementById("SentFromUsername").style.background = "white";

      document.getElementById("newUsername").style.background = "white";
      document.getElementById("newPassword").style.background = "white";
      document.getElementById("newEmail").style.background = "white";
      document.getElementById("firstName").style.background = "white";
      document.getElementById("lastName").style.background = "white";
    }

        function ShowMessagesReceived() {
      
      var url = "DisplayMessages.php"; 
      var username = document.getElementById("viewMessageUsername").value;
      
      resetFieldStyles();

      var errorMessage = "Missing data: ";
      var somethingBlank = false;
      if(username == ""){
        errorMessage += "username";
        somethingBlank = true;
        document.getElementById("viewMessageUsername").style.background = "yellow";
      }
      url += "?username=" + username;
      
      if(errorMessage == "Missing data: ")
        httpGetAsync(url, showResults);
      else{
        alert(errorMessage);
        somethingBlank = false;
        errorMessage = "Missing data: ";
      }
  
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

    function DisplayMessagesSent(){

      var url = "viewMessagesFrom.php"; 
      var SentFromUsername = document.getElementById("SentFromUsername").value;

      resetFieldStyles();
      
      var errorMessage = "Missing data: ";
      var somethingBlank = false;
      if(SentFromUsername == ""){
        errorMessage += "username";
        somethingBlank = true;
        document.getElementById("SentFromUsername").style.background = "yellow";
      }
      url += "?username=" + SentFromUsername;
      
      if(errorMessage == "Missing data: ")
        httpGetAsync(url, showResults);
      else{
        alert(errorMessage);
        somethingBlank = false;
        errorMessage = "Missing data: ";     
      }
    }

    function NewProblems(){
      var url = "viewMessagesFrom.php"; 
      var SentFromUsername = "ltchang";

        httpGetAsync(url, showResults);
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
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">

          <h2 style="padding: 0px 2px 0px 10px; margin-bottom: -10px; color: teal"><b>User Panel</b></h2>
        </div>

        <div class="w3-container">
          <h6><b>New Problems</b></h6>
          <p>
            <div class="w3-container w3-card w3-white" style="margin-top: 5px" id="reportAreaContainer">
              <p id="reportArea"></p>
            </div>
          </p>
          <hr>

          <h6><b>View Messages To...</b></h6>
          <p>
          <form action="javascript:ShowMessagesReceived();" method="GET">
          <div class="inputElement">Username: <input class = "input" type="text" name="username" id="viewMessageUsername" placeholder = "username: "></div>
          <input type="submit" value="View">
          </form>
          </p>
          <hr>

          <h6><b>View Messages Sent By...</b></h6>
          <p>
          <form action="javascript:DisplayMessagesSent();" method="GET">
          <div class="inputElement">Username: <input class = "input" type="text" name="username" id="SentFromUsername" placeholder = "username: "></div>
          <input type="submit" value="View">
          </form>
          </p>
          <hr>

          
          <h6><b> Send A Message </b></h6>
          <p><form action="javascript:SendMessage();" method="GET"> 
            <div class="inputElement">From: <input class = "input" type="text" name="fromWho" placeholder="username: "; id="fromUsername"></div>
            <div class="inputElement">To: <input class = "input" type="text" name="toWhom" placeholder="username: "; id = "toUsername"></div>
            <div class="inputElement">Subject: <input class = "input" type="text" name="subject" placeholder="subject: "; id="subject"></div> 
            <div class="inputElement"> 
            Body:<br>
            <textarea class = "input" rows="2" cols="34" name="body" placeholder="Message... "; style="margin-bottom: -5px" id="body"></textarea></div>
            <input type="submit" value="Send">
          </form>
          </p>
        
          <hr>
        </div>
      </div><br>


    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
  
      
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

