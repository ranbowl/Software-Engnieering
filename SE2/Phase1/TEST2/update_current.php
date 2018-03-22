<?php
	include_once('class.yahoostock.php');
  require 'DBconnect.php';
    // $sql="INSERT INTO stocks (StockID, Symbol) VALUES (1, 'asdas' )";
    // $connect->query($sql);
    $objYahooStock = new YahooStock;
	  $objYahooStock->addFormat("snl1d1t1v"); 
	
    $objYahooStock->addStock("msft");
    $objYahooStock->addStock("yhoo");
    $objYahooStock->addStock("goog"); 
    $objYahooStock->addStock("vgz"); 
    $objYahooStock->addStock("aapl"); 

    foreach( $objYahooStock->getQuotes() as $code => $stock){
      $result=$connect->query("SELECT * FROM stocks_realtime WHERE Symbol=$stock[0]");
      if( $result->num_rows>0 )
      {

        $result1 = $connect->query("SELECT * FROM stocks_realtime WHERE Time=$stock[4] AND Symbol=$stock[0] ");
        if($result1->num_rows<=0)
        {
          $connect->query("INSERT INTO stocks_realtime (Symbol,Company, Price, Date, Time, Volume) VALUES ($stock[0],$stock[1],$stock[2],$stock[3],$stock[4],
                $stock[5])");
        }

      }
      else
      {
        $sql="INSERT INTO stocks_realtime (Symbol,Company, Price, Date, Time, Volume)
                VALUES ($stock[0],$stock[1],$stock[2],$stock[3],$stock[4],
                $stock[5])";
        $connect->query($sql);
        // echo var_dump($stock)."\n";

      }


    }



?>
