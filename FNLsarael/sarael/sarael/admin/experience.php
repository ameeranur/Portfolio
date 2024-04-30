
<?php
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $agency = $_POST['agency'];
    $year_start = $_POST['year_start'];
    $year_end = $_POST['year_end'];
    $description = $_POST['description'];
    $position = $_POST['position'];
    


    // Prepare and execute the SQL query for insertion
    $stmt = $con->prepare("INSERT INTO experience (agency,year_start, year_end,description, position) VALUES (?,?,?, ?,?)");
    $stmt->bind_param("sssss", $agency,$year_start, $year_end,$description,$position);
    $stmt->execute();

    // Redirect to the contact.php page
    header("Location: about.php");
    exit();
}
?>