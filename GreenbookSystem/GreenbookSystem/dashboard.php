<!DOCTYPE html>
<html>
<head>
        <title>GREEN BOOK SYSTEM</title>
        <meta charset="UTF-8">
        <meta html-equiv="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet"href="css/index.css">

        <style>
            .item:hover {
                background-color: lightgreen;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Green Book System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Books
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Rent/Buy</a>
                     <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Return a book</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Sell used books</a>
                  </div>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Discussion Forum <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="about.php">About<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="contact.php">Contact Us<span class="sr-only">(current)</span></a>
                </li>
              </ul>
              <form method="GET" action="searchbook.php" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search here to BUY, RENT....." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">Search</button>
                <<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.php">User</a>
                     <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="admin/admin.php">Admin</a>
                  </div>
                </li>
              </form>
            </div>
        </nav>

        <div style="background:lightgreen" class="jumbotron jumbotron-fluid text-center">
            <?php
            echo "<h3>".$_GET['name']."'s Library</h3>";
            ?>
            <div>
                <p id="result">&nbsp;</p>
            </div>
        </div>

        <div id="library-items">

        </div>

        <script>
            var libItems = document.getElementById("library-items");
            var items = JSON.parse(sessionStorage.getItem("items"));
            var item;
            var itemCosts = [];
            for (var i = 0; i < items.length; i++) {
                item = items[i];
                parsedItem = JSON.parse(item);
                let cartItemContainer = document.createElement("div");
                cartItemContainer.setAttribute("class", "row d-flex justify-content-center");
                // cartItemContainer.setAttribute("class", "align-self-center");
                let cartItem = document.createElement("div");
                cartItem.setAttribute("class", "item d-flex align-items-end my-3 align-self-center");
                cartItemContainer.setAttribute("onmouseover", "doStuff(this);");
                cartItem.addEventListener("click", (event) => {
                    sessionStorage.setItem("index", i);
                    window.open("reader.html");
                })
                let imageDiv = document.createElement("div");
                imageDiv.setAttribute("class", "col-md")
                let image = document.createElement("img");
                image.setAttribute("class", "col align-self-start");
                let titleDiv = document.createElement("div");
                titleDiv.setAttribute("class", "col-md align-text-bottom");
                let titleP = document.createElement("p");


                image.src = "/GreenbookSystem/uploads/cover/" + parsedItem["cover"];
                libItems.append(cartItemContainer);
                cartItemContainer.append(cartItem);
                cartItem.append(imageDiv);
                imageDiv.append(image);
                cartItem.append(titleDiv);
                titleDiv.append(parsedItem["tittle"], titleP);
                console.log(i + "item: " + parsedItem["tittle"]);


            }
        </script>

</html>