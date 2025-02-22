<html>
<head> 
    <meta charset="UTF-8">
    <title>Astonic Sports</title>
    <link href="" rel="stylesheet"> <!-- Added rel attribute for correct linking -->
</head>

<body> 
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/about">
                    <img src= "{{ asset('images/Astonic Sports Logo.webp') }}"  alt ="Astonic Sports Logo">
                    
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
        <div class="about-us">
        <h1>About us</h1>
        <p>Welcome to Astonic Sports here we aim to provide the highest quality mens sportswear at the best and most affordable prices. We aim to become the leading mens sportwear company in the world and help people reach their health and fitness goals, unleashing their potential whilst also wearing high quality, comfortable sportswear. We are dedicated to creating the best quality sportswear by optimising the use of cutting-edge technology, enabling our customers to exercise in comfort and style. </p>

        <h2>Welcome to Astonic Sports</h2>
        <p>Where innovation, style, and performance come together to support men in their fitness journeys. We believe in the transformative power of movement, the strength found in community, and the relentless pursuit of excellence—all reflected in our sportswear.</p>

        <h3>Our Story</h3>
        <p>Astonic Sports was founded with a vision: to blend high-performance functionality with style, creating athletic wear that active men can rely on to meet their goals. We know peak performance demands confidence, and our mission is to provide gear that supports you through every stride, lift, and sprint.</p>

        <h3>Our Mission</h3>
        <p>We aim to inspire and empower men to realize their athletic potential. By bridging the latest in fabric technology with effortless style, Astonic Sports delivers apparel that meets the rigorous demands of intense workouts while staying comfortable for everyday wear. Our gear embodies the motivation, resilience, and discipline needed to reach new levels of personal excellence.</p>

        <h3>Our Values</h3>
        <p>Performance: Our products are engineered with high-quality, durable materials, crafted to withstand the most intense workouts. Each piece provides flexibility, comfort, and support exactly where it’s needed.</p>
        <p>Innovation: We continuously explore the latest in fabric technology, sustainable sourcing, and cutting-edge design to create products that enhance performance and durability. Astonic Sports doesn’t just follow trends; we set them.</p>
        <p>Community: We understand that fitness is more than an individual pursuit—it’s a collective movement. Our goal is to build a supportive community of men who inspire, uplift, and challenge each other.</p>
        <p>Sustainability: Committed to eco-friendly practices, we prioritize sustainable fabrics and waste-reducing processes, working to protect the planet for future athletes.</p>

        <h3>Our Product Line</h3>
        <p>Our range includes high-performance athletic wear for all types of training, from breathable tops and shorts for intense workouts to versatile, stylish activewear that easily transitions from gym to street. Our collection features:</p>
        <ul class="reasons">
            
            <li>Performance Tops and Bottoms: Designed for optimal comfort, flexibility, and breathability</li>
            <li>Compression Gear: Enhances circulation, reducing muscle fatigue</li>
            <li>Outerwear: Weather-resistant jackets and hoodies for any season</li>
            <li>Accessories: From gym bags to training essentials, we’ve got you covered</li>
            
        </ul>

        <h3>Join Us</h3>
        <p>Astonic Sports is more than a brand—it’s a call to action. We’re here to inspire, equip, and support men at every stage of their fitness journey. Whether you're a newcomer or a seasoned athlete, join our community and discover gear that keeps up with you.</p>

        <h3>Stay Connected</h3>
        <p>Follow us on social media for updates on new products, fitness advice, and community stories. Let’s redefine the possibilities in sportswear and celebrate every achievement along the way.</p>

        <p>Astonic Sports – Empower Your Potential</p>
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
                <li><a href="/home">Home</a></li>
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
  background: #f7f7f7; /* White background /
  color: #e0e1dd; / Light gray text */
  line-height: 1.6;
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


.about-us h1, h2, h3 {
  color: #1a1a2e;  
  margin-bottom: 20px;
  font-weight: bold;
  text-align: center;
}


.about-us h1 {
  font-size: 3rem;
  color: #1a1a2e;
  text-transform: uppercase;
  letter-spacing: 2px;
  margin-bottom: 40px;
}


.about-us h2 {
  font-size: 2.5rem;
  color: #3e3e57;  
  margin-bottom: 20px;
}


.about-us h3 {
  font-size: 2rem;
  color: #9191c4;  
  margin-bottom: 10px;
}


.about-us p {
  font-size: 1.1rem;
  line-height: 1.8;
  margin-bottom: 20px;
  max-width: 900px;
  margin-left: auto;
  margin-right: auto;
  text-align: justify;
  color: #555;  
}

.reasons {
  list-style: none;  
  padding: 0;
  margin: 0;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

.reasons li::before {
  content: "•";  
  position: absolute;
  left: 0;
  color: #000000;  
  font-size: 1.5rem;
  top: 0;
  font-weight: bold;
}

.reasons li {
  font-size: 1.1rem;
  margin-bottom: 10px;
  position: relative;
  padding-left: 25px;  
}


</style>
</body>
</html>
