
<?php
include_once('../config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileImg'])) {

    if ($_FILES['fileImg']['error'] === UPLOAD_ERR_OK) {
      
      $file = $_FILES['fileImg']['tmp_name'];
      $fileName = $_FILES['fileImg']['name'];
      $file_cv = $_FILES['cv']['tmp_name'];
      $fileName_cv = $_FILES['cv']['name'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
        $description = $_POST['description'];
        $user_id = 1; 

        $destination_cv = 'img/' . $fileName_cv;
      $destination = 'img/' . $fileName;
      move_uploaded_file($file_cv, $destination_cv);
      move_uploaded_file($file, $destination);
  
      // Update the image field in the admin table
      $stmt = $con->prepare("UPDATE home SET first_name=?, last_name=?, description=?, home_picture=?, cv=?  WHERE id=?");
      $stmt->bind_param("sssssi", $first_name, $last_name,$description, $fileName, $fileName_cv, $user_id);
      $stmt->execute();
  
      // Redirect to the contact.php page
      header("Location: home.php");
      exit();
  
    } else {
   
    }
  }
?>