<?php

//Block 1
$user = "user_name"; 
$password = "password"; 
$host = "host_name"; 
$dbase = "database_name"; 
$table = "table_name"; 

//Block 2
$from= 'email_address';

//Block 3
$subject= $_POST['subject'];
$body= $_POST['body'];

//Block 4
$dbc= mysqli_connect($host,$user,$password, $dbase) 
or die("Unable to select database");

//Block 5
$query= "SELECT * FROM $table";
$result= mysqli_query ($dbc, $query) 
or die ('Error querying database.');

//Block 6
while ($row = mysqli_fetch_array($result)) 
{
$first_name= $row['first_name'];
$last_name= $row['last_name'];
$email= $row['email'];

//Block 7
$msg= "Dear $first_name $last_name,\n$body";
mail($email, $subject, $msg, 'From:' . $from);
echo 'Email sent to: ' . $email. '<br>';
}

//Block 8
mysqli_close($dbc);
?>

/*
The following PHP code is broken up into blocks so that we can go over each block and see what each one does.

Block 1 is where you enter in your user name, password, host name, database name, and table name to connect to the table of the MySQL server that you want to connect to.

Block 2 is the email address from which you want to send out the email to all the contacts that you have on your email list.

Block 3 is the PHP code used to retrieve the subject title and the body of the email content that you enter in and want to send to all members of your email list.

Block 4 is the code used to connect to the database of your MySQL server.

Block 5 is the code to select all emails that are on the email list and the code that actually executes the connection to the database.

Block 6 is the code that fetches each row in your email list table of your database to extract all the information from each and every user. In this table, we store 3 sets of information, the user's first name, last name, and email. If we just used $row= mysqli_fetch_array($result));, this would only retrieve one row of a user's information and we would have to keep repeating this line over and over. Besides being terrible coding, it's also inefficient because we wouldn't know how many rows there are in the table unless we checked. A while loop is is perfect because while the fields are not empty or equal to zero, it will keep retrieving row after row until there are no more rows left to achieve. We run the while and we retrieve each of the three sets of information, the first name, last name, and email of the user.

Block 7 writes the salutation of the email and mails off the email using the mail function. We're able to address the user by his or her first and last name, since we have all of this information on the database. We then use an echo statement to confirm that the email was, in fact, sent to the user.

Block 8 closes the connection to the database. 



*/