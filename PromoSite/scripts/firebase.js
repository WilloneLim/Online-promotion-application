const firebase = document.querySelector('.firebase');

const script = `<script>
        var firebaseConfig = {
            apiKey: "AIzaSyCRj6bM0H-DPSEtVVv_AIto_LKsYuE2ddY",
            authDomain: "test-999fb.firebaseapp.com",
            databaseURL: "https://test-999fb.firebaseio.com",
            projectId: "test-999fb"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        
        // make auth and firebase ref
        const auth = firebase.auth();
        const db = firebase.firestore();
        const functions = firebase.functions();
        
        
        //UPLOADCARE
        UPLOADCARE_LOCALE = "en";
        UPLOADCARE_LIVE = "false";
        UPLOADCARE_PUBLIC_KEY = "f49b7b74d9cfddb1eb86";
        
        
        
    </script>`;


firebase.innerHTML = script;