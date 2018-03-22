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

    //Add Stock
    $query = "INSERT INTO Stocks(
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
        '$stock[5]'
        )";

    @mysql_query($query) or die('Creating error!'.mysql_error());

}



?>