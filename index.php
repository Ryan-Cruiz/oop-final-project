<?php require_once('connection.php') ?>
<?php 
    $query = "SELECT * FROM blogs ORDER BY created_at DESC";
    $blogs = fetch_all($query);
    // var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Golden Link College</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo" style><a href="index.html"><img src="assets/img/glc.png" > Golden Link College<span></span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#blog">About</a></li>
                    <li><a href="backend/login.php">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>Golden Link College</span></h1>
            <h2>BE THE BEST THAT YOU CAN BE.</h2>
            <div class="d-flex">
                <a href="#blog" class="btn-get-started scrollto">Get Started</a>
            </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="blog" class="about section-bg">
            <div class="container" data-aos="fade-up">
                <div class="courses" id="aboutus" >
                    <h1>The Golden Link College</h1>
                    <h2>adopts an educational approach that</h2>
                    <div class="column1 "  >
                        <p>• Gives importance to the development of life skills and character building, such as self-awareness, integration of values, effective relationships, conflict resolution, public speaking, etc., side by side with academic competencies;
<br>

• Motivates students to study by awakening their interest in the subject matter instead of using rewards and punishments or threats;
<br>• Does not use rankings, honors or medals to compare a student with another;</p>
                    </div>    
                    <div class="column1"  >
                        <p>• Creates an atmosphere of care, fun and challenge that enables students to dare to try new things without the fear of being humiliated or punished;

<br>• Involves the parents and family in the education of the children, by holding parenting seminars and family day programs;
<br>• Enables students to be aware of the larger picture such as the environment, meaning of life, comparative religion, world peace and similar themes.</p>
                    </div>   
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="column Elementary"  >
                        <h2>Elementary</h2>
                        <img src="assets/img/elementary.JPG" style=" width:400px; height:200">  
                    </div>
                    <div class="column">
                        <h2>Secondary</h2>
                        <img src="assets/img/secondary.JPG" style=" width:400px; height:200">
                    </div>
                    <div class="column">
                        <h2>Tertiary</h2>
                        <img src="assets/img/tertiary.JPG" style=" width:400px; height:200">
                    </div>
                </div>
                <br>
                <div class="mission" id="mission">
                    <h1 style="text-align:center;">Mission and Vision</h1>
                    <div class="column1 "  >
                        <p>• To educate and bring up children and young adults to become competent, well balanced, emotionally mature, socially responsible, morally upright and spiritually sensitive individuals.
                        <br>
                        <br>
• To develop and promote an enlightened educational system that teaches the art and science of wise living in addition to achieving academic excellence- a system that can be shared with other institutions for the benefit of individuals and society</p>
                         
                    </div>
                    <div class="column1 "  >
                        <p>• To be a center of peace and harmony where people of different cultures will leave and learn together to help promote world peace and brotherhood without distinction of religion, race, sex or nationality, in the light of the ageless wisdom of life.
                        <br>
                        <br>
• To help provide quality and right education to the less privileged children</p>                      
                    </div>
                </div>
              <br>
            <div id="curse" class="curse">
                <h1>Programs Offered</h1>
                 <div class="column2 curse">
                 <h2 class="logo"><img src="assets/img/bsit.png" style="width:50px" > BSIT</a></h2>
                 </div>   
                 <div class="column2 curse" >
                    <h2 class="logo"><img src="assets/img/psych.png" style="width:40px"> BSPSYCH</a></h2>
                 </div>   
                 <div class="column2 curse" >
                    <h2 class="logo"><img src="assets/img/bsba.png" style="width:40px" > BSBA</a></h2>
                 </div>   
   
                 <div class="column2 " >
                    <h2 ><img src="assets/img/bsais.jpg" style="width:60px" > BSAIS</a></h2>
                 </div>   
                 
                 <div class="column2 " >
                    <h2 ><img src="assets/img/bsed.png" style="width:50px" > BSED</a></h2>
                 </div>   
                 
                 <div class="column2 " >
                    <h2 ><img src="assets/img/beed.png" style="width:40px" > BEED</a></h2>
                 </div>  
            </div>   

              <br>
                <div id="blog" class="section-title">
                    <h2>Blogs</h2>
                    <h3>See Our Latest <span>Blogs</span></h3>
                </div>
                <div class="section-body">
                    <!-- This section will be the list of blogs -->
                    <?php foreach($blogs as $blog){?>
                    <div class="card m-2">
                        <div class="card-body">
                            <h4 class="card-title"><?= $blog['title']?></h4>
                            <p class="card-subtitle mb-2"><span class="text-muted"><?= date_format(date_create($blog['created_at']),"F d, Y")?></span></p>
                            <p><?= substr_replace($blog['description'],'...',100)?></p>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Interested on being a Linker?</h4>
                        <p>enter your email for more updates.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>GLC<span>.</span></h3>
                        <p>
                            Waling Waling St., Along Dona Aurora St. <br>
                            Camarin Caloocan City Brgy.177<br>
                            Philippines <br><br>
                            <strong>Phone:</strong> (+632) 8961-5836<br>
                            <strong>Email:</strong> GLC@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#home">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#main">About us</a></li>
                           
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#curse">Programs offered</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#mission">Mission and Vision</a></li>
                            
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Golden Link College</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
               
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>