document.getElementById("NewCDSection").addEventListener("submit", function(event) {
    event.preventDefault();

    const cardNumber = document.getElementById('cardNumber').value;
    const cardName = document.getElementById('cardName').value;
    const expiryMonth = document.getElementById('expiryMonth').value;
    const expiryYear = document.getElementById('expiryYear').value;
    const cvc = document.getElementById('cvc').value;

    if (cardNumber.length < 16) {
        alert("Card number must be at least 16 digits.");
        return;
    }

    if (cardName.trim() === "") {
        alert("Please enter the name on the card.");
        return;
    }
    if (!expiryMonth || !expiryYear) {
        alert("Please select a valid expiry date.");
        return;
      }

    if (cvc.length !== 3) {
        alert("CVC must be exactly 3 digits.");
        return;
    }
    
    localStorage.setItem("cardNumber", cardNumber);
    localStorage.setItem("cardName", cardName);
    localStorage.setItem("expiryDate", expiryMonth + "/" + expiryYear);

    window.location.href = "payment method.html";
  });

  function goBack() {
    window.location.href = "payment method.html";
  }
