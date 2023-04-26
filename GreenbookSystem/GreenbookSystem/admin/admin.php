<?php
session_start();
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];


$errors=array();
if(empty($username)){
    $errors['e']="Username is Required";
    
}
if(empty($password)){
    $errors['p']="Password is Required";
    
}
if(count($errors)==0){

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
            
            echo "<script>alert('Login successful..)</script>";
            header("location: adHome.php");
            
          
           
        }else {
            echo "<script>alert('Invalid Password')</script>"; 
   
        
    }
}else 
echo "<script>alert('Invalid Username')</script>";

   }
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
       
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
    
    <body>
            <div class="loginbox"><br>
            <div class ="img_container"><img src="pic.jpg"/>
            </div>
            <h1>Admin Login</h1><br>
            <form action="#" method="post">
                <p>User Name</p>
                <input type = "txt" name = "username" placeholder="Enter Your User Name" id ="username">
                <p class="text-danger"<span style="color:red"><?php if(isset($errors['e'])) echo $errors['e']
                ;?></span></p>
                <p>Password</p>
                <input type = "password" name = "password" placeholder="Enter Your Password" id ="password"> </br></br> 
                <p class="text-danger"<span style="color:red"><?php if(isset($errors['p'])) echo $errors['p']
                ;?></span></p>
                <button type ="submit" name="submit" value="submit">Login</button></br>
               
               </form>

          
        </div>
    </body>
    </head>
</html>


