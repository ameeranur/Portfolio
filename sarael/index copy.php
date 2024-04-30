<!DOCTYPE html>
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
        
            <h1>I'm Ameeranur <span>Sarael</span></h1>

                <p>Cat lover and a Software Engineer. </p>
            
                <a href="Ameera Sarael_CV.pdf" target="_blank">Download CV</a>
                <a href="#contact">Contact Me</a>

                <div class="images">
                    <img src="assets/shape.png" class="shape">
                    <img src="assets/ameera.png" class="girl">
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

                <div class="card" >
                    <h4>Agency1</h4>
                    <h5>Year / 2020-2023</h5>
                    <p style="font-size: 13px;">Position</p>
                    <p style="font-size: 13px;">Job description</p>
                </div>

                <div class="card">
                    <h4>Agency2</h4>
                    <h5>Year / 2020-2023</h5>
                    <p style="font-size: 13px;">Position</p>
                    <p style="font-size: 13px;">Job description</p>
                </div> 

            </div>

            <div class="section2-container">        

                <div class="card-title">
                    <img src="./assets/education.png" alt="Education icon" class="icon">
                    <h3>Education</h3>
                </div>
    

                <div class="card">
                    <h4>School1</h4>
                    <h5>Date (Month and Year)</h5>
                    <p>Course / Strand / Level</p> 
                    <p>Address</p>
                    
                </div>
    
                <div class="card">
                    <h4>School2</h4>
                    <h5>Date (Month and Year)</h5>
                    <p>Course / Strand / Level</p>
                    <p>Address  </p>  
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
                
                <!-- <div id="scroll"> -->
                
                    <div class="card">
                        <h4>Programming Language1</h4>
                        <p>Level</p>
                    </div>
                    
                    <div class="card">
                        <h4>Programming Language2</h4>
                        <p>Level</p>
                    </div>

                <!-- </div> -->

                <br>


                <div class="card-title">
                    <h3>Back-end Development</h3>
                </div>

                <div class="card">
                    <h4>Programming Language1</h4>
                    <p>Level</p>
                </div>

                <div class="card">
                    <h4>Programming Language2</h4>
                    <p>Level</p>
                </div>

    
            </div>

            <div class="section3-container">  
            
                <div class="card-title">
                    <h3>Soft Skills</h3>
                </div>


                <div class="card">
                    <h4>Programming Language1</h4>
                    <p>Level</p>
                </div>

                <div class="card">
                    <h4>Programming Language2</h4>
                    <p>Level</p>
                </div>
    
            </div>

            <div class="section3-container">  
            
                <div class="card-title">
                    <h3>Technical Skills</h3>
                </div>

                <div class="card">
                    <h4>Skill1</h4>
                    <p>Level</p>
                </div>

                <div class="card">
                    <h4>Skill2</h4>
                    <p>Level</p>
                </div>

                
                <br>


                <div class="card-title">
                    <h3>Tools</h3>
                </div>

                <div class="card">
                    <h4>Tool1</h4>
                    <p>Level</p>
                </div>

                <div class="card">
                    <h4>Tool2</h4>
                    <p>Level</p>
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
        <div class="kard">
            <div class="slider">
                <div class="slide active">
                    <img src="assets/ameera.png" alt="Project Image 1">
                </div>
                <div class="slide">
                    <img src="assets/ameera2.png" alt="Project Image 2">
                </div>
                <!-- Add more slides for additional images -->
            </div>
            <div class="card-body">
                <h5 class="kard-title">Project Name</h5>
                <p class="kard-text">Description of the project goes here.</p>
                <p class="kard-text"><small class="text-muted">Year: 2024</small></p>
                <p class="kard-text">Stack Used: HTML, CSS, JavaScript</p>
            </div>
            <!-- Navigation buttons -->
            <button class="prev" onclick="prevSlide()">←</button>
            <button class="next" onclick="nextSlide()">→</button>
        </div>
    </div>
    
    
    

    </div>

    <!-- Section 5 :  CONTACT -->


    <div class="darkgray"  id="contact">

    <p class="txtcenter" id="whitefont">Get in Touch</p>
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
                                    <input type="text" name="txtName" class="form-control" placeholder="Your Name" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="label" for="company">Email Address *</label>
                                    <input type="text" name="txtEmail" class="form-control" placeholder="Your Email Address" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="label" for="company">Phone Number *</label>
                                    <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number" value="" />
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
    
        </div>


        <div class="section5-container">  
            
            
            <div class=""> 
          
                <form method="post">
              
                   <div class="row">
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="company">Message *</label>
                                <textarea name="txtMsg" class="form-control" placeholder="Your Message" style="width: 100%; height: 180px;"></textarea>
                            </div>
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
        // JavaScript for slider navigation
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
    
        function showSlide(n) {
            slides[currentSlide].classList.remove('active');
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }
    
        function nextSlide() {
            showSlide(currentSlide + 1);
        }
    
        function prevSlide() {
            showSlide(currentSlide - 1);
        }
    </script>

</body>
</html>