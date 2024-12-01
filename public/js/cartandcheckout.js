function updateTotals() {
    let subtotal = 0;
    const items = document.querySelectorAll('.bag-item');

    items.forEach(item => {
        const price = parseFloat(item.getAttribute('data-price')); 
        const quantity = parseInt(item.querySelector('select[name="quantity"]').value); // Get selected quantity
        subtotal += price * quantity; 
    });

    const delivery = subtotal > 100 ? 0 : subtotal === 0 ? 0 : 4.50;
    const total = subtotal + delivery;

    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('delivery').textContent = delivery.toFixed(2);
    document.getElementById('total').textContent = total.toFixed(2);

    const checkoutButton = document.querySelector('.checkout-button');
    if (subtotal === 0) {
        checkoutButton.style.pointerEvents = 'none'; 
        checkoutButton.style.opacity = '0.5';
        checkoutButton.textContent = "CANNOT CHECKOUT"; 
    } else {
        checkoutButton.style.pointerEvents = 'auto'; 
        checkoutButton.style.opacity = '1'; 
        checkoutButton.textContent = "CHECKOUT";
    }
}


document.addEventListener('change', function (event) {
    if (event.target.name === 'quantity') {
        updateTotals(); 
    }
});


document.addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-item')) {
        event.target.closest('.bag-item').remove();
        updateTotals(); 
    }
});

document.querySelector('.checkout-button').addEventListener('click', function (event) {
    event.preventDefault();
    if (parseFloat(document.getElementById('subtotal').textContent) === 0) {
        alert('You cannot proceed to checkout with an empty cart!');
        return;
    }
    alert('Proceeding to checkout!');
    window.location.href = 'checkout.blade.php'; 
});

updateTotals();
