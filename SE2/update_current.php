<!-- // written by:Xinyu Li
// assisted by:Cheng Chen
// debugged by:Chenfan Xiao -->
<?php
ignore_user_abort(true);
set_time_limit(0);
while(1){
	include_once('class.yahoostock.php');
    require 'DBconnect.php';

    $sys_stock_qry = "SELECT symbol FROM sys_stock WHERE 1";
    $sys_stock_result = mysqli_query($connect,$sys_stock_qry);
    // $sql="INSERT INTO stocks (StockID, Symbol) VALUES (1, 'asdas' )";
    // $connect->query($sql);
    $objYahooStock = new YahooStock;
	$objYahooStock->addFormat("snl1d1t1v");

    while($sys_stock_row = mysqli_fetch_array($sys_stock_result)){
        $objYahooStock->addStock($sys_stock_row['symbol']);
        // echo $sys_stock_row['symbol']," ";
    }
    // $objYahooStock->addStock("msft");
    // $objYahooStock->addStock("yhoo");
    // $objYahooStock->addStock("goog");
    // $objYahooStock->addStock("vgz");
    // $objYahooStock->addStock("aapl");

    foreach( $objYahooStock->getQuotes() as $code => $stock){
//       $result=$connect->query("SELECT * FROM Stocks_realtime WHERE Symbol=$stock[0]");
//       echo $stock[0]," ";
//       if( $result->num_rows>0 )
//       {
        $result1 = $connect->query("SELECT * FROM Stocks_realtime WHERE Date=$stock[3] AND Time=$stock[4] AND Symbol=$stock[0] AND Price=$stock[2] LIMIT 1");

        // echo $result1->num_rows;
        // echo $stock[0];
        // echo $stock[1];
        // echo $stock[2];

        // echo $stock[3];
        /*
        echo $stock[4];
                echo $stock[5];
*/


        if($result1->num_rows<=0)
        {
//        echo "find stock no time. ";
          $connect->query("INSERT INTO Stocks_realtime (Symbol,Company, Price, Date, Time, Volume) VALUES ($stock[0],$stock[1],$stock[2],$stock[3],$stock[4],
                $stock[5])");
                // echo $stock[0]," ",$stock[1]," <br />";
        }
//		echo "find stock and time. ";
//       }
//       else
//       {
//         $sql="INSERT INTO Stocks_realtime (Symbol,Company, Price, Date, Time, Volume)
//                 VALUES ($stock[0],$stock[1],$stock[2],$stock[3],$stock[4],
//                 $stock[5])";
//         $connect->query($sql);
// //        echo "Did not find stock.";
// /*
//         if ($connect->query($sql) === TRUE) {
// 	    			echo "Update Current successfully! ";
// 				} else {
// 	    			echo "Error updating current: " . $connect->error;
// 				}
// */
//         // echo var_dump($stock)."\n";

//       }


    }//end foreach
	// echo "Working Successfully!";
    sleep(30);
}//while ends

?>
