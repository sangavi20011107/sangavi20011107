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

        $sqlquery = "SELECT * FROM place";
        $result = mysqli_query($connection,$sqlquery);
        
        //$row=mysqli_fetch_assoc($result);
        
        if($result->num_rows>0){
            
            while($row=mysqli_fetch_assoc($result)){
                
            
                echo "<div style='text-align:center'>","Place : <b>",$row['places'],"</b>  ","Services Available : <b>",$row['num'],"</b></div><br>";
                
            }
            echo " <div style='text-align:center;'>
        <p><a href='adminpanel.html'>Back To Home</a> </p>
    </div>";
    echo " <div style='text-align:center;'>
    <p><a href='login.html'>LOGOUT</a> </p>
</div>";
            
            
           
        }
        else{
                echo "no tutors are available";
            }
       
        mysqli_close($connection);
        ?>
       

    </body>
</html>