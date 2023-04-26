<?php
#start the session here


 #Database connection file
 include "db_conn.php";


//chech if the category name is inserted
if(isset($_POST['category_name']) &&
   isset($_POST['category_id'])){

    #Get data from post request 
    $name = $_POST['category_name'];
    $id = $_POST['category_id'];
    


    #Validation
    if (empty($name)) {
        $em ="The category name is required";
        header("Location: ../edit-category.php?error=$em&id=$id");
        exit;
    }else{
        #Update the info in Database
        $sql  = "UPDATE catagories SET name=? 
                  WHERE id=?";
		$stmt = $conn->prepare($sql);
		$res  = $stmt->execute([$name, $id]);
        
		     if ($res) {
                # success message
                $sm = "Successfully Updated!";
               header("Location: ../edit-category.php?success=$sm&id=$id");
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
