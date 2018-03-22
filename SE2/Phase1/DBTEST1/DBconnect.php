<?php

    define('DB_HOST','127.10.165.2');
    define('DB_USER','adminFiajMY8');
    define('DB_PWD','BKbZGn6d83Pv');//密码
    define('DB_NAME','DBTEST1');//在phpmyadmin创建一个名为trigkit的数据库

    //连接数据库
    $connect = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());

    //选择指定数据库
    mysql_select_db(DB_NAME,$connect) or die('数据库连接错误，错误信息：'.mysql_error());//将表名字故意写错，提示的错误信息：数据库连接错误，错误信息：Unknown database 'trigkt'

?> 