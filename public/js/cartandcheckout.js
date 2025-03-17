document.addEventListener("DOMContentLoaded", () => {
    const qtyButtons = document.querySelectorAll(".qty-btn");
    const removeButtons = document.querySelectorAll(".remove-item");
    const checkoutButton = document.querySelector(".checkout-btn");
    const applyBtn = document.querySelector(".apply-btn");
    const promoInput = document.querySelector(".coupon-section input");
    const shippingSection = document.querySelector(".shipping-method");
    const shippingOptions = document.querySelectorAll('input[name="shipping"]');
    let discount = 0;
 

    const defaultShippingOption = document.querySelector('input[name="shipping"]:checked');
    if (defaultShippingOption) {
        const defaultShippingCost = defaultShippingOption.value;
        sessionStorage.setItem('shippingCost', defaultShippingCost);
    }

    // Discount Tiers
    const discountTiers = [
        { threshold: 50, discount: 0.05 },
        { threshold: 100, discount: 0.10 },
        { threshold: 200, discount: 0.15 }
    ];

    // Promo Code
    applyBtn.addEventListener("click", () => {
        const promoCode = promoInput.value.trim().toUpperCase();
        discount = promoCode === "ASTONIC24" ? 0.05 : 0;
        sessionStorage.setItem('discount', discount);
        alert(discount ? "Promo code applied! You get 5% off." : "Invalid promo code.");
        updateTotals();
        promoInput.value = '';
    });

    // Update Totals
    function updateTotals() {
        let subtotal = 0;
        document.querySelectorAll(".cart-item").forEach(item => {
            const unitPrice = parseFloat(item.getAttribute("data-price")); // Get unit price
            const quantity = parseInt(item.querySelector("select[name='quantity']").value); // Get selected quantity
            const itemTotal = unitPrice * quantity; // Calculate total for this item

            // Update displayed item price
            const priceElement = item.querySelector(".item-price");
            if (priceElement) {
                priceElement.textContent = itemTotal.toFixed(2);
            }

            subtotal += itemTotal; // Add to subtotal
        });

        // Get selected shipping option value
        const shippingOption = document.querySelector('input[name="shipping"]:checked');
        const delivery = shippingOption ? parseFloat(shippingOption.value) : 4.50;

        // Calculate discount based on tiers or promo code
        let currentDiscount = discount;
        const tierDiscount = getTierDiscount(subtotal);
        if (tierDiscount > currentDiscount) {
            currentDiscount = tierDiscount;
        }

        const discountAmount = subtotal * currentDiscount;
        const total = subtotal - discountAmount + delivery;

        // Update display elements
        document.getElementById("subtotal").textContent = "£" + subtotal.toFixed(2);
        document.getElementById("delivery").textContent = "£" + delivery.toFixed(2);
        document.getElementById("total").textContent = "£" + total.toFixed(2);

        // Display discount amount if applicable
        if (discountAmount > 0) {
            let discountElement = document.getElementById("discount");
            if (!discountElement) {
                // Create discount element if it doesn't exist
                const totalElement = document.querySelector(".Total");
                const discountP = document.createElement("p");
                discountP.innerHTML = `Discount: <span class="highlight" id="discount">-£${discountAmount.toFixed(2)}</span>`;
                totalElement.parentNode.insertBefore(discountP, totalElement);
            } else {
                discountElement.textContent = `-£${discountAmount.toFixed(2)}`;
            }
        }

        // Update UI elements based on cart state
        shippingSection.style.display = subtotal === 0 ? "none" : "block";
        checkoutButton.style.pointerEvents = subtotal === 0 ? "none" : "auto";
        checkoutButton.style.opacity = subtotal === 0 ? "0.5" : "1";
        checkoutButton.textContent = subtotal === 0 ? "CANNOT CHECKOUT" : "PROCEED TO CHECKOUT";

        updateSavingsMeter(subtotal, currentDiscount);
    }

    // Get the discount based on tier
    function getTierDiscount(subtotal) {
        const tier = discountTiers.find(t => subtotal >= t.threshold);
        return tier ? tier.discount : 0;
    }

    // Savings Meter
    function updateSavingsMeter(subtotal, currentDiscount) {
        const savingsBar = document.getElementById("savingsBar");
        const savingsAmount = document.getElementById("savingsAmount");
        const nextTierElement = document.getElementById("nextTier");

        // Calculate the discount amount
        const discountAmount = subtotal * currentDiscount;
        savingsAmount.textContent = discountAmount.toFixed(2);

        // Calculate the next tier
        let nextTierMessage = "";

        // Find the current tier index
        let currentTierIndex = -1;
        for (let i = 0; i < discountTiers.length; i++) {
            if (subtotal >= discountTiers[i].threshold) {
                currentTierIndex = i;
            } else {
                break;
            }
        }

        // Determine the next tier and amount needed
        if (currentTierIndex < discountTiers.length - 1) {
            // There is a next tier
            const nextTier = discountTiers[currentTierIndex + 1];
            const amountToNextTier = nextTier.threshold - subtotal;

            // Only show the positive amounts
            if (amountToNextTier > 0) {
                nextTierElement.textContent = amountToNextTier.toFixed(2);
                nextTierElement.parentElement.style.display = "block";
            } else {
                // We're at a tier boundary so we show the next tier instead
                if (currentTierIndex + 2 < discountTiers.length) {
                    const nextNextTier = discountTiers[currentTierIndex + 2];
                    const amountToNextNextTier = nextNextTier.threshold - subtotal;
                    nextTierElement.textContent = amountToNextNextTier.toFixed(2);
                    nextTierElement.parentElement.style.display = "block";
                } else {
                    // We're at or above the highest tier so just display the max text
                    nextTierElement.parentElement.innerHTML = "Congratulations! You've reached the maximum discount tier!";
                }
            }
        } else if (currentTierIndex === -1) {
            // Not yet at the first tier
            const firstTier = discountTiers[0];
            const amountToFirstTier = firstTier.threshold - subtotal;
            nextTierElement.textContent = amountToFirstTier.toFixed(2);
            nextTierElement.parentElement.style.display = "block";
        } else {
            // At the highest tier
            nextTierElement.parentElement.innerHTML = "Congratulations! You've reached the maximum discount tier!";
        }

        // Update the progress bar
        const maxTier = discountTiers[discountTiers.length - 1].threshold;
        const progress = Math.min((subtotal / maxTier) * 100, 100);
        savingsBar.style.width = progress + "%";

        document.querySelector(".savings-meter").style.display = subtotal === 0 ? "none" : "block";
    }

    // Initialize the shipping options event listeners
    shippingOptions.forEach(option => {
        option.addEventListener('change', () => {
            let shippingCost = option.value;
            sessionStorage.setItem('shippingCost', shippingCost); 
            updateTotals();
        });
    });

    // Quantity Buttons
    qtyButtons.forEach(button => {
        button.addEventListener("click", () => {
            let input = button.parentNode.querySelector("select[name='quantity']");
            let value = parseInt(input.value);
            input.value = button.classList.contains("plus") ? value + 1 : value > 1 ? value - 1 : 1;
            updateTotals();
        });
    });

    // Quantity Change
    document.addEventListener("change", event => {
        if (event.target.name === "quantity") {
            updateTotals();
        }
    });

    // Remove Item Button
    removeButtons.forEach(button => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const form = button.closest("form");
            if (form) {
                form.submit();
            }
        });
    });

    // Checkout Button
    checkoutButton.addEventListener("click", event => {
        if (parseFloat(document.getElementById("subtotal").textContent.replace("£", "")) === 0) {
            event.preventDefault();
            alert("You cannot proceed to checkout with an empty cart!");
        }
    });

    // Initial update
    updateTotals();
});

