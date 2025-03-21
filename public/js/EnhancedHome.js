/**
 * Astonic Sports Enhanced Functionality
 * Comprehensive solution for an improved shopping experience
 */

document.addEventListener('DOMContentLoaded', function () {
    // Initialize core components
    initHeroSlider();
    initCart();
    initWishlist();
    initScrollAnimations();
    initProductInteractions();
    initMobileMenu();
    initBannerScroll();
    initSpecialOffers();
});

/**
 * Hero Slider with enhanced transitions and touch support
 */
function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide, .elite-collection, .football-gear');
    const dots = document.querySelectorAll('.hero-dot');
    const prevBtn = document.querySelector('.hero-nav-prev');
    const nextBtn = document.querySelector('.hero-nav-next');

    if (!slides.length) return;

    let currentSlide = 0;
    let slideInterval;
    let isAnimating = false;

    // Add transition classes to stylesheet if needed
    addHeroSliderStyles();

    // Start autoplay
    startSlideInterval();

    // Previous slide button
    if (prevBtn) {
        prevBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (isAnimating) return;
            clearInterval(slideInterval);
            changeSlide('prev');
            startSlideInterval();
        });
    }

    // Next slide button
    if (nextBtn) {
        nextBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (isAnimating) return;
            clearInterval(slideInterval);
            changeSlide('next');
            startSlideInterval();
        });
    }

    // Dots navigation
    dots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            if (isAnimating || currentSlide === index) return;
            clearInterval(slideInterval);
            goToSlide(index);
            startSlideInterval();
        });
    });

    // Add touch support for mobile
    const slider = document.querySelector('.hero-slider');
    if (slider) {
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            clearInterval(slideInterval); // Pause autoplay on touch
        }, { passive: true });

        slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startSlideInterval(); // Resume autoplay after touch
        }, { passive: true });

        function handleSwipe() {
            if (isAnimating) return;
            const swipeThreshold = 30; // More sensitive touch handling // Minimum swipe distance

            if (touchEndX < touchStartX - swipeThreshold) {
                // Swipe left - next slide
                changeSlide('next');
            } else if (touchEndX > touchStartX + swipeThreshold) {
                // Swipe right - previous slide
                changeSlide('prev');
            }
        }

        // Pause on hover (desktop)
        slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
        slider.addEventListener('mouseleave', startSlideInterval);
    }

    // Handle slide changes with animations
    function changeSlide(direction) {
        isAnimating = true;

        // Determine next slide index
        const nextSlideIndex = direction === 'next'
            ? (currentSlide + 1) % slides.length
            : (currentSlide - 1 + slides.length) % slides.length;

        // Update slides with animation direction
        slides[currentSlide].classList.add(direction === 'next' ? 'slide-out-left' : 'slide-out-right');
        slides[nextSlideIndex].classList.add(direction === 'next' ? 'slide-in-right' : 'slide-in-left');

        // After animation completes, reset classes and update current slide
        setTimeout(() => {
            slides[currentSlide].classList.remove('active', 'slide-out-left', 'slide-out-right');
            slides[nextSlideIndex].classList.add('active');
            slides[nextSlideIndex].classList.remove('slide-in-right', 'slide-in-left');

            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === nextSlideIndex);
            });

            // Update current slide
            currentSlide = nextSlideIndex;
            isAnimating = false;
        }, 600); // Match with CSS transition duration
    }

    // Go to specific slide with animation
    function goToSlide(index) {
        if (index === currentSlide) return;

        isAnimating = true;
        const direction = index > currentSlide ? 'next' : 'prev';

        // Update slides with animation direction
        slides[currentSlide].classList.add(direction === 'next' ? 'slide-out-left' : 'slide-out-right');
        slides[index].classList.add(direction === 'next' ? 'slide-in-right' : 'slide-in-left');

        // After animation completes, reset classes and update current slide
        setTimeout(() => {
            slides[currentSlide].classList.remove('active', 'slide-out-left', 'slide-out-right');
            slides[index].classList.add('active');
            slides[index].classList.remove('slide-in-right', 'slide-in-left');

            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });

            // Update current slide
            currentSlide = index;
            isAnimating = false;
        }, 600); // Match with CSS transition duration
    }

    // Start autoplay interval
    function startSlideInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(function () {
            if (!isAnimating) {
                changeSlide('next');
            }
        }, 6000); // Change slide every 6 seconds
    }
}

/**
 * Add styles for hero slider animations
 */
function addHeroSliderStyles() {
    if (!document.getElementById('hero-slider-animations')) {
        const style = document.createElement('style');
        style.id = 'hero-slider-animations';
        style.textContent = `
            .slide-out-left {
                animation: slideOutLeft 0.6s forwards;
            }
            
            .slide-out-right {
                animation: slideOutRight 0.6s forwards;
            }
            
            .slide-in-right {
                animation: slideInRight 0.6s forwards;
            }
            
            .slide-in-left {
                animation: slideInLeft 0.6s forwards;
            }
            
            @keyframes slideOutLeft {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(-10%); opacity: 0; }
            }
            
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(10%); opacity: 0; }
            }
            
            @keyframes slideInRight {
                from { transform: translateX(10%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideInLeft {
                from { transform: translateX(-10%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .hero-slide.active .hero-content {
                animation: fadeInUp 0.8s ease-out 0.3s forwards;
            }
            
            .hero-slide .hero-content {
                opacity: 0;
            }
        `;
        document.head.appendChild(style);
    }
}

