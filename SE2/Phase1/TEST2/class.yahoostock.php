<?php
require 'DBconnect.php';
/**
 * Class to fetch stock data from Yahoo! Finance
 *
 */
 
class YahooStock {
    
	/*
	 * Array of stock code
	 */
    private $stocks = array();
	
	/**
	 * Parameters string to be fetched	 
	 
	private $format;
 
    /**
     * Populate stock array with stock code
	 *
     * param string $stock Stock code of company    
     * return void
     */
    public function addStock($stock)
    {
        $this->stocks[] = $stock;
    }
	
	/**
     * Populate parameters/format to be fetched
	 *
     * param string $param Parameters/Format to be fetched
     * return void
     */
	public function addFormat($format)
    {
        $this->format = $format;
    }
 // */
    /**
     * Get Stock Data
	 *
     * return array
     */
    public function getQuotes()
    {        
        $result = array();		
		$format = $this->format;
        
        foreach ($this->stocks as $stock)
        {            
		// 	/**
		// 	 * fetch data from Yahoo!
		// 	 * s = stock code
		// 	 * f = format
		// 	 * e = filetype
		// 	 */
            $s = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=$format&e=.csv");
            
			/** 
			 * convert the comma separated data into array
			 */
            $data = explode( ',', $s);
			
			/** 
			 * populate result array with stock code as key
			 */
            $result[$stock] = $data;
        }
        return $result;
    }


    public function get_historyQuotes()
    {        
        $result = array();      
        //$format = $this->format;
        
        foreach ($this->stocks as $stock)
        {      

            $isFirst = true;      
            // *
            //  * fetch data from Yahoo!
            //  * s = stock code
            //  * f = format
            //  * e = filetype
             
            $s = file_get_contents("http://real-chart.finance.yahoo.com/table.csv?s=$stock&d=3&e=3&f=2016&g=d&a=3&b=3&c=2015&ignore=.csv");
            $sourceLines = str_getcsv($s, "\n");

            foreach($sourceLines as $line) 
            {
                //parse contents of each line into an array
                $contents = str_getcsv( $line );
                
                //skip first line
                if ($isFirst) {
                    $isFirst = false;
                    continue;
                }
                // $sq1="INSERT INTO stocks_history (Symbol,Date,Open, High, Low, Close, Volume)
                // VALUES ($stock,$contents[0],$contents[1],$contents[2],$contents[3],$contents[4],
                // $contents[5])";
                $connect->query("INSERT INTO stocks_history (Date,Open, High, Low, Close, Volume)
                VALUES ($contents[0],$contents[1],$contents[2],$contents[3],$contents[4],
                $contents[5])");
                


            }
            /** 
             * convert the comma separated data into array
             
           //
            
            /** 
             * populate result array with stock code as key
             */
           // $result[$stock] = $data;

         //}  
        // return $result;
   } 
}
   
}