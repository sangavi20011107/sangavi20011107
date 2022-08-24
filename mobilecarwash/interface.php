<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 style="text-align: center;">Welcome to Mobile Car Wash Services</h3>
    <h4 style="text-align: center;">Search the place to check the availability of services</h4>

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

    
        
        
        echo "<div class='form' style='text-align:center;margin-top:50px;margin-bottom:20px;'><form action='result.php' method='post' name='form1'><select style='padding:10px;' name='plc'>";
        while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..

            echo "<option>",$row['places'],"</option>";
        }
        echo "</select> <br><br><input type='submit' value='SEARCH' name='btn'></form></div>";
      //  echo "<div style='text-align:center;'><form><input type='submit' value='SEARCH' name='btn'></form></div>";

        

        
        mysqli_close($connection);
        ?>
       



</body>
</html>