document.addEventListener("DOMContentLoaded", function () {
    const paymentSelect = document.getElementById("payment");
    const creditCardFields = document.getElementById("credit-card-fields");
    const checkoutForm = document.getElementById("checkout-form");

    const cardNumberInput = document.getElementById("card_number");
    const expiryDateInput = document.getElementById("expiry_date");
    const cvcInput = document.getElementById("cvc");

    paymentSelect.addEventListener("change", function () {
        if (paymentSelect.value === "credit-card") {
            creditCardFields.style.display = "block";
        } else {
            creditCardFields.style.display = "none";
        }
    });

    // Format the card number input
    cardNumberInput.addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric
        value = value.replace(/(\d{4})/g, "$1 ").trim(); // Add spaces
        e.target.value = value;
        validateCardNumber();
    });

    // Format expiry date input
    expiryDateInput.addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric
        if (value.length > 2) {
            value = value.slice(0, 2) + "/" + value.slice(2, 4);
        }
        e.target.value = value;
        validateExpiryDate();
    });

    // Limit the CVC to 3 digits
    cvcInput.addEventListener("input", function (e) {
        e.target.value = e.target.value.replace(/\D/g, "").slice(0, 3);
        validateCVC();
    });

    // Luhn algorithm for card number validation
    function isValidCardNumber(cardNumber) {
        cardNumber = cardNumber.replace(/\s/g, ""); // Remove spaces
        
        if (!/^\d{16}$/.test(cardNumber)) return false; // Must be 16 digits

        let sum = 0;
        for (let i = 0; i < cardNumber.length; i++) {
            let digit = parseInt(cardNumber[i], 10);
            if ((cardNumber.length - i) % 2 === 0) {
                digit *= 2;
                if (digit > 9) digit -= 9;
            }
            sum += digit;
        }
        return sum % 10 === 0;
    }

    // Validate card number and update styles
    function validateCardNumber() {
        const cardNumber = cardNumberInput.value.replace(/\s/g, "");
        if (isValidCardNumber(cardNumber)) {
            cardNumberInput.classList.remove("invalid");
            cardNumberInput.classList.add("valid");
            return true;
        } else {
            cardNumberInput.classList.remove("valid");
            cardNumberInput.classList.add("invalid");
            return false;
        }
    }

    // Validate expiry date and update styles
    function validateExpiryDate() {
        const expiryDate = expiryDateInput.value;
        const [month, year] = expiryDate.split("/");
        const currentYear = new Date().getFullYear() % 100; // Last 2 digits of the year
        const currentMonth = new Date().getMonth() + 1; // Months are 0 indexed

        if (/^\d{2}\/\d{2}$/.test(expiryDate) && 
            parseInt(month) >= 1 && 
            parseInt(month) <= 12 && 
            (parseInt(year) > currentYear || (parseInt(year) == currentYear && parseInt(month) >= currentMonth)))
        {
            expiryDateInput.classList.remove("invalid");
            expiryDateInput.classList.add("valid");
            return true;
        } else {
            expiryDateInput.classList.remove("valid");
            expiryDateInput.classList.add("invalid");
            return false;
        }
    }

    // Validate CVC and update styles
    function validateCVC() {
        const cvc = cvcInput.value;
        if (/^\d{3}$/.test(cvc)) {
            cvcInput.classList.remove("invalid");
            cvcInput.classList.add("valid");
            return true;
        } else {
            cvcInput.classList.remove("valid");
            cvcInput.classList.add("invalid");
            return false;
        }
    }

    // Validate all fields on form submission
    checkoutForm.addEventListener("submit", function (event) {
        if (paymentSelect.value === "credit-card") {
            const isCardValid = validateCardNumber();
            const isExpiryValid = validateExpiryDate();
            const isCvcValid = validateCVC();

            // For debugging 
            // console.log("Card Valid:", isCardValid, "Expiry Valid:", isExpiryValid, "CVC Valid:", isCvcValid);
            
            if (!isCardValid || !isExpiryValid || !isCvcValid) {
                event.preventDefault();
                alert("Please ensure all credit card fields are valid.");
            } else {
                // Form is valid so we can allow submission
                console.log("Form validation passed, submitting...");
                return true;
            }
        }
    });
});

document.getElementById('checkout-form').addEventListener('submit', function() {
    const discountCode = sessionStorage.getItem('discount');
    const shippingCost = sessionStorage.getItem('shippingCost');

    if (discountCode) {
        document.getElementById('discountCodeInput').value = discountCode;
    }
    if (shippingCost) {
        document.getElementById('shippingCostInput').value = shippingCost;
    }

});