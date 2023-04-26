<!--<html>-->
<!--  <head>-->
<!--    <title>Sell Used Books</title>-->
<!--	<meta charset="UTF-8">-->
<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--	<link rel="stylesheet" type="text/css" href="css/sell.css">-->
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="css/index.css">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    
   
<!--<script src="js/bootstrap.min.js"></script>-->


          <link rel="stylesheet" type="text/css" href="css/sell.css">
    <style>
      /* Styles for the book search form */


      form {
        margin: 20px;
        display: flex;
        justify-content: center;
        justify-content:flex-end
      }
      input[type="text"] {
        padding: 10px;
        font-size: 16px;
        border: 2px solid #ccc;
        border-radius: 5px;
        width: 50%;
        margin-right: 10px;
      }
      input[type="submit"] {
        padding: 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
      .sell-button {
        padding: 10px;
        font-size: 16px;
        background-color: #008CBA;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        justify-content: center;
        justify-content:flex-end
      }

      .sell-button:hover {
        background-color: #00698C;
      }
    </style>
    

   
      <div class="container">
		<h1>How Does Selling Books Online Work?</h1>
		<div class="steps">
		  <div class="step">
			<img src="images/searchICon.jpg" alt="Find Your Book">
			<p>Find Your Book</p>
		  </div>
		  <div class="step">
			<img src="images/shipping.png" alt="Ship for Free">
			<p>Ship for Free</p>
		  </div>
		  <div class="step">
			<img src="images/money.png" alt="Get Cash for Your Books">
			<p>Get Cash for Your Books</p>
		  </div>
		</div>
		<p>The shipping costs are covered: we provide a printable shipping label, and you attach it to your package.</p>
		<p>Receive the payment promptly by check or PayPal after your order has been processed.</p>


    <h1 style="color: #3e8e41;">Sell Books For Cash</h1>
    <form>
      <input type="text" id="book-search" placeholder="Search for a book...">
      <div>
      <input type="submit" value="Search">
      </div>
    </form>
    <div id="book-results"></div>
    <script>
      // JavaScript code for the book search form
      const apiKey = 'AIzaSyCnZuXAxkMskdtVdOyZpDCo4R1d5Hw64gY';
      const apiUrl = 'https://www.googleapis.com/books/v1/volumes';

      const form = document.querySelector('form');
      form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission behavior
        const searchInput = document.querySelector('#book-search');
        const searchQuery = searchInput.value;
        const queryUrl = `${apiUrl}?q=${searchQuery}&key=${apiKey}`;
        fetch(queryUrl)
          .then(response => response.json())
          .then(data => {
              console.log("data", data);
            const bookResults = document.querySelector('#book-results');
            bookResults.innerHTML = ''; // Clear previous search results
            data.items.forEach(item => {
              const bookTitle = item.volumeInfo.title;
              const bookAuthors = item.volumeInfo.authors;
              const bookImage = item.volumeInfo.imageLinks?.thumbnail;
              const bookISBN = item.volumeInfo.industryIdentifiers ? item.volumeInfo.industryIdentifiers[0].identifier : 'N/A';
              const bookPublisher = item.volumeInfo.publisher || 'N/A';
              const bookFormat = item.volumeInfo.printType || 'N/A';
              const bookInfo = `
                <div>
                  <h2>${bookTitle}</h2>
                  <p>By ${bookAuthors}</p>
                  <img src="${bookImage}" alt="${bookTitle} cover" style="; margin-right:10px;">
                  <p><strong>ISBN:</strong> ${bookISBN}</p>
                  <p><strong>Publisher:</strong> ${bookPublisher}</p>
                  <p><strong>Format:</strong> ${bookFormat}</p>
                  <a href="cart.php?title=${bookTitle}&author=${bookAuthors}" class="sell-button add-to-cart" data-name="${bookTitle}"  data-author="${bookAuthors}">Sell</a>
            </div>
              `;
              bookResults.insertAdjacentHTML('beforeend', bookInfo); // Add book information to search results 
            });
            // Add event listener for sell button clicks
        //   const sellButtons = document.querySelectorAll('.sell-button');
        //   sellButtons.forEach(button => {
        //      button.addEventListener('click', () => {
        //      const bookTitle = button.dataset.name;
        //      const bookAuthors = button.dataset.authors;
        //      localStorage.setItem('selectedBook', bookTitle);
             
        //     // Redirect to cart page with book title as parameter 
        //      window.location.href = `cart.php?title=${encodeURIComponent(bookTitle)}&&author=${encodeURIComponent(JSON.stringify(bookAuthors))}`;
        //   });
        // });  
          })
          .catch(error => console.error(error));
      });
      
     
    </script>
  
<section id="customer-reviews">
    <h2>Our Customers Love Us</h2>
    <p>Our customers can’t be wrong. Green Book System is the best place to sell books online. For every book sold to Green Book System, we pay back with cash and a great user experience.</p>
  
    <div class="customer-review">

      <h2>Jack</h2>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>

      <p class="review-date">09 Mar 2023</p>
      <p>I appreciate the fast turn-around on order process...</p>
    </div>
  
    <div class="customer-review">
        <h2>Najmo</h2>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
      <p class="review-date">09 Mar 2023</p>
      <p>Things were good. Book shipped quickly</p>
    </div>
  
    <div class="customer-review">
        <h2>Hamdi</h2>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
      <p class="review-date">09 Mar 2023</p>
      <p>Great price. Fast delivery. Books in condition des...</p>
    </div>
  
    <div class="customer-review">
        <h2>Zaki</h2>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
      <p class="review-date">09 Mar 2023</p>
      <p>very fast, very efficient, very good price, very e...</p>
    </div>
  </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.16.0/umd.popper.min.ks"></script>
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>

