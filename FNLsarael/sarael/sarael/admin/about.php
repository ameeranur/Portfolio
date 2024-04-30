<?php
include_once('../config.php');
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location:admin.php");
    exit();
}

$query_ipcr = "SELECT * FROM experience "; 
  $result_ipcr = $con->query($query_ipcr); 

  if ($result_ipcr->num_rows > 0) {
                    $ipcr_row = $result_ipcr->fetch_assoc();
                    $agency = $ipcr_row['agency'];
                    $year_start = $ipcr_row['year_start'];
                    $year_end = $ipcr_row['year_end'];
                    $position = $ipcr_row['position'];
                    $description = $ipcr_row['description'];
                    
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

                      <!-- Section 2 :  ABOUT -->
            
                      <div class="section" id="about">
              <h3>About</h3>

              <div class="view">
                <div class="textview">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Agency</th>
                        <th scope="col">Year Started</th>
                        <th scope="col">Year Ended</th>
                        <th scope="col">Position</th>
                        <th scope="col">Job Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody style="color:black;">
                    <?php
                                
                                  $sql = "SELECT * FROM experience";
                                  $result = $con->query($sql);

                                  if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row["agency"] . "</td>";
                                          echo "<td>" . $row["year_start"] . "</td>";
                                          echo "<td>" . $row["year_end"] . "</td>";
                                          echo "<td>" . $row["position"] . "</td>";
                                          echo "<td>" . $row["description"] . "</td>";
                                          echo "<td>  
                                          <a href='delete_experience.php?id=" . $row["id"] . "' class='btn btn-danger'
                                          onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                          
                                          echo "</tr>";
                                      }  //<a href='update_experience.php?id=" . $row["id"] . "' class='btn btn-danger'>Edit</a>
                                  } else {
                                      echo "<tr><td colspan='4'>No messages found</td></tr>";
                                  }
                                  ?>
                          
                    </tbody>
                  </table>
                </div>
              </div>
              

              <form action="experience.php" method="POST">
                <h3>Experience</h3>

                <!--
                <label for="images">Images (Pictures to be uploaded)</label>
                <input type="file" id="images" name="images">
                <input type="submit" name="submit_images" value="Upload Images">
                -->

                <label for="agency">Agency</label>
                <textarea id="agency" name="agency" placeholder="Enter your agency"></textarea>
                
                
                <label for="year">Year Start</label>
                <input class="year" type="number"  id="year" name="year_start" placeholder="Enter year">

                <label for="year_end">Year End</label>
                <input class="year" type="number"  id="year_end" name="year_end" placeholder="Enter year">

                <label for="position">Position</label>
                <textarea id="position" name="position" placeholder="Enter your position"></textarea>

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter your position"></textarea>
                
                <input type="submit" name="submit_about" value="Add Experience">
              </form>
              <div class="view">
                <div class="textview">
                  <table class="table" id="edu">
                    <thead>
                      <tr>
                        <th scope="col">School</th>
                        
                        <th scope="col">Address</th>
                        <th scope="col">Course</th>
                        <th scope="col">Year Started</th>
                        <th scope="col">Year Ended</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody style="color:black;">
                    <?php
                                
                                  $sql = "SELECT * FROM education";
                                  $result = $con->query($sql);

                                  if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row["school"] . "</td>";
                                         
                                          echo "<td>" . $row["address"] . "</td>";
                                          echo "<td>" . $row["course"] . "</td>";
                                          echo "<td>" . $row["year_start"] . "</td>";
                                          echo "<td>" . $row["year_end"] . "</td>";
                                          echo "<td><a href='delete_education.php?id=" . $row["id"] . "' class='btn btn-danger'
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
              </div>
              <form action="education.php" method="POST">

                <h3>Education</h3>

                <label for="school">School</label>
                <input type="text" id="school" name="school" placeholder="Enter your school">

                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter your address"></textarea>


                <label for="course">Course</label>
                <textarea id="course" name="course" placeholder="Enter your course"></textarea>

                <label for="year_start">Year Started</label>
                <input type="text" id="year_start" name="year_start" placeholder="Enter your school">

                <label for="year_end">Year end</label>
                <textarea id="year_end" name="year_end" placeholder="Enter your address"></textarea>
                
              
              
                <input type="submit" name="submit_about" value="Add Education">
              </form>

            </div>
            

</div>


<?php
      include 'footer.php'; // Include the footer
?>

    
</body>
</html>