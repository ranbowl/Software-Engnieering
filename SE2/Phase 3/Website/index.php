<?php
session_start();
if(isset($_SESSION['userid'])){
    include('DBconnect.php');
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>StockPre</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <link href="http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
   <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--container fluid-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">StockPre</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!--left navigation begins-->
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Index <span class="sr-only">(current)</span></a></li>
        <li><a href="search.php">Search</a></li>
      </ul>
      <!--left navigation ends-->

      <!--right navigation begins-->
      <ul class="nav navbar-nav navbar-right">
          <!--navigation search begins-->
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <!--navigation search ends-->

        <!--my menu begins-->
        <?php
        if(isset($_SESSION['userid'])){
            echo '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My<span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="my_profile.php">Profile</a></li>
                <li><a href="my_stock.php">StockList</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="login.php?action=logout">Log out</a></li>
                </ul>
                </li>';
        }
        else{
            echo '<li><a href="login.html">Log In</a></li>';
        }
        ?>
        <!--my menu ends-->

      </ul>
      <!--right navigation ends-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--container fluid ends-->
<div class="container">
  <div class="row">
    <div class="col-md-6  col-md-offset-1 panel panel-default">
      <h1>left part</h2>
    </div><!-- //colum -->
    <div class="col-md-4   panel panel-default">
      <h1>right part</h2>
    </div><!-- //colum -->
  </div><!-- //row -->

</div> <!-- //container -->
</body>
</html>
