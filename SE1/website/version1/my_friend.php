<?php
session_start();

if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}

include('./classes/dbConnector.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
//require user info
$user_friend_qry = "select friendid from user_friend where uid=$userid";
$user_friend_query = mysqli_query($connect,$user_friend_qry);

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
    <p class="text-center"><h1>Friends: </h1></p>
    <?php

    if(!empty($_GET)){
        $friendid=$_GET['friendid'];
        $ope=$_GET['ope'];
        echo '<h3>Alert:</h3>';
        $check_user_friend_duplicate = "SELECT friendid FROM user_friend WHERE friendid='$friendid' AND uid='$userid' LIMIT 1 ";
        $check_duplicate = mysqli_query($connect,$check_user_friend_duplicate);
        $check_user_exists = "SELECT userid FROM user WHERE userid='$friendid' LIMIT 1 ";
        $check_exists = mysqli_query($connect,$check_user_exists);
        if($ope=="add"){
            //check duplicate
            //if exists
            if(mysqli_fetch_array($check_duplicate)){
                echo 'Add failed. You have already added ',$friendid,' before. ';
            }
            //exists
            elseif(!mysqli_fetch_array($check_exists)){
                //check if user exists
                echo 'Add failed. ',$friendid,' does not exist. ';
            }
            else{
                $add_user_friend_qry = "INSERT INTO user_friend(uid,friendid) VALUES('$userid','$friendid')";
                $add_result = mysqli_query($connect,$add_user_friend_qry);
                if($add_result){
                    echo 'Add ',$friendid, ' successful!<br />';
                }
                else{
                    echo 'Add failed!<br />';
                }
            }
        }
        elseif($ope=="remove"){
            //check duplicate
            if(mysqli_fetch_array($check_duplicate)){
                //if exists
                $rem_user_friend_qry="DELETE FROM user_friend WHERE uid='$userid' AND friendid='$friendid' ";
                $rem_stock=mysqli_query($connect,$rem_user_friend_qry);
                if($rem_stock){
                    echo 'Remove friend ',$friendid,' successful.<br />';
                }
                else{
                    echo 'Remove failed!<br />';
                }
            }
            else{
            //if not
                echo 'You do not have friend ',$friendid;
            }
        }
        else{
            echo 'Please choose a valid operation. ';
        }
    }

    // check friends list
    $check_all_query = "SELECT * FROM user_friend WHERE uid='$userid' ";
    $check_all = mysqli_query($connect,$check_all_query);
    echo '<p><br /><h3>Friend List: </h3><br />';
    while($friend_row = mysqli_fetch_array($check_all)){
        echo '      Friend ID: ',$friend_row['friendid'], ' <a href="my_friend.php?friendid=',$friend_row['friendid'],'&ope=remove">delete</a><br />';
    }
    echo '</p>';

?>
        <form  action="my_friend.php"   method="get" class="margin-base-vertical">
        <p class="input-group">
            <span class="input-group-addon">Friend ID:</span>
            <input    type="text"   name="friendid"  value=""  class="form-control input-lg"/><br/>
        </p>
        
        <p class="text-center">
            <button name="ope" type="submit"  value="add" class="btn btn-success btn-lg" />Add</button>
            <button name="ope" type="submit"  value="remove" class="btn btn-lg btn-default" />Remove</button>
        </p>
        </form>
    </div>
    <!--main colume ends-->

  </div><!-- //row -->
</div>
<!--main container ends-->
</body>
</html>