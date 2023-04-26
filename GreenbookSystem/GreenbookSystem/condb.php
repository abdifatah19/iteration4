<?php
 
$fname=$_POST['fname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];

//Database connection
$conn= new mysqli("localhost", "nimco", "Farxaan143!","GreenBookSystem");
if($conn->connect_error){
die ("Failed to connect: ".$con->connect_error);
}
else {
    $stmt = $conn->prepare("insert into contact(fname,phone,email,message)
    values(?,?,?,?)");
    $stmt->bind_param("ssss",$fname,$phone,$email,$message);
    $stmt->execute();
    echo "Message sent Successfully...";
    $stmt->close();
    $conn->close();
 
}

?>