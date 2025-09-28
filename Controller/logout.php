<?php
echo "<script>alert('Logout successful');</script>";
session_start();
session_unset();
session_destroy();
header("Location: ../View/user/login.php");
exit();
?>