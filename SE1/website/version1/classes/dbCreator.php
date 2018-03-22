<!-- written by:Yuwei Jiang -->
<?php

    define("DB_HOST","localhost");
    define("DB_USER","se1");
    define("DB_PWD","Group4_se1");
    $connect = new mysqli(DB_HOST,DB_USER,DB_PWD );
     if ($connect->connect_error)
 	 {
 	 	die('Could not connect: ' . $connect->connect_error );
  	 }
    //create database
  	$sql = "CREATE DATABASE se1";
    $res = mysqli_query($connect,$sql);
	if ($res === TRUE) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . $connect->error;
	}

	//sq1 to create table user
    $sql1 = "CREATE TABLE se1.user (userid INT(10) NOT NULL  AUTO_INCREMENT, PRIMARY KEY(userid), username VARCHAR(20) NOT NULL, pass VARCHAR(40) NOT NULL, email VARCHAR(20) NOT NULL, regdate INT(11) NOT NULL)";
    $res1 = mysqli_query($connect,$sql1);
	if ($res1 === TRUE) {
	    echo "Table user created successfully";
	} else {
	    echo "Error creating table: " . $connect->error;
	}

    //sq2 to create table user
    $sql2 = "CREATE TABLE se1.user_friend (usid INT(10) NOT NULL  AUTO_INCREMENT, PRIMARY KEY(usid), uid INT(11) NOT NULL, friendid INT(11) NOT NULL)";
    $res2 = mysqli_query($connect,$sql2);
	if ($res2 === TRUE) {
	    echo "Table user_friend created successfully";
	} else {
	    echo "Error creating table: " . $connect->error;
	}

	mysqli_close;

?>
