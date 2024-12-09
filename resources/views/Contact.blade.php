<html>
<head> 
    <meta charset="UTF-8">
    <title>Astonic Sports</title>
    <link href="" rel="stylesheet">
</head>

<body> 
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/contact">
                    <img src="{{ asset('images/Astonic Sports Logo.webp') }}"  alt="Astonic Sports Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="">Account</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </nav>
    </header> 

    <main>
        <h1>Contact Us</h1>
        <div id="main">
            <h4 class="uppercase">Get in touch with us regarding any inquiries</h4>

            @if (session('success'))
            <div class="alert alert-success">
                    {{ session('success') }}
            </div>
            @endif
            <form action="{{route('contact.store')}}" method="POST" id="contacts">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" value="" required="" name="phone" required placeholder="Enter your phone number" maxlength="11" minlength="10">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required placeholder="Write your message here"></textarea>
                </div>
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
    </main>




    <footer>
        <!-- Footer made by ibraheem -->
        <div class="footer-container">
    
            <!--Social Links-->
            <div class="socials">
                <p>FOLLOW US ON SOCIALS</p>
                <br>
                <div class="social-links">
                    <a href="#"aria-label="Follow us on Facebook"></a><img src="{{ asset('images/facebook-logo.png') }}"  alt="Facebook"></a>
                    <a href="#"aria-label="Follow us on Twitter"></a><img src="{{ asset('images/twitter-logo.png') }}"  alt="Twitter"></a>
                    <a href="#"aria-label="Follow us on Instagram"></a><img src="{{ asset('images/instagram-logo.png') }}"  alt="Instagram"></a>
                </div>
            </div>
    
            <!--Newsletter Signup-->
            <div class="newsletter">
                <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <p>Sign up for the latest updates on product releases &amp; discounts!</p>
                <form action="email">
                    <input value="" name="EMAIL" class="email" id="footer-EMAIL" placeholder="Enter Email Address" required="" type="email">
                   <br><br>
                    <input value="Join" class="button" type="submit">
                </form>
                <p>&copy; 2024 Astonic Sports. All Rights Reserved.</p>
            </div>
            <!--Nav Section-->
        <div class="footer-nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/login">Account</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </div>
        </div>
    </footer>

    <style> 
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Arial', sans-serif;
}

body {
  background: #f6f6f8; /* Dark bluebackground /
  color: #e0e1dd; / Light gray text */
  line-height: 1.6;
}

h1 {
    text-align: center;
}


.navbar {
  position: sticky;
  top: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1a1a2e;
  padding: 15px 50px;
  z-index: 1000;
}

.logo img {
  height: 50px;
  width: auto;
  display: block;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 30px;
}

.nav-links a {
  color: #e0e1dd; /* Light gray for nav links */
  text-decoration: none;
  font-size: 16px;
  font-weight: 600;
}

.nav-links a:hover,.nav-links a:focus {
  color: #5dade2; /* Soft blue accent color */}


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

  #main {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h4.uppercase {
        text-align: center;
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 20px;
        font-weight: 700;
        text-transform: uppercase;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .form-group input, 
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        color: #333;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #5dade2;
        outline: none;
        box-shadow: 0 0 5px rgba(93, 173, 226, 0.5);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .button {
        background-color: #5dade2;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align-self: center;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #21618c;
    }
</style>
    </style>

</body>
</html>