{{--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    --}}{{--<link rel="manifest" href="/public/manifest.json">--}}{{--

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/3.7.1/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyDFaBfnGtc0kyuqllN_sMEaHvmBNvhfUi8",
            authDomain: "laravel-21db2.firebaseapp.com",
            databaseURL: "https://laravel-21db2.firebaseio.com",
            projectId: "laravel-21db2",
            storageBucket: "laravel-21db2.appspot.com",
            messagingSenderId: "55495310845",
            appId: "1:55495310845:web:41bfff7b8fb10f9f82ed94",
            measurementId: "G-JZ69R6TFRN"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        // Retrieve Firebase Messaging object.
        const messaging = firebase.messaging();
        messaging.requestPermission().then(function() {
            console.log('Notification permission granted.');
            // TODO(developer): Retrieve an Instance ID token for use with FCM.
            // ...
        }).catch(function(err) {
            console.log('Unable to get permission to notify.', err);
        });
        messaging.getToken().then(function(currentToken) {
            if (currentToken) {
                console.log(currentToken);
                document.getElementById('token').innerHTML = currentToken;
            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                updateUIForPushPermissionRequired();
                setTokenSentToServer(false);
            }})

        /*messaging.getToken().then(function(currentToken) {
            if (currentToken) {
                console.log(currentToken);
                updateUIForPushEnabled(currentToken);
            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                updateUIForPushPermissionRequired();
                setTokenSentToServer(false);
            }
        }).catch(function(err) {
            console.log('An error occurred while retrieving token. ', err);
            showToken('Error retrieving Instance ID token. ', err);
            setTokenSentToServer(false);
        });
        function setTokenSentToServer(sent) {
            window.localStorage.setItem('sentToServer', sent ? '1' : '0');
        }
*/

    </script>
</head>
<body>
  <div class="container">
      <span style=" color: green" id="token">
  </span>
  </div>
</body>
</html>--}}

<html>
<title>Firebase Messaging Demo</title>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
<body>
<div id="token"></div>
<div id="msg"></div>
<div id="notis"></div>
<div id="err"></div>
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
<script>
    MsgElem = document.getElementById("msg");
    TokenElem = document.getElementById("token");
    NotisElem = document.getElementById("notis");
    ErrElem = document.getElementById("err");
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDFaBfnGtc0kyuqllN_sMEaHvmBNvhfUi8",
        authDomain: "laravel-21db2.firebaseapp.com",
        databaseURL: "https://laravel-21db2.firebaseio.com",
        projectId: "laravel-21db2",
        storageBucket: "laravel-21db2.appspot.com",
        messagingSenderId: "55495310845",
        appId: "1:55495310845:web:41bfff7b8fb10f9f82ed94",
        measurementId: "G-JZ69R6TFRN"
    };
    firebase.initializeApp(config);

    const messaging = firebase.messaging();
    messaging
        .requestPermission()
        .then(function () {
            MsgElem.innerHTML = "Notification permission granted.";
            console.log("Notification permission granted.");

            // get the token in the form of promise
            return messaging.getToken()
        })
        .then(function(token) {
            TokenElem.innerHTML = "token is : " + token;
            console.log(token);
        })
        .catch(function (err) {
            ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err;
            console.log("Unable to get permission to notify.", err);
        });

    messaging.onMessage(function(payload) {
        console.log("Message received. ", payload);
        NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload)
    });
</script>

</body>
</html>
