<?php
#start the session here


 #Database connection file
 include "db_conn.php";


//chech if the category id is inserted
if (isset($_GET['id'])) {

    #Get data from get request 
    $id = $_GET['id'];
 

    #Validation
    if (empty($id)) {
        $em ="Error Occured";
        header("Location: adHome.php?error=$em");
        exit;
    }else{

            #Delete the category info from Database
            $sql  = "DELETE from catagories
                     WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$id]);

            if($res){

			     	# success message
			     	$sm = "Successfully deleted!";
					header("Location: adHome.php?success=$sm");
		            exit;
			  
			 }else {
			 	$em = "Error Occurred!";
			    header("Location: adHome.php?error=$em");
                exit;
			 }
             
		}
	}else {
      header("Location: adHome.php");
      exit;
	}