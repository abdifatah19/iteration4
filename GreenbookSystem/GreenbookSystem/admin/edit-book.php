<?php
#start the session here


 #Database connection file
 include "db_conn.php";

  #Validation function
  include "function-validation.php";

   #File upload function
   include "../Func-file-upload.php";



//chech if the category name is inserted
 if(isset($_POST['book_id']) &&
    isset($_POST['book_tittle']) &&
    isset($_POST['book_cost'])      &&
    isset($_POST['book_edition'])   &&
    isset($_POST['book_pubPlace'])  &&
    isset($_POST['book_author'])    &&
    isset($_POST['book_category'])  &&
    isset($_FILES['book_cover'])    &&
    isset($_FILES['file'])          &&
    isset($_POST['current_cover'])  &&
    isset($_POST['current_file'])){

   #Get data from post request 
   $id = $_POST['book_id'];
   $tittle = $_POST['book_tittle'];
   $cost = $_POST['book_cost'];
   $edition = $_POST['book_edition'];
   $pubPlace = $_POST['book_pubPlace'];
   $author = $_POST['book_author'];
   $category = $_POST['book_category'];
   $current_cover = $_POST['current_cover'];
   $current_file = $_POST['current_file'];


    #Validations
    $text ="Book tittle";
    $location= "../edit-book.php";
    $ms ="id=$id&error";

        is_empty($tittle, $text, $location, $ms, "");

    $text ="Book cost";
    $location= "../edit-book.php";
    $ms ="id=$id&error";

        is_empty($cost, $text, $location, $ms, "");

    $text ="Book edition";
    $location= "../edit-book.php";
    $ms ="id=$id&error";

        is_empty($edition, $text, $location, $ms, "");

    $text ="Book pubPlace";
    $location= "../edit-book.php";
    $ms ="id=$id&error";

        is_empty($pubPlace, $text, $location, $ms, "");


    $text ="Book author";
    $location= "../edit-book.php";
    $ms ="id=$id&error";

        is_empty($author, $text, $location, $ms, "");


    $text ="Book category";
    $location= "../edit-book.php";
    $ms ="id=$id&error";

        is_empty($category, $text, $location, $ms, "");


        #Update book cover and the book file 
        if(!empty($_FILES['book_cover']['name'])){


            if(!empty($_FILES['file']['name'])){

                #Book cover uploading
                $allowed_image_exs = array("jpg", "jpeg", "png");
                $path = "cover";
                $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

                #file uploading
                $allowed_file_exs = array("pdf", "docx", "pptx");
                $path = "files";
                $file = upload_file($_FILES['file'], $allowed_file_exs, $path);


                #if there is error while uploading redirect to ../edit-book.php and print error messae
                

                if ($book_cover['status'] == "error" ||
                     $file['status'] == "error" ) {
                        $em = $book_cover['data'];



                        header("Location:../edit-book.php?error=$em&id=$id");

                            exit;  
        
                } else {
                    
                        #book cover location
                        $current_book_cover = "../uploads/cover/$current_cover";

                        #Book files location
                        $current_book_file = "../uploads/files/$current_file";


                        #Remove the current book cover and file
                        unlink($current_book_cover);
                        unlink($current_book_file);

                         #Get the new file name and cover name
                         $file_URL = $file['data'];
                         $book_cover_URL = $book_cover['data'];

                         #Update the data
                         $sql="UPDATE book 
                               SET tittle=?,
                                    author_id=?,
                                    cost=?,
                                    edition=?,
                                    pubPlace=?,
                                    category_id=?,
                                    cover=?,
                                    file=?
                                WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $res  = $stmt->execute([$tittle ,$author, $cost, $edition, $pubPlace, $category,
                                                $book_cover_URL, $file_URL, $id]);
                
                            
                         if ($res) {
                                # success message
                                $sm = "Successfully Updated!";
                            header("Location: ../edit-book.php?success=$sm&id=$id");
                            exit;
                        }else{
                                # Error message
                                $em = "Error Occurred!";
                            header("Location: ../edit-book.php?error=$em&id=$id");
                            exit;
                        
            
                        }
                         
                                
                            }

                    }else{

                              #Update the book cover only
                              #Book cover uploading
                            $allowed_image_exs = array("jpg", "jpeg", "png");
                            $path = "cover";
                            $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

                           
                               #if there is error while uploading redirect to ../edit-book.php and print error message
                            if ($book_cover['status'] == "error"){
                                    $em = $book_cover['data'];



                                    header("Location:../edit-book.php?error=$em&id=$id");

                                        exit;  
                    
                } else {
                    
                           #book cover location
                        $current_book_cover = "../uploads/cover/$current_cover";

                       
                            #Remove the current book cover
                        unlink($current_book_cover);
                       

                         #Get the new  cover name
                        
                         $book_cover_URL = $book_cover['data'];

                         #Update the data
                         $sql="UPDATE book 
                               SET tittle=?,
                                    author_id=?,
                                    cost=?,
                                    edition=?,
                                    pubPlace=?,
                                    category_id=?,
                                    cover=?
                              WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $res  = $stmt->execute([$tittle ,$author, $cost, $edition, $pubPlace, $category,
                                                $book_cover_URL, $id]);
                
                            
                         if ($res) {
                                # success message
                                $sm = "Successfully Updated!";
                            header("Location: ../edit-book.php?success=$sm&id=$id");
                            exit;
                        }else{
                                # Error message
                                $em = "Error Occurred!";
                            header("Location: ../edit-book.php?error=$em&id=$id");
                            exit;
                        
            
                        }
                         
                                
                            }

                        }

                    }else if($_FILES['file']['name']){

                        #update online the book file
                                    #Book cover uploading
                                    $allowed_file_exs = array("pdf", "docx", "pptx");
                                    $path = "files";
                                    $file = upload_file($_FILES['file'], $allowed_file_exs, $path);
        
                                   
                                       #if there is error while uploading redirect to ../edit-book.php and print error message
                                    if ($file['status'] == "error"){
                                            $em = $file['data'];
        
        
        
                                            header("Location:../edit-book.php?error=$em&id=$id");
        
                                                exit;  
                            
                        } else {
                            
                                   #book cover location
                             ######
                                $current_book_file = "../uploads/files/$current_file";
        
                               
                                    #Remove the current  file
                                unlink($current_book_file);
                               
        
                                 #Get the new  cover name
                                
                                 $file_URL = $file['data'];
        
                                 #Update the data
                                 $sql="UPDATE book 
                                       SET tittle=?,
                                            author_id=?,
                                            cost=?,
                                            edition=?,
                                            pubPlace=?,
                                            category_id=?,
                                            file=?
                                      WHERE id=?";
                                $stmt = $conn->prepare($sql);
                                $res  = $stmt->execute([$tittle ,$author, $cost, $edition, $pubPlace, $category,
                                                        $file_URL, $id]);
                        
                                    
                                 if ($res) {
                                        # success message
                                        $sm = "Successfully Updated!";
                                    header("Location: ../edit-book.php?success=$sm&id=$id");
                                    exit;
                                }else{
                                        # Error message
                                        $em = "Error Occurred!";
                                    header("Location: ../edit-book.php?error=$em&id=$id");
                                    exit;
                                
                    
                                }
                                 
                            }

                    }else{
                
                    $sql="UPDATE book 
                        SET tittle=?,
                            author_id=?,
                            cost=?,
                            edition=?,
                            pubPlace=?,
                            category_id=? 
                            WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $res  = $stmt->execute([$tittle ,$author, $cost, $edition, $pubPlace, $category, $id]);

                        
                        if ($res) {
                            # success message
                                $sm = "Successfully Updated!";
                            header("Location: ../edit-book.php?success=$sm&id=$id");
                            exit;

                        }else{
                            # Error message
                            $em = "Error Occurred!";
                            header("Location: ../edit-book.php?error=$em&id=$id");
                            exit;
                        }

                        }
                    
                
                }else{
                    header("Location: adHome.php");
                    exit;
                }
