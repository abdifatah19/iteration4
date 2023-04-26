<?php
#start the session here


 #Database connection file
 include "db_conn.php";


//chech if the category name is inserted
if(isset($_POST['category_name'])){

    #Get data from post request 
    $name = $_POST['category_name'];

    #Validation
    if (empty($name)) {
        $em ="The category name is required";
        header("Location: ../add-category.php?error=$em");
        exit;
    }else{
        #insert into the Database
        $sql  = "INSERT INTO catagories (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);
        
		     if ($res) {
                # success message
                $sm = "Successfully created!";
               header("Location: ../add-category.php?success=$sm");
               exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
               header("Location: ../add-category.php?error=$em");
               exit;
            }

    }
    }else{
        header("Location: adHome.php");
        exit;
    }
