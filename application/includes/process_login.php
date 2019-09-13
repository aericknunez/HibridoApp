<?php
include_once '../common/Helpers.php';
include_once '../common/Mysqli.php';
include_once 'variables_db.php';
include_once 'DataLogin.php';
$seslog = new Login();

$seslog->sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $seslog->ValidaPass($_POST['password']); // The hashed password.
    
    if ($seslog->LogOn($email, $password) == true) {
        // Login success 
        echo '<script>
            window.location.href="application/includes/iniciar.php"
        </script>';
        exit();
    } else {
        // Login failed 
        echo "Error al iniciar";
        exit();
    }
} else {
        echo '<script>
            window.location.href="error.php?err=No se puede iniciar"
        </script>';
    // The correct POST variables were not sent to this page. 
    exit();
}