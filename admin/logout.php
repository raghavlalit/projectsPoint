<?php

session_start();
session_unset();
session_destroy();
header("Location:http://localhost/projects_point/index.php");
?>
