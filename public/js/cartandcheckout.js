@keyframes fadeIn {
    from 
        {opacity: 0;
        transform: translateY(10px);}
    to 
        {opacity: 1;
        transform: translateY(0);}
}

.bag-item, .bag-summary, .checkout-button, button, .checkout-button {
    animation: fadeIn 1s ease-in-out;
}

.checkout-container, .checkout-container h1, .form-group , .form-group label, .place-order-button {
    animation: fadeIn 1s ease-in-out;
}

/*NAVBAR*/

.navbar {
    position: sticky;
    top: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #1a1a2e;
    padding: 30px 50px;
    z-index: 1000;
    flex-wrap: wrap;
  }

  .nav-links a.active {
    color: #FF5733;
  }
  
  .logo img {
    height: 80px;
    width: auto;
  }
  
  .nav-links {
    list-style: none;
    display: flex;
    gap: 30px;
  }
  
  .nav-links a {
    color: #e0e1dd;
    text-decoration: none;
    font-size: 20px;
    font-weight: 600;
  }
  
  .nav-links a::after {
    content: "";
    width: 0px;
    border-radius: 30%;
    height: 2px;
    background: #fff;
    display: block;
    margin: auto;
    transition: width 0.5s ease;
  }
  
  .nav-links a:hover::after,
  .nav-links a:focus::after {
    width: 50%;
  }
  
  .nav-links a:hover,
  .nav-links a:focus {
    color: #5dade2;
  }

  .highlight {
    color: #FF5733;
    font-weight: bold; 
}

/*BODY*/

.html, body {
    height: 100%;
    font-family: Arial, sans-serif;
    margin: 0;
    flex-direction: column;
    display:flex; 
    justify-content: center;
    background-image: url('images/background.webp');
    background-size: cover; 
    background-position: center;
    background-repeat: no-repeat; 
    background-attachment: fixed;
}
  
.discount {
    width: 100%;
    overflow: hidden;
    background-color: #dedfdf; 
    padding: 10px 0;
    display: flex;
    align-items: center;
}

.text-container {
    display: flex;
    gap: 100px; 
    animation: scroll 100s linear infinite; 
}

.text-container span {
    font-size: 18px;
    white-space: nowrap; 
}

/* scrolling animation */
@keyframes scroll {
    from {transform: translateX(100);
    }
    to {transform: translateX(-50%);
    }
}

/*BAG*/

.container {
    display: flex;
    flex-direction: column;
    padding-top: 2%;
    max-width: 90%;
    flex-wrap: nowrap;
    flex:1;
    overflow: auto;
}

select {
    padding: 5px;
    font-size: 16px;
    border-radius: 20px;
    text-align: center;
  }  

.item-form {
    margin-bottom: 20px;
    border-radius: 500px;
}

.item-form input,
.item-form select {
    width: 50%; 
    padding: 10px;
    color:black;
    font-size: 1rem;
    background-color: #1a1a2e;
    box-sizing: border-box; 
}

.item-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}


.bag-items {
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(22%, 1fr)); 
    gap: 30px; 
    padding: 20px;
}

.bag-item {
    background-color: #1a1a2e;
    padding: 15px;
    color:#fff;
    border-radius: 15px;
    text-align: center; 
    transition: transform 0.7s ease;
    padding-bottom: 30px;
    padding-top: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.bag-item:hover {
    transform: scale(1.03);
}

.bag-item img {
    max-width: 97%;
    height: auto;
    margin-bottom: 10px;
}

.bag-item-details {
    flex-grow: 1;
}

.bag-item-title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}

.bag-item-price {
    color: #FF5733;
    font-size: 20px;
    font-weight: bold;
}

