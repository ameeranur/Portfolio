
<?php
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $skill_category = $_POST['skill_category'];
    $skillname = $_POST['skill'];
    $level = $_POST['level'];
   


    // Prepare and execute the SQL query for insertion
    $stmt = $con->prepare("INSERT INTO skill (category, skill_name, level) VALUES (?, ?,?)");
    $stmt->bind_param("sss", $skill_category, $skillname, $level);
    $stmt->execute();

    // Redirect to the contact.php page
    header("Location: skills.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admincms.css">
    <link rel="stylesheet" href="../css/skills.css">

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

                   <!-- Section 3 :  SKILLS -->

    <!-- Front End Skills Table -->
    <h2>My Skills</h2>

    <div class="view" id="width">

    <table id="skill-table">
    <thead>
        <tr>
            <th>Category</th>
            <th>Skill</th>
            <th>Level</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
                    <?php
                                
                                $sql = "SELECT * FROM skill";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["category"] . "</td>";
                                        echo "<td>" . $row["skill_name"] . "</td>";
                                        echo "<td>" . $row["level"] . "</td>";
                                       
                                        echo "<td><a href='delete_skill.php?id=" . $row["id"] . "' class='btn btn-danger'
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


                    <form action="" method="POST">

                    
                    <label for="skill">Select the skill category:</label>
                    
                    <select type="text" id="skill_category" name="skill_category">
                        <option value="" disabled selected hidden>Category</option>
                        <option value="Front-end">Front-end</option>
                        <option value="Back-end">Back-end</option>
                        <option value="Soft">Soft Skills</option>
                        <option value="Technical">Technical Skills</option>
                        <option value="Tool">Tools</option>
                    </select>
                        
                    <input type="text" id="skill" name="skill" placeholder="Enter your skill">
                    
                    <!-- 
                        GINAWA KO NA RIN ITONG DROPDOWN SA LEVELS, BAKA MAY NEED BAGUHIN SA DBS?
                        <input type="text" id="level" name="level" placeholder="Level">
                    -->
                    <select type="text" id="level_category" name="level">
                        <option value="" disabled selected hidden>Level</option>
                        <option value="Novice">Novice</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Expert">Expert</option>
                    </select>

                    <input type="submit" name="submit_experience" value="Add Skill">

                    </form>



   


</div>


</div>

    
<?php
      include 'footer.php'; // Include the footer
?>

</body>
</html>