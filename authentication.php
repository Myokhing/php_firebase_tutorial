<?php

use Firebase\Auth\Token\Exception\InvalidToken;

session_start();
include('dbcon.php');
if (isset($_SESSION['verified_user_id'])) {
    $uid = $_SESSION['verified_user_id'];
    $idTokenString = $_SESSION['idTokenString'];
    //$idTokenString = '...';

try {
    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    //echo '<h4 class="alert alert-success">'.$verifiedIdToken->getUid().'</h4>';
} catch (InvalidToken $e) {
    //echo 'The token is invalid: '.$e->getMessage();
    $_SESSION['expire_message'] = 'You must login to view this page.';
    header('location: logout.php');
    exit();
} catch (InvalidArgumentException $e) {
    echo 'The Token could not be parsed: : '.$e->getMessage();
    $_SESSION['expire_message'] = 'You must login to view this page.';
    header('location: logout.php');
    exit();
}
}
else{
    $_SESSION['message'] = 'You must login to view this page.';
    header('location: login.php');
    exit();
}