.remove-item {
    background-color: #FF5733;
    color: white;
    border: none;
    padding: 15px 15px;
    cursor: pointer;
    margin-top: 10px;
    border-radius: 12px;
    transition: background-color 0.5s ease, transform 1s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.remove-item:hover {
    background-color: #b23f26;
}

.bag-summary {
    background-color: #1a1a2e;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    border-radius: 10px;
    font-size: 18px;
    width: 70%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 0px auto;
}

.bag-summary-title {
    font-size: 30px;
    font-weight: bold;
}

.bag-summary-item {
    width: 70%;
    margin: auto auto;
    padding-top: 20px;
    background-color: #fff;
    display: flex;
    flex-direction: column; 
    text-align: center;
}

.bag-summary-itemm {
    width: 70%;
    margin: auto auto;
    padding-top: 20px;
    background-color: #fff;
    display: flex;
    flex-direction: column; 
    text-align: center;
    border-bottom-left-radius:  10px;
    border-bottom-right-radius: 10px;
}


.checkout-button {
    font-size: 24px; 
    padding: 10px 30px; 
    background-color: #007a3e; 
    color: white; 
    border-radius: 5px; 
    border: none;
    width: 80%;
    margin: auto auto;
    display: inline-block;
    text-align: center;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.checkout-button:hover {
    background-color: #0eb561;
}

/*FAQ*/

.faq-section {
    padding: 5px;
    background-color: #1a1a2e;
}

.faq-dropdown input, .faq-items input {
    display: none; 
}

.faq-main {
    display: block;
    text-align: center;
    font-size: 25PX;
    font-weight: bold;
    color: #fff;
    padding: 20px;
    cursor: pointer;
    background-color: #1a1a2e;
    transition: background-color 0.3s ease;
}

.faq-main:hover, .faq-question:hover {
    background-color: #5dade2;
}

.faq-items {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease;
    text-align: center;
}

.faq-dropdown input:checked ~ .faq-items {
    max-height: 600px; 
}

.faq-question {
    display: block;
    padding: 15px;
    font-size: 1.2rem;
    font-weight: bold;
    cursor: pointer;
    background-color:#1a1a2e;
    color: white;
    transition: background-color 0.3s ease;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    padding: 0 15px;
    font-size: 15px;
    background-color: #1a1a2e;
    background-color: #fff;
}

.faq-item input:checked ~ .faq-answer {
    max-height: 300px; 
    padding: 15px;
}

/*checkout*/

.content-wrapper {
    display: flex;
    justify-content: center; 
    align-items: center; 
    min-height: calc(100vh - 120px);
    padding-bottom: 50px;
    padding-top: 10px;
}

.checkout-container {
    width: 80%;
    max-width: 600px;
    padding: 40px;
    border-radius: 8px;
    background-color: #fff;
}

.checkout-container h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group input,
.form-group select {
    width: 100%; 
    padding: 10px;
    color:#fff;
    font-size: 1rem;
    background-color: #1a1a2e;
    box-sizing: border-box; 
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.place-order-button {
    width: 100%;
    background-color: #007a3e;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 15px 30px;
    font-size: 30px;
    cursor: pointer;
    transition: background-color 0.5s ease, transform 1s ease;
}

.place-order-button:hover {
    background-color: #0eb561;
    transform: scale(1.05);
}

input:invalid, select:invalid {
    border: 3px solid red;
}

input:valid, select:valid {
    border: 3px solid green;
}

/* Featured Section */

.featured-products {
    text-align: center;
    width: 100%;
    padding: 20px;
    background-color: #f9f9f9; 
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
    box-sizing: border-box;
}

.featured-title h2 {
    font-size: 2rem;
    color: black;
    margin-bottom: 20px;
}

.product-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
    gap: 20px;
    justify-items: center; 
    width: 100%;
    box-sizing: border-box;
    padding-bottom: 2%;
}

.product {
    background-color: #1a1a2e;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); 
    text-align: center;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: auto;
}

.product:hover {
    transform: scale(1.05); 
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
}

.product img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    margin-bottom: 10px;
}

.product h3 {
    font-size: 18px;
    color: #fff;
    margin-bottom: 10px;
}

.product p {
    font-size: 18px;
    color: #FF5733;
    font-weight: bold;
}

/*FOOTER*/

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding-top: 20px 0;
  }

.footer-container {
    display: flex;
    justify-content: space-around; 
    align-items: flex-start;
    flex-wrap: wrap;
    padding: 20px;
}

.socials, .newsletter, .footer-nav {
    flex: 1 1 200px; 
    margin: auto;
    max-width: 100%;
}

.socials p, .newsletter h4 {
    font-weight: bold;
    margin-bottom: 10px;
}

.social-links img {
    height: 40px;
    margin: 0 5px;
    transition: transform 0.7s ease 
  }

.social-links img:hover {
    transform: scale(1.2);  
}

.newsletter input[type="email"] {
    padding: 8px 15px;
    width: 65%;
    border-radius: 8px;
    border: none;
    text-align: center;
}

.newsletter input[type="submit"] {
    padding: 8px 15px;
    background-color: #FF5733;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}

.newsletter input[type="submit"]:hover {
    background-color: #b23f26;
}

.footer-nav ul {
    list-style: none;
    text-align: center;
    padding: 0;
}

.footer-nav li {
    margin: 10px 0;
}

.footer-nav a {
    color: #e0e1dd;
    text-decoration: none;
    font-size: 16px;
}

.footer-nav a:hover {
    color: #5dade2;
}

.footer-nav a:hover::after,
.footer-nav a:focus::after {
    width: 10%;
}

.footer-nav a:hover,
.footer-nav a:focus {
    color: #5dade2;
}
  
.footer-nav a::after {
    content: "";
    width: 0px;
    border-radius: 50%;
    height: 3px;
    background: #ffffff;
    display: block;
    margin: auto;
    transition: width 0.5s ease;
  }

  .alert {
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}


.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

/*darkmode*/

.dark-mode .bag-summary-item {
    background-color: #1e1e1e;
    color: #ffffff;}

.dark-mode .bag-summary-itemm {
    background-color: #1e1e1e;
    color: #ffffff;}

.dark-mode .bag-summary {
    background-color: #555555;
    color: #ffffff;}

.dark-mode .navbar {
    background-color: #1e1e1e;
    color: #ffffff;}

.dark-mode .faq-answer, footer {
    background-color: #1e1e1e;
    color: #ffffff;}

.dark-mode .faq-main{
    background-color: #555555;
    color: #ffffff;}

.dark-mode .faq-section{
    background-color: #555555;
    color: #ffffff;}

.dark-mode .faq-question:hover {
    background-color: #1e1e1e;
    color: #ffffff;}

.dark-mode .faq-main:hover{
    background-color: #e0e1dd29;
    color: #ffffff;}

.dark-mode .faq-question {
    background-color: #555555;
    color: #ffffff;}

.dark-mode .bag-item {
    background-color: #555555;
    color: #ffffff;}

body.dark-mode {
    background-image: url('images/background-dark.JPG');}

.dark-mode .featured-products{
    background-color: #1e1e1e;
}
.dark-mode .featured-title h2 {
    color: #fff;
}

.dark-mode .product {
    background-color: #555555;
}

select {
    color: white; /* Make text color white */
    appearance: none;
    background-color: transparent;
  }


select option {
    color: #fff; 
    background-color: #000; 
  }
