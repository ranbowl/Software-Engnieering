<?php 
    $pagename = basename($_SERVER['PHP_SELF']);
    echo '<ul class="nav navbar-nav">';

    //if index.php
    if($pagename == 'index.php'){
        echo '<li class="active"><a href="#">Index <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href = "index.php">Index </a></li>';
    }

    //if search.php 
    if($pagename == 'search.php'){
        echo '<li class="active"><a href="#">Search <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href="search.php">Search</a></li>';
    }

    //if dashboard.php 
    if($pagename == 'dashboard.php' || $pagename == 'work.php'){
        echo '<li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href="dashboard.php">Dashboard</a></li>';
    }

    //if analyst.php 
    if($pagename == 'analysis.php' || $pagename == 'an_work.php'){
        echo '<li class="active"><a href="#">Analysis <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href="analysis.php">Analysis</a></li>';
    }

    //if dietplan.php 
    if($pagename == 'dietplan.php' || $pagename == 'costomized_diet.php'){
        echo '<li class="active"><a href="#">DietPlan <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href="dietplan.php">DietPlan</a></li>';
    }

    // if($pagename == "index.php")
    //     <li class="active"><a href="#">Index <span class="sr-only">(current)</span></a></li>
    //     <li><a href="search.php">Search</a></li>
    //     <li><a href="stock.php">Stock</a></li>
    //     <li><a href="recommend.php">Recommend</a></li>
    
    echo '</ul>';


    ?>