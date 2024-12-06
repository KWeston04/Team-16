<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astonic Sports Profile</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .nav-container {
            width: 200px;
            background-color: #1a1a2e;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-right: 20px;
        }

        .nav-container h2 {
            text-align: center;
            color: whitesmoke;
            margin-bottom: 20px;
        }

        .nav-link {
            display: block;
            padding: 10px;
            margin: 10px 0;
            text-decoration: none;
            color: #1a1a2e;
            background-color: whitesmoke;
            border-radius: 5px;
            text-align: center;
        }

        .nav-link:hover {
            background-color: #E9edf6;
        }

        /* Right Container - Content */
        .content-container {
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .content-container h1 {
            color: #1a1a2e;
            margin-bottom: 20px;
        }

        .content-container p {
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="nav-container">
        <h2>Astonic Sports</h2>
        <a href="Personal Details.html" class="nav-link">Personal Details</a>
        <a href="order history.html" class="nav-link">Order History</a>
        <a href="change password.html" class="nav-link">Change Password</a>
        <a href="payment method.html" class="nav-link">Payment Method</a>
        <a href="contact preferences.html" class="nav-link">Contact Preferences</a>
        <a href="contact us.html" class="nav-link">Contact Us</a>
        <a href="wishlist.html" class="nav-link">Wishlist</a>
    </div>
    <div class="content-container">
        <h1>Change password</h1>
        <form id="Changepasswordsection">
            <label for="OldPassword">Old Password</label>
            <input type = "text" id ="OldPassword" name="OldPassword" required><br>

            <br><label for="NewPassword">New Password</label>
            <input type="text" id="NewPassword" name="NewPassword" required><br>

            <br><label for="ConfirmPassword">Confirm Password</label>
            <input type="text" id="ConfirmPassword" name="ConfirmPassword" required><br>

            <br> <button type="Change password">Change password</button>
        </form>

    </div>
    <script>
        document.getElementById("Changepasswordsection").addEventListener("submit", function(event) {
            event.preventDefault();

            const OldPassword = document.getElementById('OldPassword').value;
            const NewPassword = document.getElementById('NewPassword').value;
            const ConfirmPassword = document.getElementById('ConfirmPassword').value;

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
    </script>
</body>

</html>
