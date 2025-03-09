document.getElementById("loginSection").addEventListener("submit", function(event) {
    
    event.preventDefault();

    const password = document.getElementById("password").value;
    const email = document.getElementById("Email").value;

    if (!email.includes("@") || (!email.includes("."))){
     alert("please enter Email must be valid");
     return;
 
    }

   if (password.length<8){
    alert("password must contain atleast 8 characters");
    return;

   }
   this.submit();
})