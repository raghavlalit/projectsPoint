<?php
include('con_pdo.php');

$project_id = $_GET['delete_project'];
$delete_project = "DELETE FROM projects WHERE id ='$project_id'";
$query = $conn->prepare($delete_project);
if($query->execute()){
  $message = 'Project Deleted !!!';
  header("Location:http://localhost/projects_point/admin/register.php?success=".$message);
}else{
  $message = 'Something went wrong';
  header("Location:http://localhost/projects_point/admin/register.php?error=".$message);
}

?>
