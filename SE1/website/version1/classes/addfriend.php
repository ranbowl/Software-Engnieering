<?php
    session_start();

    if(!isset($_SESSION['userid'])){
        header("Location:login.html");
        exit();
    }

    include('dbConnector.php');
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];

        $friendid=$_GET['friendid'];
        $ope=$_GET['ope'];

        $check_user_friend_duplicate = "SELECT friendid FROM user_friend WHERE friendid='$friendid' AND uid='$userid' LIMIT 1 ";
        $check_duplicate = mysqli_query($connect,$check_user_friend_duplicate);
        $check_user_exists = "SELECT userid FROM user WHERE userid='$friendid' LIMIT 1 ";
        $check_exists = mysqli_query($connect,$check_user_exists);
        if($ope=="add"){
            //check duplicate
            //if exists
            if(mysqli_fetch_array($check_duplicate)){
                // echo 'Add failed. You have already added ',$friendid,' before. ';
            }
            //exists
            elseif(!mysqli_fetch_array($check_exists)){
                //check if user exists
                // echo 'Add failed. ',$friendid,' does not exist. ';
            }
            else{
                $add_user_friend_qry = "INSERT INTO user_friend(uid,friendid) VALUES('$userid','$friendid')";
                $add_result = mysqli_query($connect,$add_user_friend_qry);
                if($add_result){
                    // echo 'Add ',$friendid, ' successful!<br />';
                }
                else{
                    // echo 'Add failed!<br />';
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
                    // echo 'Remove friend ',$friendid,' successful.<br />';
                }
                else{
                    // echo 'Remove failed!<br />';
                }
            }
            else{
            //if not
                // echo 'You do not have friend ',$friendid;
            }
        }


?>