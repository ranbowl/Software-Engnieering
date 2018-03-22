<!-- // written by:Yuwei Jiang -->

<?php
session_start();
if(isset($_SESSION['userid'])){
    require_once('./classes/dbConnector.php');
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>HealthOn - Personal Health Monitor</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
   <link href="./css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!--topbar begins-->
<?php include './classes/topbar.php' ?>
<!--topbar ends-->


<!--put your stuff here-->
<div class="container-fluid">
    <div class="row">
        <!--sidebar begins-->
        <?php require('./classes/dietplan_sidebar.php') ?>
        <!--sidebar ends-->

        <!--main column begins-->
        <div class="col-sm-9 col-md-10 main">
            <p>Customized Diet Plan</p>
            <p>Daily Recommendation will suggest same diet plan for everyone. It should change every day. </p>
            <p>Customized Recommendation will suggest different diet plan for every individual, based on their goal, weight, activity time. </p>



        </div>
        <!--main column ends-->

    </div>
</div>





</body>
</html>
