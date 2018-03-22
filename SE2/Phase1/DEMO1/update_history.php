<?php
//ignore_user_abort(true);
set_time_limit(0);
include_once('class.yahoostock.php');
require 'DBconnect.php';
while(1)
{


    $connect->query("DELETE FROM `stocks_history` WHERE 1");
    // $sql="INSERT INTO stocks (StockID, Symbol) VALUES (1, 'asdas' )";
    // $connect->query($sql);
    $objYahooStock = new YahooStock;
	 
 	$tricker = array("msft", "yhoo", "goog","vgz","aapl");
 	
 		date_default_timezone_set('America/New_York');
 		$year=date(Y);
 		$last_year=$year-1;
 		$month=date(m)-1;
 		$day=date(d);

 	foreach ($tricker as $value) {

 		$isFirst = true;
  		$s = file_get_contents("http://real-chart.finance.yahoo.com/table.csv?s=$value&d=$month&e=$day&f=$year&g=d&a=$month&b=$day&c=$last_year&ignore=.csv");
  		//echo $s;

		$sourceLines = str_getcsv($s, "\n");
		// var_dump($sourceLines);
		// echo"caocaocoacoacoacoacoacoacoacaocaoaocaco";
  			foreach($sourceLines as $line) 
            {
            	if ($isFirst) {
                    $isFirst = false;
                    continue;
                }

            	$data = explode( ',', $line);
                //var_dump($data);
                //echo"aaaaaaaaaaaaaaaaaaaa";
                //echo $data[0];
            	//$data = explode( ',', $resource);
                $sql="INSERT INTO stocks_history (Symbol,Date,Open, High, Low, Close, Volume)
                 VALUES ('$value', '$data[0]',$data[1],$data[2],$data[3],$data[4],
                 $data[5])";
               $connect->query($sql);
            }
            
 	}
 
sleep(86400);
}

?>
