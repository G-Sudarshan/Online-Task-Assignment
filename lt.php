

<?php 
session_start();
echo "logout";  
unset($_SESSION['uid']);
unset($_SESSION['valid']);
unset($_SESSION['adminvalid']);
unset($_SESSION['username']);
unset($_SESSION['mail']);
unset($_SESSION['name']);
unset($_SESSION['surname']);
unset($_SESSION['birthdate']);

session_destroy();  
//destroy the session
header('location: index.php'); //to redirect back to "index.php" after logging out

?>

