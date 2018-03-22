<!-- // written by:Yuwei Jiang -->

<?php
session_start();

if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}

include('./classes/dbConnector.php');
$userid = $_SESSION['userid'];

if(!empty($_GET['u'])){
    $friendid = $_GET['u'];
}
//require user info
$user_info_qry = "select * from user where userid=$friendid limit 1";
$user_info_query = mysqli_query($connect,$user_info_qry);
$row = mysqli_fetch_array($user_info_query);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>HealthOn - Personal Health Monitor</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
   <link href="./css/default.css" rel="stylesheet" type="text/css" />

   <!--add to user button javascript begins-->
    <script>
        function loadAddDoc() {
            var friendid = "<?php echo $_GET['u'] ?>";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("addbutton").innerHTML = '<button type="button" onclick="loadRemDoc()" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Remove</button>';
                //   document.getElementById("Alert").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "./classes/addfriend.php?friendid="+friendid+"&ope=add", true);
            xhttp.send();
        }
        function loadRemDoc() {
            var friendid = "<?php echo $_GET['u'] ?>";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("addbutton").innerHTML = '<button type="button" onclick="loadAddDoc()" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button>';
                    //   document.getElementById("Alert").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "./classes/addfriend.php?friendid="+friendid+"&ope=remove", true);
            xhttp.send();
        }
    </script>
    <!--add to user button ends-->

</head>
<body>

<!--topbar begins-->
<?php include './classes/topbar.php' ?>
<!--topbar ends-->

<!--main container begins-->
<div class="container-fluid">
  <div class="row">

    <!--main colume begins-->
    <div class="col-md-10 col-md-offset-1 panel panel-default">
            <?php
                if($userid != $friendid){
                    $friend_qry="SELECT friendid FROM user_friend WHERE uid='$userid' AND friendid='$friendid' limit 1";
                    $friend_result = mysqli_query($connect,$friend_qry);
                    if(mysqli_num_rows($friend_result)==1){
                        echo '<div id="addbutton" style="float:right"><button type="button" onclick="loadRemDoc('.$friendid.')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Remove</button></div>';
                    }
                    else{
                        echo '<div id="addbutton" style="float:right"><button type="button" onclick="loadAddDoc('.$friendid.')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button></div>';
                    }
                }
            ?>
        <h1>User Info:</h1>
        <p>
        <?php
            echo 'User ID: ',$friendid,'<br />';
            echo 'User Name: ',$row['username'],'<br />';
            echo 'Email: ',$row['email'],'<br />';
            echo 'Regdate: ',date("Y-m-d", $row['regdate']),'<br />';
        ?>
        </p>
    </div>
    <!--main colume ends-->

  </div><!-- //row -->
</div>
<!--main container ends-->
</body>
</html>
