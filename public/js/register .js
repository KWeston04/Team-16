document.getElementById("registerSection").addEventListener("submit", function(event) {
    
    event.preventDefault();

    const Email = document.getElementById("Email").value;
    const password = document.getElementById("password").value;
    const Confirmpassword = document.getElementById("Confirmpassword").value;
    const mobileNumber = document.getElementById("mobileNumber").value;

    if (!Email.includes("@") || (!Email.includes("."))){
     alert("please enter Email must be valid");
     return;
 
    }
    if(mobileNumber.length<=11){
        alert("Please enter a valid mobile Number(Atleast 11 digits)");
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
   
   this.submit();
})


 