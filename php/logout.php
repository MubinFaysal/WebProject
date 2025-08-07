<?php
session_start();
session_destroy();
header("Location:../html/signup_signin.html");
exit();
?>
