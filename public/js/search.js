document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("search-form");
    const searchBar = document.getElementById("search-bar");
    const resultsContainer = document.getElementById("results-container");
    const noResultsMessage = document.querySelector(".no-results");

    if (searchForm) {
        searchForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const query = searchBar.value.trim().toLowerCase();
            if (!query) return;

            sessionStorage.setItem("searchQuery", query);
            window.location.href = "search_results.html";
        });


        searchBar.addEventListener("input", function () {
            const query = searchBar.value.trim().toLowerCase();
            
            // if search details erased, keep the display
            if (!query) {
                const lastQuery = sessionStorage.getItem("lastSearchQuery");
                if (lastQuery) {
                    sessionStorage.setItem("searchQuery", lastQuery);
                }
            }
        });
    }

    if (searchBar) {
        const savedQuery = sessionStorage.getItem("searchQuery");
        if (savedQuery) {
            searchBar.value = savedQuery;
        }
    }

    if (window.location.pathname.includes("search_results.html")) {
        displaySearchResults();
    }
});

function displaySearchResults() {
    const query = sessionStorage.getItem("searchQuery") || "";
    const resultsContainer = document.getElementById("results-container");
    const noResultsMessage = document.querySelector(".no-results");

    if (!resultsContainer) return;

    const products = [
        { name: "Sweat Hoodie", price: "£29.99", image: "shirts-Hoodie(main).webp", link: "sweat_hoodie_mens.html" },
        { name: "Away Football Shirts", price: "£39.99", image: "shirt-Awayfoortball(main).webp", link: "Away_Football_Shirt.html" },
        { name: "Training T-Shirts", price: "£19.99", image: "shirts-Training_Shirts.webp", link: "#" },
        { name: "Compression Top", price: "£39.99", image: "shirts-compressiontop(main).webp", link: "#" },
        { name: "Home Football Shirts", price: "£39.99", image: "shirts-Homefootballshirt(main).webp", link: "#" },
        { name: "Half-Zip Running Pullover", price: "£29.99", image: "shirts-Halfziprunningpullover(main).webp", link: "#" },
        { name: "TankTop", price: "£29.99", image: "shirts-Tanktop.webp", link: "#" },
        { name: "Wind Runner Jacket", price: "£59.99", image: "shirts-Windrunner_Jacket.webp", link: "#" },
        { name: "Wind Breaker Jacket", price: "£59.99", image: "shirts-windbreaker(side).webp", link: "#" },
        { name: "Cargo Pants", price: "£19.99", image: "pants-Cargo(main).webp", link: "#" },
        { name: "Jogging Pants", price: "£29.99", image: "pants-joggingpants.webp", link: "#" },
        { name: "Strike Pants", price: "£29.99", image: "pants-Strikepants.webp", link: "#" },
        { name: "Tapered-Fit Jogger Pants", price: "£29.99", image: "pants-Tapered_Fit_Jogger_Pants.webp", link: "#" },
        { name: "Away Football Shorts", price: "£19.99", image: "shorts-awayfootball(main).webp", link: "#" },
        { name: "Home Football Shorts", price: "£29.99", image: "shorts-Homefootball.webp", link: "#" },
        { name: "Training Shorts", price: "£29.99", image: "shorts-Training_Shorts.webp", link: "#" },
        { name: "AirMax", price: "£69.99", image: "Shoes-Airmax(main).jpg", link: "#" },
        { name: "Court Nature", price: "£69.99", image: "shoes-Courtnature.webp", link: "#" },
        { name: "Jordan(White)", price: "£69.99", image: "shoes-Jordan(white).webp", link: "#" },
        { name: "Jordan", price: "£69.99", image: "shoes-Jordan.webp", link: "#" },
        { name: "Nature", price: "£69.99", image: "shoes-Nature.webp", link: "#" },
        { name: "Vortex Runner", price: "£69.99", image: "shoes-Vortex_Runner_main.webp", link: "#" },
        { name: "Slides(Navy)", price: "£69.99", image: "shoes-Navyslides.webp", link: "#" },
        { name: "Slides", price: "£69.99", image: "shoes-Slides.webp", link: "#" },
        { name: "Lifting Belt", price: "£69.99", image: "accessories-Liftingbelt(main).webp", link: "#" },
        { name: "Bucket Hat", price: "£69.99", image: "accessories-Buckethat.webp", link: "#" },
        { name: "Head Band", price: "£69.99", image: "accessories-Headband.webp", link: "#" },
        { name: "Back Pack", price: "£69.99", image: "accessories-raining_backpack.webp", link: "#" }
    ];

    const results = products.filter(product => product.name.toLowerCase().includes(query));

    resultsContainer.innerHTML = "";

    if (results.length > 0) {
        noResultsMessage.classList.add("hidden");
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

        // keep search results 
        sessionStorage.setItem("lastSearchQuery", query);
    } else {
        noResultsMessage.classList.remove("hidden");
    }
}