/**
 * Enhanced Cart System with error handling
 */
function initCart() {
    // Load cart from localStorage
    const cart = getCart();

    // Update cart UI
    updateCartUI(cart);

    // Setup cart dropdown toggle
    const cartBtn = document.querySelector('.cart-btn');
    const cartDropdown = document.querySelector('.cart-dropdown');

    if (cartBtn && cartDropdown) {
        // Show dropdown on click for mobile
        cartBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                cartDropdown.classList.toggle('show');

                // Close wishlist dropdown if open
                const wishlistDropdown = document.querySelector('.wishlist-dropdown');
                if (wishlistDropdown && wishlistDropdown.classList.contains('show')) {
                    wishlistDropdown.classList.remove('show');
                }
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (cartDropdown.classList.contains('show') &&
                !cartDropdown.contains(event.target) &&
                !cartBtn.contains(event.target)) {
                cartDropdown.classList.remove('show');
            }
        });
    }
}

function getCart() {
    try {
        const cart = JSON.parse(localStorage.getItem('astonicCart')) || [];
        return Array.isArray(cart) ? cart : [];
    } catch (error) {
        console.error('Error loading cart:', error);
        return [];
    }
}

function saveCart(cart) {
    try {
        localStorage.setItem('astonicCart', JSON.stringify(cart));
    } catch (error) {
        console.error('Error saving cart:', error);
        showNotification('There was an error saving your cart.', 'error');
    }
}

function addToCart(product) {
    // Validate product
    if (!product || !product.name || !product.price) {
        showNotification('Invalid product data.', 'error');
        return getCart();
    }

    // Set default quantity
    product.quantity = product.quantity || 1;

    // Get existing cart
    let cart = getCart();

    try {
      
        const existingProductIndex = cart.findIndex(item =>
            item.name === product.name &&
            (item.color === product.color || (!item.color && !product.color))
        );

        if (existingProductIndex !== -1) {
           
            cart[existingProductIndex].quantity = (parseInt(cart[existingProductIndex].quantity) || 1) +
                (parseInt(product.quantity) || 1);
        } else {
            // Add new product
            cart.push(product);
        }

        // Save cart
        saveCart(cart);

        // Update UI
        updateCartUI(cart);

        // Show notification
        showNotification(`${product.name} has been added to your cart!`, 'success');

        return cart;
    } catch (error) {
        console.error('Error adding to cart:', error); alert('Could not add item to cart. Please try again.');
        showNotification('Could not add item to cart.', 'error');
        return getCart();
    }
}

function removeFromCart(productName, productColor) {
    // Get cart
    let cart = getCart();

    try {
        // Remove product
        cart = cart.filter(item => !(item.name === productName &&
            (item.color === productColor || (!item.color && !productColor))));

        // Save cart
        saveCart(cart);

        // Update UI
        updateCartUI(cart);

        // Show notification
        showNotification(`Item removed from your cart.`, 'info');

        return cart;
    } catch (error) {
        console.error('Error removing from cart:', error);
        showNotification('Could not remove item from cart.', 'error');
        return getCart();
    }
}

