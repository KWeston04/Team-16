function showSubcategories(category) {

    const salesSub = document.getElementById('sales-subcategories');
    const mensSub = document.getElementById('mens-subcategories');
    const kidsSub = document.getElementById('kids-subcategories');
    
    const selectedCategory = document.getElementById(`${category}-subcategories`);

    const isCurrentlyVisible = !selectedCategory.classList.contains('hidden');
    
    salesSub.classList.add('hidden');
    mensSub.classList.add('hidden');
    kidsSub.classList.add('hidden');

    if (!isCurrentlyVisible) {
        selectedCategory.classList.remove('hidden');
    }
}

function redirectToProduct(productId) {
    // Example URL pattern for product pages
    window.location.href = `product_page.html?product=${productId}`;
}

// Array of products
const products = [
    { id: 1, name: "Vortex Runner", price: "£120.00", image: "Astonic Vortex Runner.webp", link: "vortex_runner.html" },
    { id: 2, name: "Sweat Hoodie Mens", price: "£29.99", image: "Astonic Hoodie.webp", link: "#" },
    { id: 3, name: "Away Football Shirt", price: "£39.99", image: "Astonic Away football shirt.webp", link: "#" },
    { id: 4, name: "Compression Top", price: "£29.99", image: "Astonic compression top.png", link: "#" },
];

// Handle search functionality
function handleSearch(event) {
    event.preventDefault(); // Prevent form submission
    const query = document.getElementById("search-bar").value.toLowerCase();

    // Store search results in session storage for retrieval
    const results = products.filter(product => product.name.toLowerCase().includes(query));
    sessionStorage.setItem("searchResults", JSON.stringify(results));

    // Redirect to search results page
    window.location.href = "search_results.html";
}

// Populate search results on the results page
if (window.location.pathname.endsWith("search_results.html")) {
    const resultsContainer = document.getElementById("results-container");
    const results = JSON.parse(sessionStorage.getItem("searchResults"));

    if (results && results.length > 0) {
        results.forEach(product => {
            const productCard = `
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <p class="price">${product.price}</p>
                    <button class="buy-btn" onclick="location.href='${product.link}'">View</button>
                </div>`;
            resultsContainer.innerHTML += productCard;
        });
    } else {
        resultsContainer.innerHTML = "<p>No results found.</p>";
    }
}
