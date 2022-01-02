<?php 
session_start();
include('dbcon.php');

// delete_btn code here
if (isset($_POST['delete_btn'])) {
    $del_id = $_POST['delete_btn'];
    $ref_table = 'contacts/'.$del_id;
    $delete_query = $database->getReference($ref_table)->remove();
    if ($delete_query) {
        $_SESSION['message'] = 'Contact Deleted Successfully';
        header('location: index.php');
    }else{
        $_SESSION['message'] = 'Contact Not Deleted';
        header('location: index.php');
    }

}
// data update code here
if (isset($_POST['update_contact'])) {
    $key = $_POST['key'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $updateData = [
        'fname' => $first_name,
        'lname' => $last_name,
        'email' => $email,
        'phone' => $phone
    
    ];
    $ref_table = 'contacts/'.$key;
    $updateQuery = $database->getReference($ref_table)->update($updateData);
    if ($updateQuery) {
        $_SESSION['message'] = '<h4 class="alert alert-success">Contact Updated</h4>';
        header('location: index.php');
        exit();
    }else{
        $_SESSION['message'] = '<h4 class="alert alert-danger">Contact Not Updated</h4>';
        header('location: index.php');
        exit();
    }
}

// data insert code starts here.
if (isset($_POST['save_contact'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $postData = [
        'fname' => $first_name,
        'lname' => $last_name,
        'email' => $email,
        'phone' => $phone
    
    ];
    $ref_table = 'contacts';
$postRef_result = $database->getReference($ref_table)->push($postData);
    if ($postRef_result) {
        $_SESSION['message'] = 'Contact Added Successfully';
        //echo '<script>alert("Data Saved Successfully")</script>';
        //echo '<script>window.location.href="index.php"</script>';
        header('location:index.php');
    }else{
        //echo '<script>alert("Data Not Saved")</script>';
        $_SESSION['message'] = 'Contact Not Added';
        header('location:index.php');
    }
}
?>