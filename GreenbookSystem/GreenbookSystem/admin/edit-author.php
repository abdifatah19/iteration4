<?php
#start the session here


 #Database connection file
 include "db_conn.php";


//chech if the category name is inserted
if(isset($_POST['author_name']) &&
   isset($_POST['author_id'])){

    #Get data from post request 
    $name = $_POST['author_name'];
    $id = $_POST['author_id'];
    


    #Validation
    if (empty($name)) {
        $em ="Author name is required";
        header("Location: ../edit-author.php?error=$em&id=$id");
        exit;
    }else{
        #Update the info in Database
        $sql  = "UPDATE author SET name=? 
                  WHERE id=?";
		$stmt = $conn->prepare($sql);
		$res  = $stmt->execute([$name, $id]);
        
		     if ($res) {
                # success message
                $sm = "Successfully Updated!";
               header("Location: ../edit-author.php?success=$sm&id=$id");
               exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
               header("Location: ../edit-category.php?error=$em&id=$id");
               exit;
            }

    }
    }else{
        header("Location: adHome.php");
        exit;
    }
