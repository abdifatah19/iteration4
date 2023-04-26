<?php
#start the session here


 #Database connection file
 include "db_conn.php";


//chech if the book id is inserted
if (isset($_GET['id'])) {

    #Get data from get request 
    $id = $_GET['id'];
 

    #Validation
    if (empty($id)) {
        $em ="Error Occured";
        header("Location: adHome.php?error=$em");
        exit;
    }else{

        #Get the book info from the database 
        $sql2  = "SELECT * FROM book
                 WHERE id=?";
         $stmt2 = $conn->prepare($sql2);
         $stmt2->execute([$id]);
         $the_book = $stmt2->fetch();

         if($stmt2->rowCount() > 0){
            
            #Delete the book info from Database
            $sql  = "DELETE from book
                     WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$id]);

                    
            if($res){

                $cover = $the_book['cover'];
                $file = $the_book['file'];

                $c_b_c = "../uploads/cover/$cover";
                $c_f = "../uploads/files/$file";
                
                unlink($c_b_c);
                unlink($c_f);


			     	# success message
			     	$sm = "Successfully deleted!";
					header("Location: adHome.php?success=$sm");
		            exit;
			     }else{
			     	# Error message
			     	$em = "Unknown Error Occurred!";
					header("Location: adHome.php?error=$em");
		            exit;
			     }
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