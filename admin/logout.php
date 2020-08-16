<?php

session_start();
unset($_SESSION['projects_point']);
header("Location:http://localhost/projects_point/index.php");

?>
