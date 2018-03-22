<html>
<body>


<?php



$keyword="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $keyword=urlencode($_POST["keyword"]);

  $url="http://api.yummly.com/v1/api/recipes?_app_id=013835ae&_app_key=6ec525c4f804fc681e92a74ca19d5788";
  $url.="&q=".$keyword;
  
  foreach($_POST['diets'] as $diet)
    {
      switch ($diet)
      {
        case "Lacto vegetarian":
          $url.="&allowedDiet[]="."388^Lacto vegetarian";
          break;
        case "Ovo vegetarian":
           $url.="&allowedDiet[]="."389^Ovo vegetarian";
           break;
        case "Pescetarian":
           $url.="&allowedDiet[]="."390^Pescetarian";
           break;
        case "Vegan":
           $url.="&allowedDiet[]="."386^Vegan";
           break;
        case "Vegetarian":
           $url.="&allowedDiet[]="."387^Lacto-ovo vegetarian";
           break;
        case "Paleo":
           $url.="&allowedDiet[]="."403^Paleo";
           break;
          
          
          
              
          
          
      }
        
    
    
    }
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $respond = curl_exec($curl);
  $result=json_decode($respond,$assoc = TRUE);
  $recipe=$result["matches"];
  foreach($recipe as $items)
    {
      
          //$ch = curl_init ($items["smallImageUrls"][0]);
          //curl_setopt($ch, CURLOPT_HEADER, 0);
          // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          // curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
           //  $raw=curl_exec($ch);
         //  curl_close ($ch);
       
       // var_dump($raw);
      
        echo "The name of recipe: ".$items["recipeName"]."<br /><br />";
        echo "The ingredients of recipe: "."<br/>";
        foreach($items["ingredients"] as $ingredient )
        {
          echo $ingredient."<br/>";
        }
        echo "<br/>";
        echo "The total time in seconds: ".$items["totalTimeInSeconds"]."<br/>";
        echo "Rating :".$items["rating"]."<br/><hr />";
        
        
    }
}
?>
  
  
  </body>
</html>