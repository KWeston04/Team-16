document.addEventListener("DOMContentLoaded", () => {
    const qtyButtons = document.querySelectorAll(".qty-btn");
    const removeButtons = document.querySelectorAll(".remove-item");
    const checkoutButton = document.querySelector(".checkout-btn");
    const darkModeSwitch = document.getElementById("darkModeSwitch");


    const applyBtn = document.querySelector(".apply-btn");
    const promoInput = document.querySelector(".coupon-section input");
    let discount = 0;

    // Promo 

    applyBtn.addEventListener("click", () => {
        const promoCode = promoInput.value.trim().toUpperCase();
        if (promoCode === "ASTONIC24") {
            discount = 0.05; // 5% discount
            alert("Promo code applied! You get 5% off.");
        } else {
            discount = 0;
            alert("Invalid promo code.");
        }

        updateTotals();
        promoInput.value = '';
    });

    // Update Totals

    function updateTotals() {
        let subtotal = 0;
        const cartItems = document.querySelectorAll(".cart-item");
        const shippingSection = document.querySelector(".shipping-method");

        cartItems.forEach(item => {
            const price = parseFloat(item.getAttribute("data-price"));
            const quantity = parseInt(item.querySelector("select[name='quantity']").value);
            subtotal += price * quantity;
        });

    // shipping value
    const shippingOption = document.querySelector('input[name="shipping"]:checked');
    const delivery = shippingOption ? parseFloat(shippingOption.value) : 0;

    // Shipping Option 
    document.querySelectorAll('input[name="shipping"]').forEach(option => {
        option.addEventListener('change', () => {
        updateTotals();
    });
});

        const discountAmount = subtotal * discount;
        const total = subtotal - discountAmount + delivery;

        document.getElementById("subtotal").textContent = "£" + subtotal.toFixed(2);
        document.getElementById("delivery").textContent = "£" + delivery.toFixed(2);
        document.getElementById("total").textContent = "£" + total.toFixed(2);

        if (subtotal === 0) {
            shippingSection.style.display = "none";
            checkoutButton.style.pointerEvents = "none";
            checkoutButton.style.opacity = "0.5";
            checkoutButton.textContent = "CANNOT CHECKOUT";
        } else {
            shippingSection.style.display = "block";
            checkoutButton.style.pointerEvents = "auto";
            checkoutButton.style.opacity = "1";
            checkoutButton.textContent = "PROCEED TO CHECKOUT";
        }
    }

    // Quantity Button

    qtyButtons.forEach(button => {
        button.addEventListener("click", () => {
            let input = button.parentNode.querySelector("select[name='quantity']");
            let value = parseInt(input.value);

            if (button.classList.contains("plus")) {
                input.value = value + 1;
            } else if (button.classList.contains("minus") && value > 1) {
                input.value = value - 1;
            }
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
        button.addEventListener("click", () => {
            button.closest(".cart-item").remove();
            updateTotals();
        });
    });  

    // Checkout Button

    checkoutButton.addEventListener("click", event => {
        event.preventDefault();
        if (parseFloat(document.getElementById("subtotal").textContent.replace("£", "")) === 0) {
            alert("You cannot proceed to checkout with an empty cart!");
            return;
        }
        alert("Proceeding to checkout!");
        window.location.href = '/checkout'; 
    });

    updateTotals();
});
