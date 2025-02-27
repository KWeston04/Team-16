document
    .getElementById("Changepasswordsection")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const OldPassword = document.getElementById("OldPassword").value;
        const NewPassword = document.getElementById("NewPassword").value;
        const ConfirmPassword =
            document.getElementById("ConfirmPassword").value;

        if (OldPassword === "") {
            alert("Please enter old password");
            return;
        }

        if (NewPassword.length < 8) {
            alert("New password must be at least 8 characters long.");
            return;
        }

        if (NewPassword !== ConfirmPassword) {
            alert("The New Password does not match ");
            return;
        }
        alert("Password changed successfully!");
        this.submit();
    });
