<?php
#start the session here


 #Database connection file
 include "db_conn.php";


//chech if the author name is inserted
if(isset($_POST['author_name'])){

    #Get data from post request 
    $name = $_POST['author_name'];

    #Validation
    if (empty($name)) {
        $em ="The author name is required";
        header("Location: ../add-author.php?error=$em");
        exit;
    }else{
        #insert into the Database
        $sql  = "INSERT INTO author (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);
        
		     if ($res) {
                # success message
                $sm = "Successfully created!";
               header("Location: ../add-author.php?success=$sm");
               exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
               header("Location: ../add-author.php?error=$em");
               exit;
            }

    }
    }else{
        header("Location: adHome.php");
        exit;
    }