function updateCartUI(cart) {
    const cartCount = document.querySelector('.cart-count');
    const cartItemsContainer = document.getElementById('cart-items-container');
    const cartTotal = document.querySelector('.cart-total span:last-child');

    if (!cartCount || !cartItemsContainer || !cartTotal) return;

    try {
        // Update cart count
        const totalItems = cart.reduce((sum, item) => sum + (parseInt(item.quantity) || 1), 0);
        cartCount.textContent = totalItems;
        cartCount.style.display = totalItems > 0 ? 'flex' : 'none';

        // Update cart items
        if (totalItems > 0) {
            let cartHTML = '';

            // Add each item to cart HTML
            cart.forEach(item => {
                const itemQuantity = parseInt(item.quantity) || 1;
                cartHTML += `
                    <div class="cart-item">
                        <img src="${item.image || ''}" alt="${item.name}" onerror="this.src='${getPlaceholderImage()}'">
                        <div class="cart-item-info">
                            <div class="cart-item-name">${item.name}</div>
                            <div class="cart-item-details">
                                ${item.color ? `<span class="cart-item-color">${item.color}</span> | ` : ''}
                                <span class="cart-item-price">${item.price} × ${itemQuantity}</span>
                            </div>
                        </div>
                        <button class="remove-item" data-name="${item.name}" data-color="${item.color || ''}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            });

            // Update cart container
            cartItemsContainer.innerHTML = cartHTML;

            // Setup remove buttons
            setupCartRemoveButtons();
        } else {
            // Show empty cart message
            cartItemsContainer.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
        }

        // Calculate total
        const total = cart.reduce((sum, item) => {
            const price = parseFloat(item.price.replace(/[^0-9.]/g, ''));
            const quantity = parseInt(item.quantity) || 1;
            return sum + (price * quantity);
        }, 0);

        // Update total
        cartTotal.textContent = `£${total.toFixed(2)}`;
    } catch (error) {
        console.error('Error updating cart UI:', error);
        cartItemsContainer.innerHTML = '<div class="empty-cart">Error loading cart</div>';
    }
}

function setupCartRemoveButtons() {
    const removeButtons = document.querySelectorAll('.remove-item');
    if (!removeButtons.length) return;

    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productName = this.getAttribute('data-name');
            const productColor = this.getAttribute('data-color');
            removeFromCart(productName, productColor);
        });
    });
}

/**
 * Enhanced Wishlist System
 */
function initWishlist() {
    // Load wishlist from localStorage
    const wishlist = getWishlist();

    createWishlistDropdown();

    // Update wishlist UI
    updateWishlistUI(wishlist);

    // Setup wishlist dropdown toggle
    const wishlistBtn = document.querySelector('.wishlist-btn');
    const wishlistDropdown = document.querySelector('.wishlist-dropdown');

    if (wishlistBtn && wishlistDropdown) {
        // Show dropdown on click for mobile
        wishlistBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                wishlistDropdown.classList.toggle('show');

                const cartDropdown = document.querySelector('.cart-dropdown');
                if (cartDropdown && cartDropdown.classList.contains('show')) {
                    cartDropdown.classList.remove('show');
                }
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (wishlistDropdown.classList.contains('show') &&
                !wishlistDropdown.contains(event.target) &&
                !wishlistBtn.contains(event.target)) {
                wishlistDropdown.classList.remove('show');
            }
        });
    }
}

function createWishlistDropdown() {

    if (document.querySelector('.wishlist-dropdown')) return;

    const wishlistBtn = document.querySelector('.wishlist-btn');
    if (!wishlistBtn) return;

    // Get parent container
    const parent = wishlistBtn.parentElement;

    // Create container if needed
    let wishlistContainer;
    if (parent.classList.contains('wishlist-btn-container')) {
        wishlistContainer = parent;
    } else {
        // Create new container
        wishlistContainer = document.createElement('div');
        wishlistContainer.className = 'wishlist-btn-container';

        // Replace button with container
        parent.replaceChild(wishlistContainer, wishlistBtn);

        // Add button back inside container
        wishlistContainer.appendChild(wishlistBtn);
    }

    // Add wishlist count badge if needed
    if (!wishlistBtn.querySelector('.wishlist-count')) {
        const wishlistCount = document.createElement('span');
        wishlistCount.className = 'wishlist-count';
        wishlistCount.style.display = 'none';
        wishlistCount.textContent = '0';
        wishlistBtn.appendChild(wishlistCount);
    }

    // Create dropdown
    const wishlistDropdown = document.createElement('div');
    wishlistDropdown.className = 'wishlist-dropdown';
    wishlistDropdown.innerHTML = `
        <h3>My Wishlist</h3>
        <div id="wishlist-items-container">
            <div class="empty-wishlist">Your wishlist is empty</div>
        </div>
        <div class="wishlist-buttons">
            <a href="/wishlist" class="wishlist-button view-wishlist-btn">View Wishlist</a>
        </div>
    `;

    // Add to container
    wishlistContainer.appendChild(wishlistDropdown);
}

function getWishlist() {
    try {
        const wishlist = JSON.parse(localStorage.getItem('astonicWishlist')) || [];
        return Array.isArray(wishlist) ? wishlist : [];
    } catch (error) {
        console.error('Error loading wishlist:', error);
        return [];
    }
}

function saveWishlist(wishlist) {
    try {
        localStorage.setItem('astonicWishlist', JSON.stringify(wishlist));
    } catch (error) {
        console.error('Error saving wishlist:', error);
        showNotification('There was an error saving your wishlist.', 'error');
    }
}

function addToWishlist(product) {
    // Validate product
    if (!product || !product.name || !product.price) {
        showNotification('Invalid product data.', 'error');
        return getWishlist();
    }


    let wishlist = getWishlist();

    try {
        // Check if product already exists
        const existingProductIndex = wishlist.findIndex(item =>
            item.name === product.name &&
            (item.color === product.color || (!item.color && !product.color))
        );

        // Only add if it doesn't exist
        if (existingProductIndex === -1) {
            wishlist.push(product);

            // Save wishlist
            saveWishlist(wishlist);

            // Update UI
            updateWishlistUI(wishlist);

            // Show notification
            showNotification(`${product.name} has been added to your wishlist!`, 'success');

            // Update wishlist button state on product cards
            updateWishlistButtonStates();
        }

        return wishlist;
    } catch (error) {
        console.error('Error adding to wishlist:', error);
        showNotification('Could not add item to wishlist.', 'error');
        return getWishlist();
    }
}

function removeFromWishlist(productName, productColor) {
    // Get wishlist
    let wishlist = getWishlist();

    try {
        // Remove product
        wishlist = wishlist.filter(item => !(item.name === productName &&
            (item.color === productColor || (!item.color && !productColor))));

        // Save wishlist
        saveWishlist(wishlist);

        // Update UI
        updateWishlistUI(wishlist);

        // Show notification
        showNotification(`Item removed from your wishlist.`, 'info');

        // Update wishlist button state on product cards
        updateWishlistButtonStates();

        return wishlist;
    } catch (error) {
        console.error('Error removing from wishlist:', error);
        showNotification('Could not remove item from wishlist.', 'error');
        return getWishlist();
    }
}

function updateWishlistUI(wishlist) {
    const wishlistCount = document.querySelector('.wishlist-count');
    const wishlistItemsContainer = document.getElementById('wishlist-items-container');

    if (!wishlistCount || !wishlistItemsContainer) return;

    try {
        // Update wishlist count
        wishlistCount.textContent = wishlist.length;
        wishlistCount.style.display = wishlist.length > 0 ? 'flex' : 'none';

        // Update wishlist items
        if (wishlist.length > 0) {
            let wishlistHTML = '';


            wishlist.forEach(item => {
                wishlistHTML += `
                    <div class="wishlist-item">
                        <img src="${item.image || ''}" alt="${item.name}" onerror="this.src='${getPlaceholderImage()}'">
                        <div class="wishlist-item-info">
                            <div class="wishlist-item-name">${item.name}</div>
                            <div class="wishlist-item-price">${item.price}</div>
                            <a href="#" class="add-to-cart-link" data-name="${item.name}" data-price="${item.price}" 
                               data-image="${item.image || ''}" data-color="${item.color || ''}">
                                Add to Cart
                            </a>
                        </div>
                        <button class="remove-wishlist-item" data-name="${item.name}" data-color="${item.color || ''}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            });

            // Update wishlist container
            wishlistItemsContainer.innerHTML = wishlistHTML;

            // Setup wishlist buttons
            setupWishlistButtons();
        } else {
            // Show empty wishlist message
            wishlistItemsContainer.innerHTML = '<div class="empty-wishlist">Your wishlist is empty</div>';
        }
    } catch (error) {
        console.error('Error updating wishlist UI:', error);
        wishlistItemsContainer.innerHTML = '<div class="empty-wishlist">Error loading wishlist</div>';
    }
}

function setupWishlistButtons() {
    // Setup remove buttons
    const removeButtons = document.querySelectorAll('.remove-wishlist-item');
    if (removeButtons.length) {
        removeButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const productName = this.getAttribute('data-name');
                const productColor = this.getAttribute('data-color');
                removeFromWishlist(productName, productColor);
            });
        });
    }

    // Setup add to cart links
    const addToCartLinks = document.querySelectorAll('.add-to-cart-link');
    if (addToCartLinks.length) {
        addToCartLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const product = {
                    name: this.getAttribute('data-name'),
                    price: this.getAttribute('data-price'),
                    image: this.getAttribute('data-image'),
                    color: this.getAttribute('data-color'),
                    quantity: 1
                };
                addToCart(product);
            });
        });
    }
}

