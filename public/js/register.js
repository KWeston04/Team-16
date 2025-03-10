document.getElementById("registerSection").addEventListener("submit", function(event) {
    
    event.preventDefault();
    
    const Email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const Confirmpassword = document.getElementById("password_confirmation").value;
    const MobileNumber = document.getElementById("phone_number").value;

    if (!Email.includes("@") || (!Email.includes("."))){
     alert("please enter Email must be valid");
     return;
 
    }

   if (password.length<8){
    alert("password must contain atleast 8 characters");
    return;

   }
   if(password !== Confirmpassword){
    alert("password does not match");
    return;
    
   }
   if(MobileNumber.length<11){
    alert("Please enter a valid mobile Number(Atleast 11 digits)");
    return;
   }
   this.submit();
})