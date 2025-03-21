document
    .getElementById("PDSection")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission
        const firstName = document.getElementById("FirstName").value;
        const lastName = document.getElementById("LastName").value;
        const address = document.getElementById("Address").value;
        const country = document.getElementById("country").value;

        if (firstName.length === "") {
            alert("Please enter a First Name");
            return;
        }

        if (lastName === "") {
            alert("Please enter a Last Name");
            return;
        }

        if (address === "") {
            alert("Please enter an address");
            return;
        }

        if (country === "") {
            alert("Please enter your country.");
            return;
        }

        alert("Changed successfully!");
        this.submit();
    });
