<?php

  include_once('../config.php');
  session_start();
  if (!isset($_SESSION['ID'])) {
      header("Location:admin.php");
      exit();
  }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admincms.css">
    <title>Home CMS

    
    </title>
</head>
<body>
    
      <?php
      include 'sidebar.php'; // Include the sidebar
      ?>

                  <!-- Section 1 :  HOME -->
              
                  <div class="section">

<div class="space">
    
<!-- Section 5 :  CONTACT -->

  <div class="section" id="contacts">
              <h3>Contacts</h3>

            
              <!--<form action="methods.php" method="POST">
                 DITO MA VIEW YUNG RECEIVE MESSAGES then may CRUDss
              </form>
               -->
              
              <form>
              <div class="table-responsive">
                <table class="table textview contact">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th> <!-- Empty column for buttons -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                
                                $sql = "SELECT * FROM contact_me";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["phone"] . "</td>";
                                        echo "<td>" . $row["message"] . "</td>";
                                        echo "<td><a href='delete_contact.php?id=" . $row["id"] . "' class='btn btn-danger' 
                                        onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No messages found</td></tr>";
                                }
                                ?>
                        <!-- More rows can be added here -->
                    </tbody>
                </table>
              </div>
              </form>
            
            
            </div>
            
        </div>
      
    </div>


</div>

<?php
      include 'footer.php'; // Include the footer
?>

    
</body>
</html>