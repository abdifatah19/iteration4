<?php
$con= new mysqli('localhost', 'root', 'Farxaan143!','GreenBookSystem');
if(isset($_POST['insert'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $errors=array();

    $fn="select fname from register where fname='$fname'";
    $fnn=mysqli_query($con,$fn);

    $ln="select lname from register where lname='$lname'";
    $lnn=mysqli_query($con,$ln);

    $ph="select phone from register where phone='$phone'";
    $phh=mysqli_query($con,$ph);

    $e="select email from register where email='$email'";
    $ee=mysqli_query($con,$e);


    if(empty($fname)){
        $errors['fn']="First Name is Required";
        
    }
    if(empty(  $lname)){
        $errors['ln']="Last Name is Required";
        
    }
    if(empty($phone)){
        $errors['ph']="Phone Number is Required";
        
    }


    if(empty($email)){
        $errors['e']="Email is Required";
        
    }else if(mysqli_num_rows($ee) > 0){
        $errors['e'] = "Email Exist";
    }

    

   
    if(empty($password)){
        $errors['p']="Password is Required";
        
    }

    if(count($errors)==0){
        $query="INSERT INTO register(fname,lname,phone,email,password) 
        values('$fname','$lname','$phone','$email','$password')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<script>alert('Registration Successful...')</script>";
        }else{
            echo  "<script>alert('failed')</script>";
        }
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
       
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css"
    </head>
    <body>
        <div class ="container-fluid">
        <div class = "col-md-12">
        <div class = "row">
            <div class = "col-md-3"></div>
            <div class= "col-md-6 jumbtron bg-info">
           
            <form method="post">
                <div class ="form-group">
                    <h1>Registration form</h1>
                <p> First Name</p>
                <input type = "text" name = "fname" placeholder="Your first Name">
                <p class="text-danger"><?php if(isset($errors['fn'])) echo $errors['fn']
                ;?></p>
                <p> Last Name</p>
                <input type = "text" name= "lname" placeholder="Your last Name">
                 <!-- <p class="text-danger">?php if(isset($errors['ln'])) echo $errors['ln']
                ;?></p>-->
                <p>Phone Number</p>
                <input type = "number" name= "phone" placeholder="Phone Number">
                <p class="text-danger"><?php if(isset($errors['ph'])) echo $errors['ph']
                ;?></p>
                <p> Email</p>
                <input type = "email" name= "email" placeholder="Email">
                <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e']
                ;?></p>
                <p> Password</p>
                <input type = "password" name = "password" placeholder="Password"></br>    
                <p class="text-danger"><?php if(isset($errors['p'])) echo $errors['p']
                ;?></p>
                <button type ="submit" name="insert" value ="insert" class="btn_btn_success"> Sign Up</button>
                
                </div>

      
                </form>
                </div>
                <div class="col-md-3"></div> 
            </div>  
        </div>
    </body>
</html>
