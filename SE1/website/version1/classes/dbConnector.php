<!-- // written by:Yuwei Jiang -->
<?php
    define("DB_HOST","localhost");
    define("DB_USER","se1");
    define("DB_PWD","Group4_se1");
    define("DB_NAME","se1");
    $connect = new mysqli(DB_HOST,DB_USER,DB_PWD, DB_NAME );
     if ($connect->connect_error)
 	 {
 	 	die('Could not connect: ' . $connect->connect_error );
  	 }

?>