
<?php
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data

    $school = $_POST['school'];
    $course = $_POST['course'];
    $startyear = $_POST['year_start'];
    $endyear = $_POST['year_end'];
    $address = $_POST['address'];



    // Prepare and execute the SQL query for insertion
    $stmt = $con->prepare("INSERT INTO education (school, course, year_start, year_end, address) VALUES (?,?, ?,?, ?)");
    $stmt->bind_param("sssss",  $school,$course,$startyear, $endyear,$address);
    $stmt->execute();

    // Redirect to the contact.php page
    header("Location: about.php");
    exit();
}
?>