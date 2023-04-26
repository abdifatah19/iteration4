<?php

?>
<!DOCTYPE html>
<html>
    <head>
       
        <title>Books</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css">
    </head>
    <body>
        <div class ="registerbox">
            
            <h1>Books</h1>
            <form action ="regdb.php" method="post">
                <p> ISBN</p>
                <input type = "text" name = "ISBN" placeholder="Book Number"required>
                <p> Book Title</p>
                <input type = "text" name= "Btitle" placeholder="Book Title">
                <p>Edition</p>
                <input type = "number" name= "edition" placeholder="Edition required">
                <p> Cost</p>
                <input type = "text" name = "cost" placeholder="Book cost"required></br>    
                <p> Publisher</p>
                <input type = "text" name = "pub" placeholder="Publisher Name"required></br>
                <button type ="submit">Add</button>
               
                
      
                </form>
        </div>
    </body>
</html>