function updateWishlistButtonStates() {
    const wishlist = getWishlist();
    const wishlistButtons = document.querySelectorAll('.product-wishlist-btn');

    wishlistButtons.forEach(button => {
        const productName = button.getAttribute('data-name');
        const isInWishlist = wishlist.some(item => item.name === productName);

        if (isInWishlist) {
            button.classList.add('active');
            button.innerHTML = '<i class="fas fa-heart"></i>';
        } else {
            button.classList.remove('active');
            button.innerHTML = '<i class="far fa-heart"></i>';
        }
    });
}


function initProductInteractions() {

    enhanceProductCards();


    setupAddToCartButtons();

    animateProductEntries();
}

function enhanceProductCards() {
    const productCards = document.querySelectorAll('.product-card');
    if (!productCards.length) return;


    const wishlist = getWishlist();

    productCards.forEach(card => {

        if (card.hasAttribute('data-enhanced')) return;
        card.setAttribute('data-enhanced', 'true');

        try {
            // Get product info
            const productInfo = card.querySelector('.product-info');
            if (!productInfo) return;

            const productName = productInfo.querySelector('h3')?.textContent;
            const productPrice = productInfo.querySelector('p')?.textContent;

            if (!productName || !productPrice) return;

            // Get product image
            const productImageEl = card.querySelector('.image-placeholder');
            let imageUrl = '';

            if (productImageEl) {

                const style = productImageEl.getAttribute('style');
                if (style) {
                    const match = style.match(/url\(['"]?(.*?)['"]?\)/);
                    if (match && match[1]) {
                        imageUrl = match[1];
                    }
                }

                // Fallback to data-image attribute
                if (!imageUrl) {
                    imageUrl = productImageEl.getAttribute('data-image') || '';
                }
            }

            // Add wishlist button if needed
            if (!card.querySelector('.product-wishlist-btn')) {
                const wishlistBtn = document.createElement('button');
                wishlistBtn.className = 'product-wishlist-btn';
                wishlistBtn.setAttribute('aria-label', 'Add to wishlist');
                wishlistBtn.innerHTML = '<i class="far fa-heart"></i>';
                wishlistBtn.setAttribute('data-name', productName);
                wishlistBtn.setAttribute('data-price', productPrice);
                wishlistBtn.setAttribute('data-image', imageUrl);

                // Check if product is in wishlist
                const isInWishlist = wishlist.some(item => item.name === productName);
                if (isInWishlist) {
                    wishlistBtn.classList.add('active');
                    wishlistBtn.innerHTML = '<i class="fas fa-heart"></i>';
                }

                // Add event listener
                wishlistBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    e.preventDefault();

                    // Toggle wishlist state
                    const isActive = this.classList.contains('active');

                    if (isActive) {
                        // Remove from wishlist
                        this.classList.remove('active');
                        this.innerHTML = '<i class="far fa-heart"></i>';
                        removeFromWishlist(productName, '');
                    } else {
                        // Add to wishlist
                        this.classList.add('active');
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        addToWishlist({
                            name: productName,
                            price: productPrice,
                            image: imageUrl,
                            color: '',
                            quantity: 1
                        });
                    }
                });


                card.appendChild(wishlistBtn);
            }


            if (!card.querySelector('.quick-view-btn')) {
                const quickViewBtn = document.createElement('button');
                quickViewBtn.className = 'quick-view-btn';
                quickViewBtn.innerHTML = '<i class="fas fa-eye"></i>';
                quickViewBtn.setAttribute('aria-label', 'Quick view');

                quickViewBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    showQuickView(productName, productPrice, imageUrl);
                });


                card.appendChild(quickViewBtn);
            }
        } catch (error) {
            console.error('Error enhancing product card:', error);
        }
    });
}

