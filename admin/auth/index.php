<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include '../../lib/admin_head.php'; ?>

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

        div#or {
            text-align: center;
            opacity: .3;
            font-weight: bold;
        }
    </style>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <h1>Welcome Admin</h1>
        <div id="loader" style="text-align:center">Loading...</div>

        <input type="text" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <button onclick="loginWithUsernameAndPassword()">Login</button>
        <!-- <button onclick="createUser()">Create user</button> -->

        <div id="or">OR</div>
        <div id="firebaseui-auth-container"></div>
    </div>
    <script>
        function createUser() {
            var email = document.getElementById("email").value
            var password = document.getElementById("password").value

            firebase.auth().createUserWithEmailAndPassword(email, password)
                .then((userCredential) => {
                    // Signed in 
                    var user = userCredential.user;
                    console.log("User created")
                    // ...
                })
                .catch((error) => {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    console.log(errorMessage)
                    // ..
                });
        }
    </script>
    <script>
        function loginWithUsernameAndPassword() {
            var email = document.getElementById("email").value
            var password = document.getElementById("password").value

            console.log(email, password)

            firebase.auth().signInWithEmailAndPassword(email, password)
                .then((userCredential) => {
                    // Signed in
                    var user = userCredential.user;
                    console.log("Logged in")
                    window.location = '/admin/counts/'
                    // ...
                })
                .catch((error) => {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    console.log(errorMessage)
                });
        }
    </script>



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