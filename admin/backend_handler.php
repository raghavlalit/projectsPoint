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
        $project_title    = $_POST['project_title'];
        $project_author   = $_POST['project_author'];
        $project_url      = $_POST['project_url'];
        $language_used    = $_POST['language_used'];
        $database_used    = $_POST['database_used'];
        $frontend         = $_POST['frontend'];
        $description      = $_POST['description'];

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
                    $upload_project = "INSERT INTO projects (project_category,project_title,project_author,project_name,project_url_name,language_used,database_used,frontend,description)
                    VALUES('$project_category','$project_title','$project_author','$newFileName','$project_url','$language_used','$database_used','$frontend','$description')";
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
  case 'subscribe':
    $email = $_POST['email'];

    $insert_newsletter = "INSERT INTO newsletter (email) VALUES('$email')";
    $stmt_insert_newsletter = $conn->prepare($insert_newsletter);
    if($stmt_insert_newsletter->execute()) {
      $message = "Thank you for subscribing";
      header("Location:http://localhost/projects_point/index.php?success=".$message);
    }else{
      $message = "something went wrong !!!";
      header("Location:http://localhost/projects_point/index.php?error=".$message);
    }
    break;
  case 'contact':

    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $subject  = $_POST['subject'];
    $message    = $_POST['message'];

    $insert_contact = "INSERT INTO contact (name, email, subject, message) VALUES('$name','$email','$subject','$message')";
    $stmt_insert_contact = $conn->prepare($insert_contact);
    if($stmt_insert_contact->execute()) {
      $message = "Thank you for contacting us";
      header("Location:http://localhost/projects_point/contact.php?success=".$message);
    }else{
      $message = "something went wrong !!!";
      header("Location:http://localhost/projects_point/contact.php?error=".$message);
    }

    break;

  default:
    // code...
    break;
}

?>
