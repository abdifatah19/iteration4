<?php
$username=$_POST['username'];
$password=$_POST['password'];

//Database connection
$connection= new mysqli('localhost', 'nimco', 'Farxaan143!','GreenBookSystem');
if($connection->connect_error){
die ("Failed to connect: ".$connection->connect_error);
}
else {
    $stmt = $connection->prepare("select * from admin where username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if ($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if ($data['password']===$password){
            echo"<h2>Login Successfully</h2>";
            header("location: adpanel.php");
            
          
           
        }else {
        echo"<h2>Invalid Username or Password </br>Please Try Again!</h2>";
   
        
    }
}else 
echo "<h2>Invalid Username or Password</h2>";

}
?>