document.addEventListener('DOMContentLoaded', function() {
    if (window.astonicEnhancedLoaded) {
        console.log('EnhancedHome.js already loaded, skipping initialization');
        return;
    }
   
    window.astonicEnhancedLoaded = true;
    
  
    initCartSystem();
    initWishlistSystem();
    initHeroSlider();
    setupProductInteractions();
});


function initCartSystem() {
  
    const cart = getCart();
    
  
    updateCartUI(cart);
    
   
    setupCartEventHandlers();
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

function updateCartUI(cart) {
    const cartCount = document.querySelector('.cart-count');
    const cartItemsContainer = document.getElementById('cart-items-container');
    const cartTotal = document.querySelector('.cart-total span:last-child');
    
    if (!cartCount || !cartItemsContainer || !cartTotal) return;
    
    try {
    
        const totalItems = cart.reduce((sum, item) => sum + (parseInt(item.quantity) || 1), 0);
        cartCount.textContent = totalItems;
        cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
        
      
        if (totalItems > 0) {
            let cartHTML = '';
            
            
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
          
            cartItemsContainer.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
        }
        
        // Calculate total
        const total = cart.reduce((sum, item) => {
            const price = parseFloat(item.price.replace(/[^0-9.]/g, ''));
            const quantity = parseInt(item.quantity) || 1;
            return sum + (price * quantity);
        }, 0);
        
      
        cartTotal.textContent = `£${total.toFixed(2)}`;
    } catch (error) {
        console.error('Error updating cart UI:', error);
        cartItemsContainer.innerHTML = '<div class="empty-cart">Error loading cart</div>';
    }
}

function setupCartEventHandlers() {
    const cartBtn = document.querySelector('.cart-btn');
    const cartDropdown = document.querySelector('.cart-dropdown');
    
    if (cartBtn && cartDropdown) {
     
        cartBtn.addEventListener('click', function(e) {
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
        document.addEventListener('click', function(event) {
            if (cartDropdown.classList.contains('show') && 
                !cartDropdown.contains(event.target) &&
                !cartBtn.contains(event.target)) {
                cartDropdown.classList.remove('show');
            }
        });
    }
}

function setupCartRemoveButtons() {
    const removeButtons = document.querySelectorAll('.remove-item');
    if (!removeButtons.length) return;
    
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.getAttribute('data-name');
            const productColor = this.getAttribute('data-color');
            removeFromCart(productName, productColor);
        });
    });
}

function addToCart(product) {
    // Validate product
    if (!product || !product.name || !product.price) {
        showNotification('Invalid product data.', 'error');
        return getCart();
    }
    
    // Set default quantity
    product.quantity = product.quantity || 1;
    
    
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
        console.error('Error adding to cart:', error);
        showNotification('Could not add item to cart.', 'error');
        return getCart();
    }
}

function removeFromCart(productName, productColor) {
   
    let cart = getCart();
    
    try {
        
        cart = cart.filter(item => !(item.name === productName && 
            (item.color === productColor || (!item.color && !productColor))));
        
       
        saveCart(cart);
        
       
        updateCartUI(cart);
        
       
        showNotification(`Item removed from your cart.`, 'info');
        
        return cart;
    } catch (error) {
        console.error('Error removing from cart:', error);
        showNotification('Could not remove item from cart.', 'error');
        return getCart();
    }
}


function initWishlistSystem() {
    
    const wishlist = getWishlist();
    
 
    createWishlistDropdown();
    
   
    updateWishlistUI(wishlist);
    
 
    setupWishlistEventHandlers();
    
    
    updateWishlistButtonStates();
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

function createWishlistDropdown() {

    if (document.querySelector('.wishlist-dropdown')) return;
    
    const wishlistBtn = document.querySelector('.wishlist-btn');
    if (!wishlistBtn) return;
    
  
    const parent = wishlistBtn.parentElement;
    
    
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
    
    // Add wishlist count badg
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
            
            // Add each item to wishlist HTML
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
            setupWishlistActionButtons();
        } else {
            // Show empty wishlist message
            wishlistItemsContainer.innerHTML = '<div class="empty-wishlist">Your wishlist is empty</div>';
        }
    } catch (error) {
        console.error('Error updating wishlist UI:', error);
        wishlistItemsContainer.innerHTML = '<div class="empty-wishlist">Error loading wishlist</div>';
    }
}

function setupWishlistEventHandlers() {
    const wishlistBtn = document.querySelector('.wishlist-btn');
    const wishlistDropdown = document.querySelector('.wishlist-dropdown');
    
    if (wishlistBtn && wishlistDropdown) {
        // Show dropdown on click for mobile
        wishlistBtn.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                wishlistDropdown.classList.toggle('show');
                
                // Close cart dropdown if open
                const cartDropdown = document.querySelector('.cart-dropdown');
                if (cartDropdown && cartDropdown.classList.contains('show')) {
                    cartDropdown.classList.remove('show');
                }
            }
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (wishlistDropdown.classList.contains('show') && 
                !wishlistDropdown.contains(event.target) &&
                !wishlistBtn.contains(event.target)) {
                wishlistDropdown.classList.remove('show');
            }
        });
    }
}

