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
        $place=$_POST['plc'];

        $sqlquery = "SELECT * FROM place where places='$place'";
        $result = mysqli_query($connection,$sqlquery);

        $sqlupdatequery="UPDATE place SET num=num-1 where places='$place'";
        $updateresult=mysqli_query($connection,$sqlupdatequery);
        
        $row=mysqli_fetch_assoc($result);
        echo "<div style='display:flex;justify-content:center;text-align:center;'>";
        echo "<div style='text-align:center;position:absolute;top:25%;left:0;right:0;'>";
        echo "Place : ",$row['places'];
        echo "<br><br>";
        echo "No of Services availabe : ",$row['num'],"<br><br>";

        echo "</div>";
        echo "</div>";

        mysqli_close($connection);
        ?>
       <div style="text-align:center;margin-top:17%;">
       <button  type='button' onclick="func()">BOOK</button>
       </div>
       <div class="det" style="text-align:center;">
           <h3 id="res"></h3>
       </div>
     <div style="text-align:center;">
         <p><a href="interface.php">Back To Home</a> </p>
     </div>
     <div style='text-align:center;'>
    <p><a href='login.html'>LOGOUT</a> </p>
</div>
       
       <script>
           function func(){
               var b="Your booking is successfully completed!";
               var a=document.getElementById('res').innerHTML=b;
            
               
           }
       </script>
    </body>
</html>