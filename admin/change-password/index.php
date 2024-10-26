<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>

<body>
    <!-- <?php include '../../lib/admin_head.php'; ?> -->
    <?php include '../../lib/admin_layout.php'; ?>
    <style>
        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-block: 10px;
            font-size: 20px;
            text-align: center;
            border: .5px solid #34a853;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            background: #34a853;
            padding: 10px;
            border: none;
            margin-block: 10px;
            color: white;
            font-size: 15px;
            font-stretch: condensed;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
        }

        button:hover {
            background-color: #1d8439;
        }
    </style>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <h2>Change admin password</h2>
        <input type="text" name="password" id="newPassword" placeholder="New password">
        <button onclick="updatePassword()">Submit</button>
    </div>
    <script>
        function updatePassword() {
            var newPassword = document.getElementById("newPassword").value

            const user = firebase.auth().currentUser;

            user.updatePassword(newPassword).then(() => {
                // Update successful.
                toast.success("Password changed.")
            }).catch((error) => {
                // An error ocurred
                // ...
                toast.error(error.message)
            });
        }
    </script>

</body>

</html>