<?php
    define('DB_HOST','127.10.165.2');
    define('DB_USER','adminFiajMY8');
    define('DB_PWD','BKbZGn6d83Pv');//密码

    //connect to DB
    $connect = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());

    //Add table

@mysql_query("CREATE DATABASE DBTEST1") or die('新增错误：'.mysql_error());
@mysql_query("CREATE TABLE DBTEST1.Stocks (StockID INT(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY(StockID), Symbol VARCHAR(30) NOT NULL, Company VARCHAR(30) NOT NULL, Price DECIMAL(7,2) NOT NULL, Date VARCHAR(30) NOT NULL, Time VARCHAR(30) NOT NULL, Volume INT(10) NOT NULL)") or die('新增错误：'.mysql_error());

?>