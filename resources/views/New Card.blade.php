<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports Profile</title>
  <style>
    body {
       font-family: Arial, sans-serif;
    }
   .NewCD-container{
    flex: 1;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      height: 500px;
      padding: 20px;
      }
 h1{
      text-align: center;
      color: white;
      background-color: #1a1a2e;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 15px;
      margin-right: 20px;

}
.logo {
      justify-content: center;
      display: flex;
      gap: 10px; 
    }
.logo img {
  height: 50px;
  width: auto;
  display: block;
}
  </style>
</head>
<body>
  <h1>New Card</h1>
  <div class="logo">
    <!-- <img src="visa.webp" alt="Visa Logo"> -->
    <img src="{{ asset('images/visa.webp') }}" alt="Visa Logo">
    <!-- <img src="Mastercard.jpg" alt="Mastercard Logo"> -->
    <img src="{{ asset('images/Mastercard.jpg') }}" alt="Mastercard Logo">
   <!-- <img src ="American-Express-Logo.png" alt=" american express"> -->
   <img src="{{ asset('images/American-Express-Logo.png') }}" alt="American-Express-Logo.png">
    <!-- <img src ="visa electron.jpg" alt="visa electron"> -->
    <img src="{{ asset('images/visa electron.jpg') }}" alt="visa electron">
    <!--<img src="maestro.jpg" alt="maestro">  -->
    <img src="{{ asset('images/maestro.jpg') }}" alt="maestro">
  </a>
</div>
    <div class="NewCD-container">
        <form id="NewCDSection">
            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" required><br>

            <br> <label for="cardName">Name on card</label>
            <input type="text" id="cardName" name="cardName" required><br>

            <br> <label for="ExpiryDate">Expiry Date (MM/YY)</label>
            <input type="ExpiryDate" id="ExpiryDate" name="ExpiryDate" required><br>

            <br> <label for="cvc">cvc/cvv</label>
            <input type="text" id="cvc" name="cvc" required><br>
            <br> <button type="submit">Submit</button>
        </form>    
    </div>
    <script>
        document.getElementById("NewCDSection").addEventListener("submit", function(event) {
        event.preventDefault();
  
        const cardNumber = document.getElementById('cardNumber').value;
        const cardName = document.getElementById('cardName').value;
        const ExpiryDate = document.getElementById('ExpiryDate').value;
        const cvc = document.getElementById('cvc').value;

        if(cardNumber.length < 16){
        alert("card number must be atleast 16 digits");
        return;
        }

        if(cardName() == ""){
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
    </script>
</body>
</html>