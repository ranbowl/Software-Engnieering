<?php
require 'DBconnect.php';

$sql = "SELECT symbol FROM sys_stock   ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()) {
      $price[] = $row[symbol];
      //$i++;
       // echo "symbol: " . $row[Symbol] . " - close: " . $row[Close] ."<br>";
    //var_dump($row);
    //echo "<br>";
    }

foreach ($price as $stock){
  //$stock  . "<br>";

$sql = "SELECT * FROM stocks_history WHERE Symbol='$stock'";
$result = $connect->query($sql);

$price = array();
$i = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $price[] = $row[Close];
      $i++;
       // echo "symbol: " . $row[Symbol] . " - close: " . $row[Close] ."<br>";
    //var_dump($row);
    //echo "<br>";
    }
} 
else {
    echo "0 results";
}

$price_positive = array();
$price_negative = array();
for ($x=0; $x<14; $x++) {
  $a = $price[$x] - $price[$x+1];
  if($a>0){
    $price_positive[] = $a;
  }
  else{
    $price_negative[] = $a;
  }
  //echo $a . "  ";
} 

$price1 = 0;
for($x=0; $x<count($price_positive);$x++){
  //echo $price_positive[$x] . "<br>";
  $price1 += $price_positive[$x];
}

$price2 = 0;
for($x=0; $x<count($price_negative);$x++){
  //echo $price_negative[$x] . "<br>";
  $price2 -= $price_negative[$x];
}
//echo $price1 . "  " . $price2 . "<br>";

$RSI = ($price1/($price1+$price2)) * 100;
//echo $RSI;
//echo "<br>";

$sql="UPDATE rsi_pre SET RSI = $RSI WHERE symbol = '$stock'";
$connect->query($sql);
}


$connect->close();

?>