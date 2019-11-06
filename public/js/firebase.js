const firebaseConfig = {
    apiKey: "AIzaSyDFaBfnGtc0kyuqllN_sMEaHvmBNvhfUi8",
    authDomain: "laravel-21db2.firebaseapp.com",
    databaseURL: "https://laravel-21db2.firebaseio.com",
    projectId: "laravel-21db2",
    storageBucket: "laravel-21db2.appspot.com",
    messagingSenderId: "55495310845",
    appId: "1:55495310845:web:41bfff7b8fb10f9f82ed94",
    measurementId: "G-JZ69R6TFRN"
};

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging
    .requestPermission()
    .then(function () {
        //MsgElem.innerHTML = "Notification permission granted."
        console.log("Notification permission granted.");

        // get the token in the form of promise
        return messaging.getToken()
    })
    .then(function (token) {
        //TokenElem.innerHTML = "token is : " + token;
        console.log(token);
    })
    .catch(function (err) {
        //ErrElem.innerHTML = ErrElem.innerHTML + "; " + err
        console.log("Unable to get permission to notify.", err);
    });

//messaging.onMessage(function (payload) {
//console.log("Message received. ", payload);
//NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload)
// -------------------------------------------------------------

messaging.onMessage(function (payload) {
    console.log("Message received. ", payload);
});
