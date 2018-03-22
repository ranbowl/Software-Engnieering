

<?php

    session_start();

    if(!empty($_GET['q']))
    {
        include('dbConnector.php');

        $q=$_GET['q'];
        $query="SELECT userid,username,email FROM user WHERE userid LIKE '%$q%' OR username LIKE '%$q%' OR email LIKE '%$q%' ";
        $result=mysqli_query($connect,$query);
        if($result==false){
            echo "Mysql query failed. ";
        }

        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username'];

            echo '<div class="table-responsive"><table class="table table-hover">';
            while($output=mysqli_fetch_assoc($result))
            {
                    $friendid=$output['userid'];
                    $friend_qry="SELECT friendid FROM user_friend WHERE uid='$userid' AND friendid='$friendid' limit 1";
                    $friend_result = mysqli_query($connect,$friend_qry);
                    echo "<tr><td><a href='profile.php?u=".$output['userid']."'>" .$output['userid']. "</a></td>";
                    echo "<td><a href='profile.php?u=".$output['userid']."'>".$output['username']."</a></td>";
                    echo "<td>Email: <a href='mailto:".$output['email']."'>",$output['email'],"</a></td>";
                    //button
                    // if(mysqli_num_rows($friend_result)==1){
                    //     echo '<td><div id="addbutton" ><button type="button" onclick="loadRemDoc('.$friendid.')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Remove</button></div></td>';
                    // }
                    // else{
                    //     echo '<td><div id="addbutton" ><button type="button" onclick="loadAddDoc('.$friendid.')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button></div></td>';
                    // }
                    // echo "</tr>";
                

            }//end while
            echo "</table></div>";

        }
    }

    
    ?>


    <!--add to user button javascript begins-->
    <script>
        function loadAddDoc(friendid) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("addbutton").innerHTML = '<button type="button" onclick="loadRemDoc('+friendid+')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Remove</button>';
                //   document.getElementById("Alert").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "./classes/addfriend.php?friendid="+friendid+"&ope=add", true);
            xhttp.send();
        }
        function loadRemDoc(friendid) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("addbutton").innerHTML = '<button type="button" onclick="loadAddDoc('+friendid+')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button>';
                    //   document.getElementById("Alert").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "./classes/addfriend.php?friendid="+friendid+"&ope=remove", true);
            xhttp.send();
        }
    </script>
    <!--add to user button ends-->