function setupAddToCartButtons() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    if (!addToCartButtons.length) return;

    addToCartButtons.forEach(button => {

        if (button.hasAttribute('data-setup')) return;
        button.setAttribute('data-setup', 'true');

        button.addEventListener('click', function (e) {
            e.preventDefault();

            try {
                const card = this.closest('.product-card');
                if (!card) return;

                // Get product details
                const productName = card.querySelector('.product-info h3')?.textContent;
                const productPrice = card.querySelector('.product-info p')?.textContent;

                if (!productName || !productPrice) return;

                // Get product image URL
                let imageUrl = '';
                const imageEl = card.querySelector('.image-placeholder');

                if (imageEl) {
                    // Try to extract from style
                    const style = imageEl.getAttribute('style');
                    if (style) {
                        const match = style.match(/url\(['"]?(.*?)['"]?\)/);
                        if (match && match[1]) {
                            imageUrl = match[1];
                        }
                    }

                    // Fallback to data attribute
                    if (!imageUrl) {
                        imageUrl = imageEl.getAttribute('data-image') || '';
                    }
                }

                // Add to cart
                addToCart({
                    name: productName,
                    price: productPrice,
                    image: imageUrl,
                    color: '',
                    quantity: 1
                });

                // Show success state with animation
                this.classList.add('added');
                const originalText = this.textContent;
                this.textContent = '✓ ADDED';

                // Add animation
                this.style.animation = 'pulse 0.5s ease';

                // Reset after delay
                setTimeout(() => {
                    this.classList.remove('added');
                    this.textContent = originalText;
                    this.style.animation = '';
                }, 2000);
            } catch (error) {
                console.error('Error adding to cart:', error); alert('Could not add item to cart. Please try again.');
                showNotification('Could not add item to cart.', 'error');
            }
        });
    });
}

function animateProductEntries() {
    const productCards = document.querySelectorAll('.product-card');
    if (!productCards.length) return;

    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {

                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, index * 100); // 100ms staggered delay

                // Stop observing once animated
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1, // Trigger when 10% of the element is visible
        rootMargin: '0px 0px -50px 0px'
    });

    // Prepare each product card for animation
    productCards.forEach(card => {
        // Set initial state if not already set
        if (!card.classList.contains('prepare-animation')) {
            card.classList.add('prepare-animation');
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
        }

        // Observe the card
        observer.observe(card);
    });


    if (!document.getElementById('product-animation-styles')) {
        const style = document.createElement('style');
        style.id = 'product-animation-styles';
        style.textContent = `
            .prepare-animation {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.5s ease, transform 0.5s ease;
            }
            
            .animate-in {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    }
}


function showQuickView(productName, productPrice, imageUrl) {

    const existingQuickView = document.querySelector('.quick-view-modal');
    if (existingQuickView) {
        existingQuickView.remove();
    }

    // Create modal
    const modal = document.createElement('div');
    modal.className = 'quick-view-modal';

    modal.innerHTML = `
        <div class="quick-view-content">
            <button class="quick-view-close"><i class="fas fa-times"></i></button>
            <div class="quick-view-image">
                <img src="${imageUrl || ''}" alt="${productName}" onerror="this.src='${getPlaceholderImage()}'">
            </div>
            <div class="quick-view-details">
                <h2>${productName}</h2>
                <p class="quick-view-price">${productPrice}</p>
                <div class="quick-view-description">
                    <p>Premium quality athletic wear designed for maximum performance and comfort. Made with high-tech fabric that wicks moisture and allows breathability.</p>
                </div>
                <div class="quick-view-colors">
                    <h3>Colors</h3>
                    <div class="color-options">
                        <button class="color-option active" style="background-color: #000000;" data-color="Black"></button>
                        <button class="color-option" style="background-color: #B11226;" data-color="Red"></button>
                        <button class="color-option" style="background-color: #3498DB;" data-color="Blue"></button>
                    </div>
                </div>
                <div class="quick-view-sizes">
                    <h3>Size</h3>
                    <div class="size-options">
                        <button class="size-option" data-size="S">S</button>
                        <button class="size-option active" data-size="M">M</button>
                        <button class="size-option" data-size="L">L</button>
                        <button class="size-option" data-size="XL">XL</button>
                    </div>
                </div>
                <div class="quick-view-quantity">
                    <h3>Quantity</h3>
                    <div class="quantity-selector">
                        <button class="quantity-btn minus" data-action="decrease">-</button>
                        <input type="number" class="quantity-input" value="1" min="1" max="10">
                        <button class="quantity-btn plus" data-action="increase">+</button>
                    </div>
                </div>
                <div class="quick-view-actions">
                    <button class="quick-view-add-to-cart">ADD TO CART</button>
                    <button class="quick-view-add-to-wishlist"><i class="far fa-heart"></i></button>
                </div>
            </div>
        </div>
    `;

    // Add to body
    document.body.appendChild(modal);

    // Prevent body scrolling
    document.body.style.overflow = 'hidden';

    // Show modal with animation
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);

    // Add event listeners
    const closeBtn = modal.querySelector('.quick-view-close');
    if (closeBtn) {
        closeBtn.addEventListener('click', () => closeQuickView(modal));
    }

    // Close on click outside
    modal.addEventListener('click', function (e) {
        if (e.target === this) {
            closeQuickView(modal);
        }
    });

    // Color options
    const colorOptions = modal.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        option.addEventListener('click', function () {

            colorOptions.forEach(opt => opt.classList.remove('active'));

            this.classList.add('active');
        });
    });

    // Size options
    const sizeOptions = modal.querySelectorAll('.size-option');
    sizeOptions.forEach(option => {
        option.addEventListener('click', function () {

            sizeOptions.forEach(opt => opt.classList.remove('active'));

            this.classList.add('active');
        });
    });


    const quantityBtns = modal.querySelectorAll('.quantity-btn');
    const quantityInput = modal.querySelector('.quantity-input');

    quantityBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const action = this.getAttribute('data-action');
            const currentValue = parseInt(quantityInput.value);

            if (action === 'increase') {
                if (currentValue < 10) {
                    quantityInput.value = currentValue + 1;
                }
            } else if (action === 'decrease') {
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }
        });
    });


    quantityInput.addEventListener('change', function () {
        const value = parseInt(this.value);
        if (isNaN(value) || value < 1) this.value = 1;
        if (value > 10) this.value = 10;
    });


    const addToCartBtn = modal.querySelector('.quick-view-add-to-cart');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function () {

            const selectedColor = modal.querySelector('.color-option.active')?.getAttribute('data-color') || '';
            const selectedSize = modal.querySelector('.size-option.active')?.getAttribute('data-size') || '';
            const quantity = parseInt(quantityInput.value) || 1;


            const product = {
                name: productName,
                price: productPrice,
                image: imageUrl,
                color: selectedColor,
                size: selectedSize,
                quantity: quantity
            };


            addToCart(product);


            this.classList.add('added');
            this.textContent = '✓ ADDED TO CART';


            setTimeout(() => {
                closeQuickView(modal);
            }, 1500);
        });
    }


    const wishlistBtn = modal.querySelector('.quick-view-add-to-wishlist');
    if (wishlistBtn) {
        // Check if product is in wishlist
        const wishlist = getWishlist();
        const isInWishlist = wishlist.some(item => item.name === productName);


        if (isInWishlist) {
            wishlistBtn.classList.add('active');
            wishlistBtn.innerHTML = '<i class="fas fa-heart"></i>';
        }

        wishlistBtn.addEventListener('click', function () {
            const isActive = this.classList.contains('active');

            if (isActive) {

                this.classList.remove('active');
                this.innerHTML = '<i class="far fa-heart"></i>';
                removeFromWishlist(productName, '');
            } else {

                this.classList.add('active');
                this.innerHTML = '<i class="fas fa-heart"></i>';


                const selectedColor = modal.querySelector('.color-option.active')?.getAttribute('data-color') || '';

                addToWishlist({
                    name: productName,
                    price: productPrice,
                    image: imageUrl,
                    color: selectedColor,
                    quantity: 1
                });
            }
        });
    }


    addQuickViewStyles();
}

function closeQuickView(modal) {

    modal.classList.remove('show');


    setTimeout(() => {
        modal.remove();
        document.body.style.overflow = '';
    }, 300);
}

function addQuickViewStyles() {
    if (!document.getElementById('quick-view-styles')) {
        const style = document.createElement('style');
        style.id = 'quick-view-styles';
        style.textContent = `
            .quick-view-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1500;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease, visibility 0.3s ease;
            }
            
            .quick-view-modal.show {
                opacity: 1;
                visibility: visible;
            }
            
            .quick-view-content {
                background: var(--bg-primary);
                border-radius: 8px;
                display: flex;
                flex-wrap: wrap;
                max-width: 900px;
                width: 90%;
                max-height: 90vh;
                overflow-y: auto;
                transform: translateY(20px);
                transition: transform 0.3s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }
            
            .quick-view-modal.show .quick-view-content {
                transform: translateY(0);
            }
            
            .quick-view-close {
                position: absolute;
                top: 15px;
                right: 15px;
                background: none;
                border: none;
                font-size: 24px;
                color: var(--text-muted);
                cursor: pointer;
                z-index: 2;
                transition: color 0.3s ease;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
            }
            
            .quick-view-close:hover {
                color: var(--primary);
                background-color: rgba(0, 0, 0, 0.05);
            }
            
            .quick-view-image {
                flex: 1 1 300px;
                padding: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
            }
            
            .quick-view-image img {
                max-width: 100%;
                max-height: 400px;
                object-fit: contain;
                border-radius: 4px;
            }
            
            .quick-view-details {
                flex: 1 1 400px;
                padding: 40px 40px 40px 20px;
                position: relative;
            }
            
            .quick-view-details h2 {
                font-family: var(--heading-font);
                font-size: 1.8rem;
                font-weight: 700;
                margin-bottom: 10px;
                color: var(--text-primary);
            }
            
            .quick-view-price {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--primary);
                margin-bottom: 20px;
            }
            
            .quick-view-description {
                margin-bottom: 20px;
                color: var(--text-secondary);
                line-height: 1.6;
            }
            
            .quick-view-colors,
            .quick-view-sizes,
            .quick-view-quantity {
                margin-bottom: 20px;
            }
            
            .quick-view-details h3 {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 10px;
                color: var(--text-primary);
            }
            
            .color-options,
            .size-options {
                display: flex;
                gap: 10px;
            }
            
            .color-option {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                border: 2px solid transparent;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
            }
            
            .color-option.active {
                border-color: var(--primary);
            }
            
            .color-option.active::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: white;
            }
            
            .size-option {
                min-width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--border-color);
                border-radius: 4px;
                background: none;
                cursor: pointer;
                transition: all 0.3s ease;
                font-weight: 600;
                color: var(--text-primary);
            }
            
            .size-option.active {
                background: var(--primary);
                color: white;
                border-color: var(--primary);
            }
            
            .quantity-selector {
                display: flex;
                align-items: center;
                max-width: 120px;
            }
            
            .quantity-btn {
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--bg-secondary);
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
                font-weight: 700;
                font-size: 1.2rem;
            }
            
            .quantity-btn:hover {
                background: var(--primary);
                color: white;
            }
            
            .quantity-input {
                width: 40px;
                height: 30px;
                text-align: center;
                border: 1px solid var(--border-color);
                border-radius: 0;
                margin: 0 5px;
            }
            
            .quick-view-actions {
                display: flex;
                gap: 10px;
                margin-top: 30px;
            }
            
            .quick-view-add-to-cart {
                flex: 1;
                padding: 12px 20px;
                background: var(--primary);
                color: white;
                border: none;
                border-radius: 4px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-family: var(--heading-font);
            }
            
            .quick-view-add-to-cart:hover {
                background: var(--primary-hover);
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(177, 18, 38, 0.3);
            }
            
            .quick-view-add-to-cart.added {
                background: var(--success);
            }
            
            .quick-view-add-to-wishlist {
                width: 45px;
                height: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--bg-secondary);
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 1.2rem;
                color: var(--text-muted);
            }
            
            .quick-view-add-to-wishlist:hover,
            .quick-view-add-to-wishlist.active {
                background: var(--primary);
                color: white;
            }
            
            @media (max-width: 768px) {
                .quick-view-details {
                    padding: 20px;
                }
                
                .quick-view-image {
                    padding: 20px 20px 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
}


function initMobileMenu() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (!mobileMenuToggle || !navMenu) return;

    mobileMenuToggle.addEventListener('click', function () {
        mobileMenuToggle.classList.toggle('active');
        navMenu.classList.toggle('show-mobile-menu');
    });


    document.addEventListener('click', function (event) {
        if (navMenu.classList.contains('show-mobile-menu') &&
            !navMenu.contains(event.target) &&
            !mobileMenuToggle.contains(event.target)) {
            navMenu.classList.remove('show-mobile-menu');
            mobileMenuToggle.classList.remove('active');
        }
    });
}


