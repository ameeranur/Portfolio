<?php
include_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_project'])) {

    // Array to store uploaded file names
    $uploadedFiles = [];

    // Function to handle file upload
    function handleFileUpload($fieldName) {
        global $uploadedFiles;
        if ($_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $fileName = $_FILES[$fieldName]['name'];
            $fileTmp = $_FILES[$fieldName]['tmp_name'];
            $destination = 'img/' . $fileName;
            move_uploaded_file($fileTmp, $destination);
            $uploadedFiles[$fieldName] = $fileName;
        }
    }

    // Handle each file upload
    handleFileUpload('fileIMG_one');
    handleFileUpload('fileIMG_two');
    handleFileUpload('fileIMG_three');
    handleFileUpload('fileIMG_four');
    handleFileUpload('fileIMG_five');

    // Extract data from form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stacks_used = $_POST['stacks_used'];
    $year = $_POST['year'];
 

    // Prepare and execute SQL statement
    $stmt = $con->prepare("INSERT INTO project (name, first_img, second_img, third_img, fourth_img, fifth_img, description, stack, year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssi", $name, $uploadedFiles['fileIMG_one'], $uploadedFiles['fileIMG_two'], $uploadedFiles['fileIMG_three'], $uploadedFiles['fileIMG_four'], $uploadedFiles['fileIMG_five'], $description, $stacks_used, $year);
    $stmt->execute();

    // Redirect to the about.php page
    header("Location: projects.php");
    exit();
}
?>




<!DOCTYPE html>
<html>
<head>
  <title>Content Management</title>
  <link rel="stylesheet" href="../css/admincms.css">
  <link rel="stylesheet" href="../css/project.css">
  <meta charset="UTF-8">

</head>
</head>

<body>

  <!-- Sidebar -->

      <?php
      include 'sidebar.php'; // Include the sidebar
      ?>

    <div class="content">

        <div class="content">


           
            
            <!-- Section 4 :  PROJECTS -->

            <div class="section" id="projects">
              <h3>Projects</h3>

              <div class="view" id="width">

                      <table id="project-table">
                          <thead>
                              <tr>
                          
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Year</th>
                                  <th>Stack</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                                
                                $sql = "SELECT * FROM project";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["description"] . "</td>";
                                        echo "<td>" . $row["year"] . "</td>";
                                        echo "<td>" . $row["stack"] . "</td>";
                                      
                                        echo "<td><a href='delete_project.php?id=" . $row["id"] . "' class='btn btn-danger'
                                        onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                        
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No messages found</td></tr>";
                                }
                                ?>
                        
                          </tbody>
                      </table>
              </div>

              <form action="" method="POST" enctype="multipart/form-data">

              <label for="fileIMG_one">Image One</label>
              <input type="file" id="fileIMG_one" name="fileIMG_one">
              
              <label for="fileIMG_two">Image Two</label>
              <input type="file" id="fileIMG_two" name="fileIMG_two">
              
              <label for="fileIMG_three">Image Three</label>
              <input type="file" id="fileIMG_three" name="fileIMG_three">    

              <label for="fileIMG_four">Image Four</label>
              <input type="file" id="fileIMG_four" name="fileIMG_four">    

              <label for="fileIMG_five">Image Five</label>
              <input type="file" id="fileIMG_five" name="fileIMG_five">               


                <label for="title">Title</label>
                <input type="text" id="title" name="name" placeholder="Enter your project title">

                <label for="year">Year</label>
                <input class="year" type="number" id="year" name="year" placeholder="Year">
                
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter your description"></textarea>
                
                <label for="stacks_used">Stack Used</label>
                <input type="text" id="stacks_used" name="stacks_used" placeholder="Enter stack used">
                
                <input type="submit" name="submit_project" value="Add Project">
              </form>
            </div>

            


  </body>
</html>