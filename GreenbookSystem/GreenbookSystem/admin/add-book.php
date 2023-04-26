<?php
#start the session here


    #Database connection file
    include "db_conn.php";

    #Validation function
    include "function-validation.php";

    #File upload function
    include "../Func-file-upload.php";




if(isset($_POST['book_tittle']) &&
    isset($_POST['book_cost'])      &&
    isset($_POST['book_edition'])   &&
    isset($_POST['book_pubPlace'])  &&
    isset($_POST['book_author'])    &&
    isset($_POST['book_category'])  &&
    isset($_FILES['book_cover']) &&
    isset($_FILES['file'])
    ){

    #Get data from post request 
        $tittle = $_POST['book_tittle'];
        $cost = $_POST['book_cost'];
        $edition = $_POST['book_edition'];
        $pubPlace = $_POST['book_pubPlace'];
        $author = $_POST['book_author'];
        $category = $_POST['book_category'];

        $user_input='tittle='.$tittle. '&cost='. $cost. '&edition=' .$edition. '&pubPlace='.$pubPlace. '&author_id='.$author.
 '&category_id=' .$category;

        #Validations
        $text ="Book tittle";
        $location= "../add-book.php";
        $ms ="error";

            is_empty($tittle, $text, $location, $ms,$user_input);

        $text ="Book cost";
        $location= "../add-book.php";
        $ms ="error";

            is_empty($cost, $text, $location, $ms,$user_input);
        
        $text ="Book edition";
        $location= "../add-book.php";
        $ms ="error";

              is_empty($edition, $text, $location, $ms,$user_input);
        
        $text ="Book pubPlace";
        $location= "../add-book.php";
        $ms ="error";

              is_empty($pubPlace, $text, $location, $ms,$user_input);

        
        $text ="Book author";
        $location= "../add-book.php";
        $ms ="error";

             is_empty($author, $text, $location, $ms,$user_input);

        
        $text ="Book category";
        $location= "../add-book.php";
        $ms ="error";

             is_empty($category, $text, $location, $ms,$user_input);

                #Book cover uploading
                $allowed_image_exs = array("jpg", "jpeg", "png");
                $path = "cover";
                $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);


                if ($book_cover['status'] == "error") {
                    $em = $book_cover['data'];
                header("Location:../add-book.php?error=$em&$user_input");

                  exit;  
    
             } else {
                #Upload the file
                    $allowed_file_exs = array("pdf", "docx", "pptx");
                    $path = "files";
                    $file = upload_file($_FILES['file'], $allowed_file_exs, $path);

                if ($file['status'] == "error") {
                     $em = $file['data'];
                     
                     header("Location: ../add-book.php?error=$em&$user_input");
		    	        exit;
		          }else {
		    	
                    #Get the new file name and cover name
                        $file_URL = $file['data'];
                        $book_cover_URL = $book_cover['data'];

                    
                    #Data insersion
                    $sql  = "INSERT INTO book (tittle,
                                                author_id,
                                                cost,
                                                edition,
                                                pubPlace,
                                                category_id,
                                                cover,
                                                file)
                            VALUES (?,?,?,?,?,?,?,?)";
                        $stmt = $conn->prepare($sql);
                        $res  = $stmt->execute([$tittle ,$author, $cost, $edition, $pubPlace, $category, $book_cover_URL, $file_URL]);

                if ($res) {
                        # Print sucess message 
                        $sm = "The book successfully created!";
                    header("Location: ../add-book.php?success=$sm");
                    exit;
                }else{
                        # print error message
                        $em = "Unknown Error Occurred!";
                    header("Location: ../add-book.php?error=$em");
                    
                    exit;
                }
            }
  
        }
        }else{
                header("Location: adHome.php");
                exit;
        }
