document.getElementsById("login").addEventListener("submit", function(event) {
    
    event.preventDefault();

    const password = document.getElementsId("password").value;

   if (password.length<8){
    alert("password must contain atleast 8 characters");
    return;

   }
   this.submit();
})