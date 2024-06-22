<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include '../../lib/admin_head.php'; ?>


    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <h1>Welcome Admin</h1>
        <div id="loader" style="text-align:center">Loading...</div>

        <div id="firebaseui-auth-container"></div>
    </div>


    <script type="text/babel">
        // Initialize the FirebaseUI Widget using Firebase.
        clientApp()

        const auth = firebase.auth()
        auth.onAuthStateChanged((user) => {
            if (user?.email == ADMIN_EMAIL) {
                window.location = '/admin/counts/'
            }
        })



        var ui = new firebaseui.auth.AuthUI(firebase.auth());
        var uiConfig = {
            callbacks: {
                signInSuccessWithAuthResult: function (authResult, redirectUrl) {
                    return true;
                },
                uiShown: function () {
                    document.getElementById('loader').style.display = 'none';
                }

            },
            signInFlow: 'popup',
            signInSuccessUrl: '/admin/counts/',
            signInOptions: [
                firebase.auth.GoogleAuthProvider.PROVIDER_ID,

            ],

        };
        ui.start('#firebaseui-auth-container', uiConfig);

    </script>
</body>

</html>