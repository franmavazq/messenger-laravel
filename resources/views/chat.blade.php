@extends('layouts.app')

@section('content')
    <!-- <messenger-component 
        :user= "{{ auth()->user() }}" /> -->
    <router-view 
        :user= "{{ auth()->user() }}" />
@endsection
<!-- The core Firebase JS SDK is always required and must be listed first -->
<!-- <script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-app.js"></script> -->

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<!-- <script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCTqclB-lNgl0tLqTNZXFWba-RM669b2B4",
    authDomain: "turistainfo-77007.firebaseapp.com",
    databaseURL: "https://turistainfo-77007.firebaseio.com",
    projectId: "turistainfo-77007",
    storageBucket: "turistainfo-77007.appspot.com",
    messagingSenderId: "743919633104",
    appId: "1:743919633104:web:abe80b37b347c15d"
  };

  // Initialize Firebase
//   firebase.initializeApp(firebaseConfig);
//   console.log(firebase.app().name);
var app = firebase.initializeApp(firebaseConfig);
var usersRef = firebase.database().ref('users');
</script> -->