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
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sqlquery = "SELECT * FROM userdata where username='$username' AND password='$password'";
        $result = mysqli_query($connection,$sqlquery);
        
        $row=mysqli_fetch_assoc($result);
        if(isset($row['username']) || isset($row['password'])){
            echo '<script type="text/JavaScript"> 
     alert("username already exists!");
     </script>';

        }

        else{

            $sqlquery = "INSERT INTO userdata (username,password) VALUES ('$username','$password')";
            $result = mysqli_query($connection,$sqlquery);
            if(!$result){
                echo "ERROR:".mysqli_error($connection);
                exit;
            }
            header("Location:interface.php");

        }

       
        mysqli_close($connection);
        ?>
        <p><a href="login.html">Login</a> to continue</p> 

    </body>
</html>