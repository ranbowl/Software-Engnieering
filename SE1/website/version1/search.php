<!-- // written by:Cheng Chen -->
<?php
session_start();
if(isset($_SESSION['userid'])){
    require_once('./classes/dbConnector.php');
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>StockPre</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
   <link href="./css/default.css" rel="stylesheet" type="text/css" />
   <script>
       function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","./classes/livesearch.php?q="+str,true);
  xmlhttp.send();
}

function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","./classes/livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<!--topbar begins-->
<?php include './classes/topbar.php' ?>
<!--topbar ends-->

<!--main container begins-->
<div class="container">
  <div class="row">

    <!--main colume begins-->
    <div class="col-md-10 col-md-offset-1 panel panel-default">
        <p>
            <br /><h1>Search: </h1><br />
            <form class="margin-base-vertical">
            <input type="text" size="30" onkeyup="showResult(this.value)"  class="form-control input-lg"/>
            <div id="livesearch"></div>
            </form>
        </p>
    </div>
    <!--main colume ends-->

  </div><!-- //row -->
</div>
<!--main container ends-->
</body>
</html>