function setupWishlistActionButtons() {
    // Setup remove buttons
    const removeButtons = document.querySelectorAll('.remove-wishlist-item');
    if (removeButtons.length) {
        removeButtons.forEach(button => {
            button.addEventListener('click', function(e) {
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
            link.addEventListener('click', function(e) {
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
        // Ensure button has data-setup attribute to prevent duplicate event listeners
        if (!button.getAttribute('data-setup')) {
            button.setAttribute('data-setup', 'true');
            
            // Add click event
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const productImage = this.getAttribute('data-image');
                
                // Toggle wishlist state
                if (this.classList.contains('active')) {
                    // Remove from wishlist
                    this.classList.remove('active');
                    this.innerHTML = '<i class="far fa-heart"></i>';
                    removeFromWishlist(productName);
                } else {
                    // Add to wishlist
                    this.classList.add('active');
                    this.innerHTML = '<i class="fas fa-heart"></i>';
                    addToWishlist({
                        name: productName,
                        price: productPrice,
                        image: productImage,
                        quantity: 1
                    });
                }
            });
        }
        
        // Set initial state based on wishlist
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

function addToWishlist(product) {
    // Validate product
    if (!product || !product.name || !product.price) {
        showNotification('Invalid product data.', 'error');
        return getWishlist();
    }
    
    // Get existing wishlist
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
        
        // Update product buttons
        updateWishlistButtonStates();
        
        return wishlist;
    } catch (error) {
        console.error('Error removing from wishlist:', error);
        showNotification('Could not remove item from wishlist.', 'error');
        return getWishlist();
    }
}

/**
 * Hero Slider functionality
 */
function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    const prevBtn = document.querySelector('.hero-nav-prev');
    const nextBtn = document.querySelector('.hero-nav-next');
    
    if (!slides.length) return;
    
    let currentSlide = 0;
    let slideInterval;
    let isAnimating = false;
    
    
    startSlideInterval();
    
    // Previous slide button
    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            clearInterval(slideInterval);
            changeSlide('prev');
            startSlideInterval();
        });
    }
    

    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            clearInterval(slideInterval);
            changeSlide('next');
            startSlideInterval();
        });
    }
    
  
    dots.forEach(function(dot, index) {
        dot.addEventListener('click', function() {
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
            startSlideInterval(); 
        }, { passive: true });
        
        function handleSwipe() {
            if (isAnimating) return;
            const swipeThreshold = 50; // Minimum swipe distance
            
            if (touchEndX < touchStartX - swipeThreshold) {
              
                changeSlide('next');
            } else if (touchEndX > touchStartX + swipeThreshold) {
            
                changeSlide('prev');
            }
        }
    }
    
    function changeSlide(direction) {
        isAnimating = true;
        x
        const nextSlideIndex = direction === 'next' 
            ? (currentSlide + 1) % slides.length 
            : (currentSlide - 1 + slides.length) % slides.length;
        
        // Remove active class from current slide
        slides[currentSlide].classList.remove('active');
        
        // Add active class to next slide
        slides[nextSlideIndex].classList.add('active');
        
        // Update dots
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === nextSlideIndex);
        });
        
        // Update current slide
        currentSlide = nextSlideIndex;
        
        // Reset animation flag after animation completes
        setTimeout(() => {
            isAnimating = false;
        }, 1000); // Match with CSS transition duration
    }
    
    // Go to specific slide
    function goToSlide(index) {
        if (index === currentSlide) return;
        
        isAnimating = true;
        
        // Remove active class from current slide
        slides[currentSlide].classList.remove('active');
        
        // Add active class to target slide
        slides[index].classList.add('active');
        
        // Update dots
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
        
        // Update current slide
        currentSlide = index;
        
        // Reset animation flag after animation completes
        setTimeout(() => {
            isAnimating = false;
        }, 1000); // Match with CSS transition duration
    }
    
    // Start autoplay interval
    function startSlideInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(function() {
            if (!isAnimating) {
                changeSlide('next');
            }
        }, 6000); // Change slide every 6 seconds
    }
}

/**
 * Setup product interactions
 */
function setupProductInteractions() {
    // Setup add to cart buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    
    addToCartButtons.forEach(button => {
        // Skip if already set up
        if (button.getAttribute('data-setup')) return;
        button.setAttribute('data-setup', 'true');
        
        button.addEventListener('click', function(e) {
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
                
                // Reset after delay
                setTimeout(() => {
                    this.classList.remove('added');
                    this.textContent = originalText;
                }, 2000);
            } catch (error) {
                console.error('Error adding to cart:', error);
                showNotification('Could not add item to cart.', 'error');
            }
        });
    });
}


function showNotification(message, type = 'info') {
    // Create container if it doesn't exist
    let container = document.querySelector('.notification-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'notification-container';
        document.body.appendChild(container);
    }
    
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = message;
    
    // Add to container
    container.appendChild(notification);
    
    
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateY(0)';
    }, 10);
    
    // Remove after delay
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(20px)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}


function getPlaceholderImage() {
    return 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17e0e4e8511%20text%20%7B%20fill%3A%23b11226%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17e0e4e8511%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23f8f1f2%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.5%22%20y%3D%2296.5%22%3EAstonic%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E';
}