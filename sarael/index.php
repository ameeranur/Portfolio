<?php

include_once('config.php');


$query_home = "SELECT * FROM home "; 
$result_home = $con->query($query_home); 

if ($result_home->num_rows > 0) {
$row_home = $result_home->fetch_assoc();
                  $stdid = $row_home['id'];
                  $first_name = $row_home['first_name'];
                  $last_name = $row_home['last_name'];
                  $description = $row_home['description'];
                  $home_picture = $row_home['home_picture'];
                  $cv = $row_home['cv'];


}


function insertContactData($name, $email, $phone, $message, $con) {
    // Prepare SQL statement to insert data into the contact_me table
    $stmt = $con->prepare("INSERT INTO contact_me (name, email, phone, message) VALUES (?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    
    // Execute the SQL statement
    if ($stmt->execute()) {
        return true; // Insertion successful
    } else {
        return false; // Insertion failed
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Call the insertContactData function to insert data into the database
    if (insertContactData($name, $email, $phone, $message, $con)) {
        echo "<script>alert('Message sent successfully');</script>";
    } else {
        echo "<script>alert('Error sending message');</script>";
    }
}


?><!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <style>
            .image-container {
            max-width: 200px; /* Adjust the max-width as needed */
            margin: 0 auto; /* Centers the image container */
            }
        </style>

    </head>

<body>

    
   
    <div class="hero" id="home">	

    <!-- Header-->

        <nav> 
	      
            <a href="admin/admin.php">
                <img src="assets/logo2.png" alt="Logo" class="headerlogo">
            </a> 
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#skills">SKILLS</a></li>
                <li><a href="#projects">PROJECTS</a></li>
                <li><a href="#contact">CONTACT</a></li>                
            </ul>

        </nav>

        <img src="./assets/arrow1.png" alt="Arrow icon" class="icon arrow" id="headericon" onclick="location.href='./#about'">


    <!-- Section 1 :  HOME -->
        
        <section id="home" class="section section1">
        
            <h1>I'm <?php echo $first_name?> <span><?php echo $last_name?></span></h1>

                <p><?php echo $description?></p>
            
                <a href="admin/img/<?php echo $cv?>" target="_blank">Download CV</a>
                <a href="#contact">Contact Me</a>

                <div class="images">
                    <img src="assets/shape.png" class="shape">
                    <img src="admin/img/<?php echo $home_picture ?>" class="girl">
                </div>
  
        </section>
    
                    
                 
                

    </div>
   
    <!-- Section 2 :  ABOUT -->

    <div class="gray" id="about">

        <p class="txtcenter">Get To Know More</p>
        <h1 class="title labels">About Me</h1>

        <section  class="section section2">

            <div class="section2-container">  
                
                <div class="card-title">
                    <img src="./assets/experience.png" alt="Experience icon" class="icon">
                    <h3>Experience</h3>
                </div>

                <div id="scroll" style="height: 80%; overflow-y: auto; border: none;">
                <?php
                    
                  $query = "SELECT * FROM experience ORDER BY year_start ASC";
                        $result = $con->query($query);
                        
                        if ($result->num_rows > 0) {
       
                            while ($row = $result->fetch_assoc()) {
                                
                                $startyear = $row['year_start'];
                                $endyear = $row['year_end'];
                                $company_name = $row['agency'];
                                $position = $row['position'];
                                
                                $job_description = $row['description'];



                        
                    echo '<div class="card" >';
                    echo '  <h4>' . $company_name .  '</h4>';
                    echo '   <h5>' . $startyear .  '-' . $endyear .  '</h5>';
                    echo '   <p style="font-size: 13px;">' . $position .  '</p>';
                    echo '   <p style="font-size: 13px;">' . $job_description .  '</p>';
                    echo ' </div>';
                }
            }else {
                echo "No experience details found";
            }
                ?>

                </div>

            </div>

            <div class="section2-container">        

                <div class="card-title">
                    <img src="./assets/education.png" alt="Education icon" class="icon">
                    <h3>Education</h3>
                </div>
    
                <div id="scroll" style="height: 80%; overflow-y: auto; border: none;">
                <?php
                    
                    $query = "SELECT * FROM education ORDER BY year_start ASC";
                          $result = $con->query($query);
                          
                          if ($result->num_rows > 0) {
         
                              while ($row = $result->fetch_assoc()) {
                                  
                                  $startyear = $row['year_start'];
                                  $endyear = $row['year_end'];
                                  $school = $row['school'];
                                  $course = $row['course'];
                                  $address = $row['address'];
                                  
                                  


                                  echo '<div class="card">';
                                  echo ' <h4>' . $school .  '</h4>';
                                  echo '<h5>' . $startyear .  '-' . $endyear .  '</h5>';
                                  echo ' <p>' . $course .  '</p> ';
                                  echo '<p>' . $address .  '</p>';
                        
                                  echo '</div>';
        
                    
                }
            }else {
                echo "No education details found";
            }
                ?>

                </div>

            </div>

            <img src="./assets/arrow1.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#skills'">

        </section>
    </div>
	

    <!-- Section 3 :  SKILLS -->

    <div class="darkgray" id="skills">

        <p class="txtcenter" id="whitefont">Explore My</p>
        <h1 class="title labels" id="whitefont">Skills</h1>
        
        <section class="section section3">
        

            <div class="section3-container">  

          

                <div class="card-title">
                    <h3>Front-end Development</h3>
                </div>
                
                <div id="scroll" style="height: 35%; overflow-y: auto; border: none;">
                <?php
                    $query = "SELECT * FROM skill";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['category'] === 'Front-end') {
                                echo '<div class="card">';
                                echo '<h4>' . $row['skill_name'] . '</h4>';
                                echo '<p>' . $row['level'] . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>


                </div>

                <br>


                <div class="card-title">
                    <h3>Back-end Development</h3>
                </div>

                <div id="scroll" style="height: 35%; overflow-y: auto; border: none;">

                    <<?php
                    $query = "SELECT * FROM skill";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['category'] === 'Back-end') {
                                echo '<div class="card">';
                                echo '<h4>' . $row['skill_name'] . '</h4>';
                                echo '<p>' . $row['level'] . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>

                </div>

    
            </div>

            <div class="section3-container">  
            
                <div class="card-title">
                    <h3>Soft Skills</h3>
                </div>

                <div id="scroll" style="height: 90%; overflow-y: auto; border: none;">
                <?php
                    $query = "SELECT * FROM skill";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['category'] === 'Soft') {
                                echo '<div class="card">';
                                echo '<h4>' . $row['skill_name'] . '</h4>';
                                echo '<p>' . $row['level'] . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>

                </div>
    
            </div>

            <div class="section3-container">  
            
                <div class="card-title">
                    <h3>Technical Skills</h3>
                </div>

                <div id="scroll" style="height: 35%; overflow-y: auto; border: none;">

                <?php
                    $query = "SELECT * FROM skill";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['category'] === 'Technical') {
                                echo '<div class="card">';
                                echo '<h4>' . $row['skill_name'] . '</h4>';
                                echo '<p>' . $row['level'] . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>

                </div>

                
                <br>


                <div class="card-title">
                    <h3>Tools</h3>
                </div>

                <div id="scroll" style="height: 35%; overflow-y: auto; border: none;">
                <?php
                    $query = "SELECT * FROM skill";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['category'] === 'Tool') {
                                echo '<div class="card">';
                                echo '<h4>' . $row['skill_name'] . '</h4>';
                                echo '<p>' . $row['level'] . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                    


                </div>
        
    
            </div>

            <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#projects'">


        </section>

    </div>


    <!-- Section 4 :  PROJECTS -->

    <div class="gray" id="projects" >

    <p class="txtcenter">Browse My Recent</p>
    <h1 class="labels txtcenter">Projects</h1>

    <div class="section4-container">
    <?php
                                
                                $sql = "SELECT * FROM project";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo '<div class="kard">';
                                        echo '<div class="card-body">';
                                        echo ' <div class="slider">';
                                        echo '<div class="slide active">';
                                        echo '        <img src="admin/img/'. $row["first_img"].'" alt="Project Image 1">';
                                        echo '   </div>';
                                        echo '   <div class="slide">';
                                        echo '       <img src="admin/img/'. $row["second_img"].'" alt="Project Image 2">';
                                        echo '   </div>';
                                        echo ' <div class="slide">';
                                        echo '      <img src="admin/img/'. $row["third_img"].'" alt="Project Image 3">';
                                        echo '   </div><div class="slide">';
                                        echo '      <img src="admin/img/'. $row["fourth_img"].'" alt="Project Image 4">';
                                        echo '   </div><div class="slide">';
                                        echo '     <img src="admin/img/'. $row["fifth_img"].'" alt="Project Image 5">';
                                        echo ' </div>';
                                        echo ' </div>';
                                        echo ' <!-- Navigation buttons -->';
                                        echo '<button class="prev" onclick="prevSlide(this)">←</button>';
                                        echo '<button class="next" onclick="nextSlide(this)">→</button>';
                                        echo '<h5 class="kard-title">'. $row["name"].'</h5>';
                                        echo '<p class="kard-text">'. $row["description"].'</p>';
                                        echo '<p class="kard-text"><small class="text-muted">'. $row["year"].'</small></p>';
                                        echo '<p class="kard-text">'. $row["stack"].'</p>';
                                        echo '</div>';
                                        echo '</div>';

                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No messages found</td></tr>";
                                }
                                ?>
        
</div>
</div>
    
    

    </div>

    <!-- Section 5 :  CONTACT -->


    <div class="darkgray"  style="position:relative" id="contact">

    <p class="txtcenter" id="whitefont" style="margin-top:12%;">Get in Touch</p>
	<h1 class="labels txtcenter" id="whitefont">Contact Me</h1>


    <section class="section section5"> <!--Contact, Section 5-->

        <div class="section5-container">    


                <div class="sec5left">
                    
                    <!--<div class="contact-image">
                        <img src="" alt="logo"/>
                    </div> -->

                    <form method="post">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="company">Name *</label>
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="label" for="company">Email Address *</label>
                                    <input type="text" name="email" class="form-control" placeholder="Your Email Address" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="label" for="company">Phone Number *</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" value="" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="company">Message *</label>
                                            <textarea name="message" class="form-control" placeholder="Your Message" style="width: 100%; height: 100px;"></textarea>
                                        </div>
                            </div>
                            <div class="form-group">
                                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                            </div>
                        </div>

                    </form>

                </div>
    
        </div>


        <img src="./assets/arrow2.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#home'">


	</section>

    <!-- FOOTER -->


    <footer>
        
        <div class="contact-info-upper-container">
            <div class="contact-info-container">
            <img src="./assets/email.png" alt="Email icon" class="icon contact-icon email-icon">
            <p><a href="mailto:asarael24@gmail.com">asarael24@gmail.com</a></p>
            </div>
            <div class="contact-info-container">
            <img src="./assets/fb.png" alt="Facebook icon" class="icon contact-icon">
            <p><a href="https://www.facebook.com/ameera.sarael">Facebook</a></p>
            </div>
            <div class="contact-info-container">
            <img src="./assets/ig.png" alt="Instagram icon" class="icon contact-icon">
            <p><a href="https://www.instagram.com/ameeranur">Instagram</a></p>
            </div>
        </div>
      

        <nav id="footernav">
            <div class="nav-links-container">
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            </div>
        </nav>

    


        <p class="space">Copyright; 2024 Ameeranur Sarael. All Rights Reserved.</p>   
    
    </footer>

    </div>


    <script>
    function prevSlide(button) {
        const card = button.closest('.kard');
        const slides = card.querySelectorAll('.slide');
        let currentSlide = card.querySelector('.slide.active');
        let index = Array.from(slides).indexOf(currentSlide);
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');
    }

    function nextSlide(button) {
        const card = button.closest('.kard');
        const slides = card.querySelectorAll('.slide');
        let currentSlide = card.querySelector('.slide.active');
        let index = Array.from(slides).indexOf(currentSlide);
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }
</script>

</body>
</html>