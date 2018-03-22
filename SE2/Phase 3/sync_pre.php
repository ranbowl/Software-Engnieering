<?php

    session_start();
    if(!isset($_SESSION['userid'])){
        echo 'Please log in first. ';
        echo '<script language="javascript">history.go(-1);</script>';
        $userid = $_SESSION['userid'];
        $username = $_SESSION['username'];
        if($userid>10){
            echo 'Unauthorized user. ';
            echo '<script language="javascript">history.go(-1);</script>';
        }
    }

    require 'DBconnect.php';

    // check system stock list
    $check_all_query = "SELECT * FROM sys_stock WHERE 1";
    $check_all_sys = mysqli_query($connect,$check_all_query);

    while($sys_stock_row = mysqli_fetch_array($check_all_sys)){
        $symbol=$sys_stock_row['symbol'];
        echo 'check ',$symbol,': ';
        $check_ema_duplicate = "SELECT * FROM ema_pre WHERE Symbol='$symbol' LIMIT 1 ";
        $check_ema_result = mysqli_query($connect,$check_ema_duplicate);
        
        if(mysqli_fetch_array($check_ema_result)==0){
            //add ema_pre
            $add_ema_qry = "INSERT INTO ema_pre(Symbol) VALUES('$symbol')";
            $add_ema_result = mysqli_query($connect,$add_ema_qry);
            if($add_ema_result){
                echo 'Add to ema_pre successful!';
            }
            else{
                echo 'Add ema_pre failed!';
            }
        }
        else{
            echo ' exists in ema_pre; ';
        }
        
        $check_svm_duplicate = "SELECT * FROM svm_pre WHERE Symbol='$symbol' LIMIT 1 ";
        $check_svm_result = mysqli_query($connect,$check_svm_duplicate);
        
        if(mysqli_fetch_array($check_svm_result)==0){
            //add svm_pre
            $add_svm_qry = "INSERT INTO svm_pre(Symbol) VALUES('$symbol')";
            $add_svm_result = mysqli_query($connect,$add_svm_qry);
            if($add_svm_result){
                echo 'Add to svm_pre successful!';
            }
            else{
                echo 'Add svm_pre failed!';
            }
        }
        else{
            echo ' exists in svm_pre';
        }
        echo '<br />';
        
        //b_pre
        $check_b_duplicate = "SELECT * FROM b_pre WHERE Symbol='$symbol' LIMIT 1 ";
        $check_b_result = mysqli_query($connect,$check_b_duplicate);
        
        if(mysqli_fetch_array($check_b_result)==0){
            //add ema_pre
            $add_b_qry = "INSERT INTO b_pre(Symbol) VALUES('$symbol')";
            $add_b_result = mysqli_query($connect,$add_b_qry);
            if($add_b_result){
                echo 'Add to b_pre successful!';
            }
            else{
                echo 'Add b_pre failed!';
            }
        }
        else{
            echo ' exists in b_pre; ';
        }
    }//end while
    
    
?>