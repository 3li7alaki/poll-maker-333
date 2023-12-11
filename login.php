<?php
session_start();

require("connection.php");

try{

    $pass = $_POST['pass'];
    $email =$_POST['email'];

    $sql = "SELECT * FROM users WHERE Email='$email'";
    $rs=$db->query($sql);


    if($rs==0){
        die("User don't exist");
    }
    $row= $rs->fetch(PDO::FETCH_BOTH);
    

       if(password_verify($pass,$row[3]) ){


       $_SESSION['true']=$row[0];
       header("location:main.php");

        
       }else{

        echo"
        <Script>
        alert('Password is invalid');
        </Script>";

       }


}catch(PDOException $e){
    die($e->getMessage());
}


?>