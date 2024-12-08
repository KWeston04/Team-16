document.getElementById("resetpasswordsection").addEventListener("submit", function(event) {
    
    event.preventDefault();
    const Email = document.getElementById("Email").value;

    if (!Email.includes("@") || (!Email.includes("."))){
     alert("please enter Email must be valid");
     return;
 
    }

   this.submit();
})