document.addEventListener("DOMContentLoaded", () => {
    const qtyButtons = document.querySelectorAll(".qty-btn");
    const removeButtons = document.querySelectorAll(".remove-item");
    const checkoutButton = document.querySelector(".checkout-btn");
    const applyBtn = document.querySelector(".apply-btn");
    const promoInput = document.querySelector(".coupon-section input");
    const shippingSection = document.querySelector(".shipping-method");
    let discount = 0;
    
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
        alert(discount ? "Promo code applied! You get 5% off." : "Invalid promo code.");
        updateTotals();
        promoInput.value = '';
    });

    // Update Totals
    function updateTotals() {
        let subtotal = 0;
        document.querySelectorAll(".cart-item").forEach(item => {
            const price = parseFloat(item.getAttribute("data-price"));
            const quantity = parseInt(item.querySelector("select[name='quantity']").value);
            subtotal += price * quantity;
        });

        const shippingOption = document.querySelector('input[name="shipping"]:checked');
        const delivery = shippingOption ? parseFloat(shippingOption.value) : 0;
        const discountAmount = subtotal * discount;
        const total = subtotal - discountAmount + delivery;

        document.getElementById("subtotal").textContent = "£" + subtotal.toFixed(2);
        document.getElementById("delivery").textContent = "£" + delivery.toFixed(2);
        document.getElementById("total").textContent = "£" + total.toFixed(2);

        shippingSection.style.display = subtotal === 0 ? "none" : "block";
        checkoutButton.style.pointerEvents = subtotal === 0 ? "none" : "auto";
        checkoutButton.style.opacity = subtotal === 0 ? "0.5" : "1";
        checkoutButton.textContent = subtotal === 0 ? "CANNOT CHECKOUT" : "PROCEED TO CHECKOUT";

        updateSavingsMeter(subtotal);
    }

    // Savings Meter
    function updateSavingsMeter(subtotal) {
        const savingsBar = document.getElementById("savingsBar");
        const savingsAmount = document.getElementById("savingsAmount");

        let tier = discountTiers.find(t => subtotal >= t.threshold) || { discount: 0 };
        discount = tier.discount;

        const discountAmount = subtotal * discount;
        savingsAmount.textContent = discountAmount.toFixed(2);

        const maxTier = discountTiers[discountTiers.length - 1].threshold;
        const progress = Math.min((subtotal / maxTier) * 100, 100);
        savingsBar.style.width = progress + "%";

        document.querySelector(".savings-meter").style.display = subtotal === 0 ? "none" : "block";
    }

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
        button.addEventListener("click", () => {
            button.closest(".cart-item").remove();
            updateTotals();
        });
    });

    // Shipping Option Change
    document.querySelectorAll('input[name="shipping"]').forEach(option => {
        option.addEventListener('change', updateTotals);
    });

    // Checkout Button
    checkoutButton.addEventListener("click", event => {
        event.preventDefault();
        if (parseFloat(document.getElementById("subtotal").textContent.replace("£", "")) === 0) {
            alert("You cannot proceed to checkout with an empty cart!");
        } else {
            alert("Proceeding to checkout!");
            window.location.href = '/checkout';
        }
    });

    updateTotals();
});
