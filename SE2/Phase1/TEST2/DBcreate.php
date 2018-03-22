<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PWD','lxy369874521');

    //connect to DB
   $connect = new mysqli("localhost","root","lxy369874521" );
     if ($connect->connect_error)
 	 {
 	 	die('Could not connect: ' . $connect->connect_error );
  	 }

    //Add table
  	$sql = "CREATE DATABASE DBTEST1";
	if ($connect->query($sql) === TRUE) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . $conn->error;
	}



	// sq2 to create table realtime stocks
	$sq2 = "CREATE TABLE DBTEST1.Stocks_realtime (StockID INT(11) NOT NULL  AUTO_INCREMENT, PRIMARY KEY(StockID), Symbol VARCHAR(30) NOT NULL, Company VARCHAR(30) NOT NULL, Price DECIMAL(7,2) NOT NULL, Date VARCHAR(30) NOT NULL, Time VARCHAR(30) NOT NULL, Volume INT(10) NOT NULL)";

	if ($connect->query($sq2) === TRUE) {
	    echo "Table atocka_realtime created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}

	// sq2 to create table history stocks
	$sq3 = "CREATE TABLE DBTEST1.Stocks_history (StockID INT(11) NOT NULL  AUTO_INCREMENT, PRIMARY KEY(StockID), Date VARCHAR(30) NOT NULL, Open INT(10) NOT NULL, High INT(10) NOT NULL, Low INT(10) NOT NULL, Close INT(10) NOT NULL, Volume INT(10) NOT NULL)";

	if ($connect->query($sq3) === TRUE) {
	    echo "Table atocka_realtime created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}
	
		

	$connect->close();

?>