window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
    if (!localStorage.getItem('theme')) {
        if (e.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    }
});


function initScrollAnimations() {
    const animateElements = [
        ...document.querySelectorAll('.grid-item'),
        ...document.querySelectorAll('.collection-grid'),
        document.querySelector('.new-releases')
    ].filter(el => el);

    if (!animateElements.length) return;


    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);

                if (entry.target.classList.contains('grid-item')) {
                    const content = entry.target.querySelector('.content');
                    if (content) {
                        setTimeout(() => {
                            content.classList.add('animate-in');
                        }, 300);
                    }
                }
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });


    animateElements.forEach(el => {

        if (!el.classList.contains('scroll-animate')) {
            el.classList.add('scroll-animate');
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';

            if (el.classList.contains('grid-item')) {
                const content = el.querySelector('.content');
                if (content) {
                    content.style.opacity = '0';
                    content.style.transform = 'translateY(30px)';
                }
            }

            observer.observe(el);
        }
    });


    if (!document.getElementById('scroll-animation-styles')) {
        const style = document.createElement('style');
        style.id = 'scroll-animation-styles';
        style.textContent = `
            .scroll-animate {
                transition: opacity 0.7s ease, transform 0.7s ease;
            }
            
            .grid-item .content {
                transition: opacity 0.5s ease 0.3s, transform 0.5s ease 0.3s;
            }
            
            .animate-in {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    }
}


function initBannerScroll() {
    const banner = document.querySelector('.shipping-banner');
    if (!banner) return;

    const bannerScroll = banner.querySelector('.banner-scroll');
    if (!bannerScroll) return;

    const content = bannerScroll.innerHTML;
    bannerScroll.innerHTML = content + content;


    const textWidth = bannerScroll.scrollWidth / 2;
    const duration = Math.max(15, textWidth / 50);


    if (!document.getElementById('banner-scroll-style')) {
        const style = document.createElement('style');
        style.id = 'banner-scroll-style';
        style.textContent = `
            .shipping-banner {
                overflow: hidden;
                position: relative;
            }
            
            .banner-scroll {
                display: inline-block;
                white-space: nowrap;
                animation: bannerScroll ${duration}s linear infinite;
            }
            
            @keyframes bannerScroll {
                from { transform: translateX(0); }
                to { transform: translateX(-50%); }
            }
            
            .shipping-banner:hover .banner-scroll {
                animation-play-state: paused;
            }
        `;
        document.head.appendChild(style);
    }
}


function initSpecialOffers() {

    const lastShown = localStorage.getItem('astonicSpecialOfferLastShown');
    const now = Date.now();

    if (!lastShown || (now - parseInt(lastShown)) > 86400000) {

        setTimeout(showSpecialOffer, 3000);
    }

    function showSpecialOffer() {

        const popup = document.createElement('div');
        popup.className = 'special-offer-popup';
        popup.innerHTML = `
            <div class="special-offer-content">
                <button class="close-offer">&times;</button>
                <h3>EXCLUSIVE OFFER</h3>
                <p>Use code <strong>ASTONIC25</strong> for 10% off your first order.</p>
                <a href="/shop" class="offer-btn">SHOP NOW</a>
            </div>
        `;


        document.body.appendChild(popup);


        setTimeout(() => {
            popup.classList.add('show');
        }, 100);


        const closeBtn = popup.querySelector('.close-offer');
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                popup.classList.remove('show');
                setTimeout(() => {
                    popup.remove();
                }, 300);


                localStorage.setItem('astonicSpecialOfferLastShown', now.toString());
            });
        }


        addSpecialOfferStyles();
    }
}

function addSpecialOfferStyles() {
    if (!document.getElementById('special-offer-styles')) {
        const style = document.createElement('style');
        style.id = 'special-offer-styles';
        style.textContent = `
            .special-offer-popup {
                position: fixed;
                bottom: 20px;
                left: 20px;
                background: white;
                box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
                border-radius: 8px;
                z-index: 1000;
                max-width: 320px;
                transform: translateY(100px);
                opacity: 0;
                transition: transform 0.4s ease, opacity 0.4s ease;
                border-top: 4px solid var(--primary);
            }
            
            .special-offer-popup.show {
                transform: translateY(0);
                opacity: 1;
            }
            
            .special-offer-content {
                padding: 25px;
                position: relative;
            }
            
            .close-offer {
                position: absolute;
                top: 10px;
                right: 10px;
                background: none;
                border: none;
                font-size: 20px;
                cursor: pointer;
                color: #666;
                transition: color 0.3s ease;
            }
            
            .close-offer:hover {
                color: var(--primary);
            }
            
            .special-offer-content h3 {
                font-family: var(--athletic-font);
                font-size: 1.5rem;
                margin-bottom: 10px;
                color: var(--primary);
            }
            
            .special-offer-content p {
                margin-bottom: 15px;
            }
            
            .special-offer-content strong {
                color: var(--primary);
                font-weight: 700;
            }
            
            .offer-btn {
                display: inline-block;
                background: var(--primary);
                color: white;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 4px;
                font-weight: 700;
                font-family: var(--heading-font);
                transition: all 0.3s ease;
            }
            
            .offer-btn:hover {
                background: var(--primary-hover);
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(177, 18, 38, 0.25);
            }
            
            @media (max-width: 480px) {
                .special-offer-popup {
                    left: 10px;
                    right: 10px;
                    max-width: calc(100% - 20px);
                }
            }
        `;
        document.head.appendChild(style);
    }
}


function showNotification(message, type = 'info') {
    let container = document.querySelector('.notification-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'notification-container';
        document.body.appendChild(container);
    }


    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-icon">
            ${getNotificationIcon(type)}
        </div>
        <div class="notification-message">${message}</div>
    `;


    container.appendChild(notification);


    setTimeout(() => {
        notification.classList.add('show');
    }, 10);


    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);


    addNotificationStyles();
}

