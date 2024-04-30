<?php
   

   include_once('../config.php');
   session_start();
   if (!isset($_SESSION['ID'])) {
       header("Location:admin.php");
       exit();
   }

   $query_ipcr = "SELECT * FROM home "; 
  $result_ipcr = $con->query($query_ipcr); 

  if ($result_ipcr->num_rows > 0) {
  $ipcr_row = $result_ipcr->fetch_assoc();
                    $stdid = $ipcr_row['id'];
                    $first_name = $ipcr_row['first_name'];
                    $last_name = $ipcr_row['last_name'];
                    $description = $ipcr_row['description'];
                    $home_picture = $ipcr_row['home_picture'];
                    $cv = $ipcr_row['cv'];
 

}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admincms.css">
    <title>Home CMS</title>
    
</head>
<body>
    
      <?php
      include 'sidebar.php'; // Include the sidebar
      ?>

                  <!-- Section 1 :  HOME -->
              
                  <div class="section">

<div class="space">

<h3>Home</h3>



<div class="view">
  <div class="textview">
    <table class="table">
      <tbody>
        <tr>
          <th scope="row">Name</th>
          <td class="black"><?php echo $first_name?> <?php echo $last_name?></td>
        </tr>
        <tr>
          <th scope="row">Description</th>
          <td class="black"><?php echo $description?></td>
        </tr>
        <tr>
          <th scope="row">CV File</th>
          <td><a href="img/<?php echo $cv?>" target="_blank">Download CV</a></td>
        </tr>
        <tr>
          <th scope="row">Profile Picture</th>
          <td><img src="img/<?php echo $home_picture?>" alt="Image"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

  <form action="home_update.php" method="POST" enctype="multipart/form-data">
    
  <label for="name">Name</label>
    <input type="text" id="name" name="first_name" value="<?php echo $first_name?>" placeholder="Enter your First Name">
    <input type="text" id="name" name="last_name" value="<?php echo $last_name?>" placeholder="Enter your Last Name">

  <label for="profession">Description</label>
    <input type="text" id="profession" name="description" value="<?php echo $description?>" placeholder="Enter your profession">

  <label for="profile_pic">CV File</label>
    <div class="mb-3">
      <img src="uploads/" class="rounded-circle img-thumbnail" alt="CV File" style="width: 150px;">
    </div>
  <input type="file" id="profile_pic" name="cv">

  <label for="profile_pic">Profile Picture</label>
      <div class="mb-3" >
        <img src="uploads/" class="rounded-circle img-thumbnail" alt="Profile Picture" style="width: 150px;">
      </div>
    <input type="file" id="profile_pic" name="fileImg"  value="<?php echo $home_picture?>">

  <input type="submit" name="submit_home" value="Update">
  </form>

</div>

</div>

<?php
      include 'footer.php'; // Include the footer
?>

</body>
</html>