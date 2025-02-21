document.getElementById("NewCDSection").addEventListener("submit", function(event) {
    event.preventDefault();

    const cardNumber = document.getElementById('cardNumber').value;
    const cardName = document.getElementById('cardName').value;
    const ExpiryDate = document.getElementById('ExpiryDate').value;
    const cvc = document.getElementById('cvc').value;

    if (cardNumber.length < 16) {
        alert("Card number must be at least 16 digits.");
        return;
    }

    if (cardName.trim() === "") {
        alert("Please enter the name on the card.");
        return;
    }

    if (cvc.length !== 3) {
        alert("CVC must be exactly 3 digits.");
        return;
    }

    if (!cardNumber || !cardName || !ExpiryDate || !cvc) {
        alert('Please fill in all fields!');
        return;
    }

    this.submit();
});
