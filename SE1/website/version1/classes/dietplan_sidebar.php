<?php
    $pagename = basename($_SERVER['PHP_SELF']);
?>


<div class="col-sm-3 col-md-2 sidebar" style="padding-right:20px; border-right: 1px solid #ccc;">
<!--<div class="col-sm-3 col-md-2 sidebar">-->
    <ul class="nav nav-sidebar">
    <?php if($pagename == 'dietplan.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="dietplan.php">Daily Recom</a></li>
    <?php if($pagename == 'customized_diet.php') echo '<li class="active">'; else echo '<li>'; ?>
        <a href="customized_diet.php">Customized Recommendation</a></li>

    </ul>
</div>