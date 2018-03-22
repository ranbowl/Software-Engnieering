<?php
    $pagename = basename($_SERVER['PHP_SELF']);
?>


<div class="col-sm-3 col-md-2 sidebar" style="padding-right:20px; border-right: 1px solid #ccc;">
<!--<div class="col-sm-3 col-md-2 sidebar">-->
    <ul class="nav nav-sidebar">
    <?php if($pagename == 'analysis.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="analysis.php">Overview</a></li>
    <?php if($pagename == 'work.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="an_work.php">Work Time</a></li>
    <?php if($pagename == 'sleep.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="sleep.php">Sleep Time</a></li>
    <?php if($pagename == 'exercise.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="exercise.php">Exercise Time</a></li>
    <?php if($pagename == 'ages.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="ages.php">Ages</a></li>
    <?php if($pagename == 'breakfast.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="breakfast.php">Breakfast Percent</a></li>
    <?php if($pagename == 'EatingVegetables.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="EatingVegetables.php">Eating Vegetables Percent</a></li>
    <?php if($pagename == 'smoke.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="smoke.php">Smoke Percent</a></li>
    </ul>
</div>