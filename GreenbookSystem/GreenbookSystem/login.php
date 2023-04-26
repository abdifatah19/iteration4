<?php
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

$errors=array();
if(empty($email)){
    $errors['e']="Email is Required";
    
}
if(empty($password)){
    $errors['p']="Password is Required";
    
}
if(count($errors)==0){

//Database connection
$connection= new mysqli('localhost', 'root', 'Farxaan143!','GreenBookSystem');
if($connection->connect_error){
die ("Failed to connect: ".$connection->connect_error);
}
else {
    $stmt = $connection->prepare("select * from register where email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if ($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if ($data['password']===$password){
            echo "<script>alert('Login successful..)</script>";
            header("location: index.php");
        
        }else {
        echo "<script>alert('Invalid Password')</script>";       
    }
}else{
    echo  "<script>alert('Invalid Username')</script>";
     }
   }
 }
}
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        
    
    <body>
        <div class="loginbox">  <br>
        <div class ="img_container"><img src="images\pic.jpg"/>
         </div>
            <h1>User Login</h1>
            <form method="post">
                <input type = "email" name = "email" placeholder="Enter Your Email" id ="email">
                <p class="text-danger"<span style="color:red"><?php if(isset($errors['e'])) echo $errors['e']
                ;?></span></p>
                <input type = "password" name = "password" placeholder="Enter Your Password" id ="password"> </br></br> 
                <p class="text-danger"<span style="color:red"><?php if(isset($errors['p'])) echo $errors['p']
                ;?></span></p>
                <button type ="submit" name="submit" value="submit"> Login</button></br>
                
                <p> New member?<a href="reg.php">Sign Up</a>
            
                </form>
      
            </div>

          
        </div>
    </body>
    </head>
</html>


