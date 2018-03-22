<?php
	include_once('class.yahoostock.php');
    require 'DBconnect.php';
    
    $objYahooStock = new YahooStock;
	$objYahooStock->addFormat("snl1d1t1v"); 
	
	$objYahooStock->addStock("msft");
$objYahooStock->addStock("yhoo");
$objYahooStock->addStock("goog"); 
$objYahooStock->addStock("vgz"); 
$objYahooStock->addStock("aapl"); 
foreach( $objYahooStock->getQuotes() as $code => $stock)
{
$result = mysql_query("SELECT * FROM Stocks
WHERE Symbol='$stock[0]'");
if($result )
{

$result1 = mysql_query("SELECT * FROM Stocks
WHERE Time='$stock[4]'");
if($result1)
{


@mysql_query("update stocks
   set Company='$stock[1]', Price='$stock[2]', Date='$stock[3]',Time='$stock[4]', Volume='$stock[5]'
   where Symbol='$stock[0]'");
}

}

else
{
@mysql_query("INSERT INTO Stocks(
    		  Symbol,
              Company,
              Price,
              Date,
              Time,
              Volume)
        VALUES (
        '$stock[0]',
        '$stock[1]',
        '$stock[2]',
        '$stock[3]',
        '$stock[4]',
        '$stock[5]'");

}


    //@mysql_query($query) or die('Creating error!'.mysql_error());

}



?>
