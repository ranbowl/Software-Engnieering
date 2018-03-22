<?php
if(!empty($_GET['q']))
{
  require_once('DBconnect.php');

  $q=$_GET['q'];
  $query="SELECT Symbol FROM stocks_realtime where Symbol like '%$q%' ORDER BY StockID desc limit 1";
  $result=mysqli_query($connect,$query);
  if($result==false){
  echo "Mysql query failed. ";
  }
  while($output=mysqli_fetch_assoc($result))
  {
    //echo "<a href='http://localhost:8888/stockpage.php?s=.$output[Symbol].'>'.$output[Symbol].</a>";
    echo "<a href='http://localhost:8888/stockpage.php?s=".$output[Symbol]."' target='_blank'>" .
            $output[Symbol]. "</a>";

  }
}






// $xmlDoc=new DOMDocument();
// $xmlDoc->load("links.xml");
//
// $x=$xmlDoc->getElementsByTagName('link');
//
// //get the q parameter from URL
// $q=$_GET["q"];
//
// //lookup all links from the xml file if length of q>0
// if (strlen($q)>0) {
//   $hint="";
//   for($i=0; $i<($x->length); $i++) {
//     $y=$x->item($i)->getElementsByTagName('title');
//     $z=$x->item($i)->getElementsByTagName('url');
//     if ($y->item(0)->nodeType==1) {
//       //find a link matching the search text
//       if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
//         if ($hint=="") {
//           $hint="<a href='" .
//           $z->item(0)->childNodes->item(0)->nodeValue .
//           "' target='_blank'>" .
//           $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
//         } else {
//           $hint=$hint . "<br /><a href='" .
//           $z->item(0)->childNodes->item(0)->nodeValue .
//           "' target='_blank'>" .
//           $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
//         }
//       }
//     }
//   }
// }
//
// // Set output to "no suggestion" if no hint was found
// // or to the correct values
// if ($hint=="") {
//   $response="no suggestion";
// } else {
//   $response=$hint;
// }
//
// //output the response
// echo $response;
?>
