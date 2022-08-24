<html>
    <body>
    <?php
        $dbHostName="127.0.0.1";
        $dbUserName="root";
        $dbPassword="";
        $dbName="carwash_db";
        $connection =mysqli_connect( $dbHostName,$dbUserName,$dbPassword,$dbName);
        if(!$connection){
            echo "Connection failed: ".mysqli_connect_error();
            exit;
        }
        $place=$_POST['place'];
        $num=$_POST['num'];

         $sqlquery = "SELECT * FROM place where places='$place' AND num='$num'";
        $result = mysqli_query($connection,$sqlquery);
        
        $row=mysqli_fetch_assoc($result);
        if(isset($row['places']) || isset($row['num'])){
            echo "<div style='margin-top:15%;text-align:center;'>";
            echo "<center>The Service is already available in your place</center>";
            echo "<center><h4>Back to <a href='adminpanel.html'>Adminpanel</a></h4></center>";
            echo "</div>";

        }

        else{
            $sqlquery = "INSERT INTO place (places,num) VALUES ('$place','$num')";
        $result = mysqli_query($connection,$sqlquery);
        if(!$result){
            echo "ERROR:".mysqli_error($connection);
            exit;
        }
        echo "<div style='margin-top:15%;text-align:center;'>";
        echo "<b>",$num,"</b> services in the place <b>",$place,"</b> are added into the database";
        echo "</div>";
        echo " <div style='text-align:center;'>
        <p><a href='adminpanel.html'>Back To Home</a> </p>
    </div>";


        }

        
        mysqli_close($connection);

        ?>
       

    </body>
</html>