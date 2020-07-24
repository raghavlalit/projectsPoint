<?php
include('con_pdo.php');
session_start();

$type = $_POST['type'];

switch ($type) {
  case 'login':
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email = '" . $email. "'");
    $query->execute();
    if($row = $query->fetch(PDO::FETCH_ASSOC)){
      $password = $row['password'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
      header("Location:http://localhost/projects_point/admin/index.php");

    }else{
      $error_message = "User doesn't exist !!!";
    }

    break;
  case 'upload':
        $project_category = $_POST['project_category'];
        $project_title = $_POST['project_title'];
        $project_author = $_POST['project_author'];

        $file_name =  trim($_FILES['project']['name']);
        $file_size =  $_FILES['project']['size'];
        $file_tmp  =  $_FILES['project']['tmp_name'];
        $file_type =  $_FILES['project']['type'];

        $explode   =  explode('.', $_FILES['project']['name']);
        $text = end($explode);
        $file_ext = strtolower($text);

        if ($file_name != ''){
            $newFileName = time()."_".$file_name;
        }else{
            $newFileName = NULL;
        }
        $extensions = array("zip", "rar");
        if ($file_name != '') {
            if (in_array($file_ext, $extensions) === false) {
              $valid = 'false';
              $message = "Not a valid file extension !";
              header("Location:http://localhost/projects_point/admin/addproject.php?".$valid."&".$message);
            }else {
                if(move_uploaded_file($file_tmp,'uploads/'.$newFileName)) {
                    $upload_project = "INSERT INTO projects (project_category,project_title,project_author,project_name) VALUES('$project_category','$project_title','$project_author','$newFileName')";
                    $stmt_upload_project = $conn->prepare($upload_project);
                    if($stmt_upload_project->execute()) {
                      $valid = 'true';
                      $message = "project Updated !";
                      header("Location:http://localhost/projects_point/admin/addproject.php?".$valid."&".$message);
                    }else{
                      $valid = 'false';
                      $message = "Couldn't update project !";
                      header("Location:http://localhost/projects_point/admin/addproject.php?".$valid."&".$message);
                    }
                } else{
                    $valid = 'false';
                    $message = "Couldn't upload file !";
                    header("Location:http://localhost/projects_point/admin/addproject.php?".$valid."&".$message);
                }
            }
        }
    break;

  case 'register':
    // echo "<pre>";
    // print_r($_POST); die;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($pass!=$confirm_password){
      $message = 'Password and confirm password are not same';
      header("Location:http://localhost/projects_point/admin/register.php?error=".$message);
    }

    $query = $conn->prepare("SELECT id FROM users WHERE email = '" . $email. "'");
    $query->execute();
    if($row = $query->fetch(PDO::FETCH_ASSOC)){
      $message = "User already exist !!!";
      header("Location:http://localhost/projects_point/admin/index.php?error=".$message);

    }else{

      $insert_user = "INSERT INTO users (name, email, password) VALUES('$name','$email','$pass')";
      $stmt_insert_user = $conn->prepare($insert_user);
      if($stmt_insert_user->execute()) {
        $message = "User added successfully !!!";
        header("Location:http://localhost/projects_point/admin/register.php?success=".$message);
      }else{
        $message = "Couldn't add user !!!";
        header("Location:http://localhost/projects_point/admin/register.php?error=".$message);
      }

    }
    break;
  case 'update_profile':
    // echo "<pre>";
    // print_r($_POST); die;
    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $designation  = $_POST['designation'];
    $education    = $_POST['education'];
    $skills       = $_POST['skills'];

    $update_profile = "UPDATE users SET name='$name', designation='$designation', education='$education', skills='$skills' WHERE email='$email'";
    $stmt_update_profile = $conn->prepare($update_profile);
    if($stmt_update_profile->execute()) {
      $message = "Profile Updated successfully !!!";
      header("Location:http://localhost/projects_point/admin/profile.php?success=".$message);
    }else{
      $message = "Couldn't update profile !!!";
      header("Location:http://localhost/projects_point/admin/profile.php?error=".$message);
    }
    break;
  case 'update_profile':
    // code...
    break;
  case 'contact':
    // code...
    break;

  default:
    // code...
    break;
}

?>
