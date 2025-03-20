  const savedCardNumber = localStorage.getItem("cardNumber");
  const savedCardName = localStorage.getItem("cardName");
  const savedExpiryDate = localStorage.getItem("expiryDate");

  const cardDetailsContainer = document.getElementById("cardDetails");

  if (savedCardNumber && savedCardName && savedExpiryDate) {
    const maskedCardNumber = "•••• •••• •••• " + savedCardNumber.slice(-4);

    cardDetailsContainer.innerHTML = `
      <br><b><p> Card Details</p></b>
      <p><strong>Card Number:</strong> ${maskedCardNumber}</p>
      <p><strong>Name on Card:</strong> ${savedCardName}</p>
      <p><strong>Expiry Date:</strong> ${savedExpiryDate}</p>
      <button class="delete-btn" onclick="deleteCard()">Delete Card</button>
    `;
  } else {
    cardDetailsContainer.innerHTML = `<p>No payment methods saved yet.</p>`;
  }

  function deleteCard() {
    if (confirm("Are you sure you want to delete this card?")) {
      localStorage.removeItem("cardNumber");
      localStorage.removeItem("cardName");
      localStorage.removeItem("expiryDate");

      cardDetailsContainer.innerHTML = `<p>No payment methods saved yet.</p>`;
    }
  }