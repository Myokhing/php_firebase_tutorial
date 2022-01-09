<?php

session_start();
unset($_SESSION['verified_user_id']);
unset($_SESSION['idTokenString']);
if (isset($_SESSION['expire_message'])) {
    $_SESSION['message'] = 'Session expired. Please login again.';

}else{
    $_SESSION['message'] = 'You have been logged out successfully..';
}
header('location: login.php');
exit();
?>