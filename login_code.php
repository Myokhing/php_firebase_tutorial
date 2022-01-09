<?php
use Firebase\Auth\Token\Exception\InvalidToken;
// login code here
session_start();
include('dbcon.php');
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];
    //$query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    //$result = mysqli_query($conn, $query);



    try {
        $user = $auth->getUserByEmail("$email");

        try {
        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
          
        
        $idTokenString = $signInResult->idToken();;

try {
    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    // if you're using lcobucci/jwt ^4.0
$uid = $verifiedIdToken->claims()->get('sub');
    $_SESSION['verified_user_id'] = $uid;
    $_SESSION['idTokenString'] = $idTokenString;
    $_SESSION['message'] = 'Login Successful';
    header('location: home.php');
    exit();
} catch (InvalidToken $e) {
    echo 'The token is invalid: '.$e->getMessage();
} catch (\InvalidArgumentException $e) {
    echo 'The token could not be parsed: '.$e->getMessage();
}



        } catch (\Exception $e) {
            $_SESSION['message'] = 'Wronge Password';
        header('Location: login.php');
        }
        //$user = $auth->getUserByPhoneNumber('+49-123-456789');
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo $e->getMessage();
        $_SESSION['message'] = 'User not found';
        // $_SESSION['message_type'] = 'success';
        header('Location: login.php');
    }
    
}else{
    $_SESSION['message'] = 'User Login Failed';
    //$_SESSION['message_type'] = 'danger';
    header('Location: login.php');
}