function getNotificationIcon(type) {
    switch (type) {
        case 'success':
            return '<i class="fas fa-check-circle"></i>';
        case 'error':
            return '<i class="fas fa-exclamation-circle"></i>';
        case 'warning':
            return '<i class="fas fa-exclamation-triangle"></i>';
        default:
            return '<i class="fas fa-info-circle"></i>';
    }
}

function addNotificationStyles() {
    if (!document.getElementById('notification-styles')) {
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
            .notification-container {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            
            .notification {
                display: flex;
                align-items: center;
                background-color: white;
                color: var(--text-primary);
                padding: 12px 15px;
                border-radius: 6px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                min-width: 280px;
                max-width: 400px;
                transform: translateX(100%);
                opacity: 0;
                transition: transform 0.3s ease, opacity 0.3s ease;
                border-left: 4px solid #3498db;
            }
            
            .notification.show {
                transform: translateX(0);
                opacity: 1;
            }
            
            .notification-icon {
                margin-right: 10px;
                font-size: 1.2rem;
            }
            
            .notification-message {
                flex: 1;
                font-weight: 500;
            }
            
            .notification-success {
                border-left-color: #2ecc71;
            }
            
            .notification-success .notification-icon {
                color: #2ecc71;
            }
            
            .notification-error {
                border-left-color: #e74c3c;
            }
            
            .notification-error .notification-icon {
                color: #e74c3c;
            }
            
            .notification-warning {
                border-left-color: #f39c12;
            }
            
            .notification-warning .notification-icon {
                color: #f39c12;
            }
            
            .notification-info {
                border-left-color: #3498db;
            }
            
            .notification-info .notification-icon {
                color: #3498db;
            }
            
            @media (max-width: 480px) {
                .notification-container {
                    right: 10px;
                    left: 10px;
                }
                
                .notification {
                    min-width: 0;
                    max-width: 100%;
                }
            }
        `;
        document.head.appendChild(style);
    }
}

/**
 * Helper functions
 */
function getPlaceholderImage() {
    return 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17e0e4e8511%20text%20%7B%20fill%3A%23b11226%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17e0e4e8511%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23f8f1f2%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.5%22%20y%3D%2296.5%22%3EAstonic%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E';
}