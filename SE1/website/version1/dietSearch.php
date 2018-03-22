
<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php



?>


<form method="post" action="searchResult.php"> 
  Search the world of food <input type="text" name="keyword">
  <br>
   Diets:<br>
  
   <input type="checkbox" name="diets[]" value="Lacto vegetarian">Lacto vegetarian<br>
   <input type="checkbox" name="diets[]" value="Ovo vegetarian">Ovo vegetarian<br>
  <input type="checkbox" name="diets[]" value="Pescetarian">Pescetarian<br>
  <input type="checkbox" name="diets[]" value="Vegan">Vegan<br>
  <input type="checkbox" name="diets[]" value="Vegetarian">Vegetarian<br>
   <input type="checkbox" name="diets[]" value="Paleo">Paleo<br>
   <br><br>
   <input type="submit" name="Confirm" value="Confirm"> 
</form>



</body>
</html>