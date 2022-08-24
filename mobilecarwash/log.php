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
        if($username=="admin" && $password=="123456"){
            header("Location:adminpanel.html");
        }
        else{

            if($row){
                header('Location: interface.php');
            }
            else{
                echo "Invalid Credintials";
            }
           
        }
       
        mysqli_close($connection);
        ?>
       

    </body>
</html>