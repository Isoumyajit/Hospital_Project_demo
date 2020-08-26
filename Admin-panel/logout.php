
 <!-- Logout Modal-->

<?php
    session_start();

           unset($_SESSION['uname']);
           header('location:admin_login.php');
?>