<?php
session_start();
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    </style>
    <link rel="shortcut icon" href="Images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="customer_home.css">
    <title>FitZone Fitness Center</title>
</head>

<body>
    <header>


        <div class="container">
            <div class="brand">
                <img src="Images/Logo.png" alt="Logo">
                <a href=#content>
                    <h1>FitZone Fitness Center</h1>
                </a>
            </div>
            <button class="menu-btn">&#9776;</button>
            <nav>
                <ul class="navbar">
                    <li><a href=#content>Home</a></li>
                    <li><a href=#content1>About Us</a></li>
                    <li><a href=#content4>Services</a></li>
                </ul>
                <a href="login.php" class="nav-btn">Login</a>
            </nav>
        </div>
    </header>
    <script src="script.js"></script>


    <main>
        <div id="content">
            <section id="home">
                <h1>Welcome to</h1>
                <h2>FitZone <span>Fitness</span> Center</h2>
                <p>Achieve your fitness goals with the best training environment.
                    At FitZone Fitness Center, we provide top-quality equipment, <br>expert trainers, and a supportive
                    community to help you stay motivated on your fitness journey.<br> Whether you're a beginner or a
                    pro,
                    <br>we've got everything you need to succeed!
                </p>
                <a href="register.php" class="btn">Join Now</a>
            </section>
        </div>
        <section class="features">
            <div class="feature-box">
                <img src="Images/HL3.jpg" alt="Gym1">
                <h3>State-of-the-Art Equipment</h3>
                <p>Train with the best machines and free weights available.</p>
            </div>
            <div class="feature-box">
                <img src="Images/HL4.jpg" alt="Gym2">
                <h3>Professional <br>Trainers</h3>
                <p>Get guidance from certified fitness experts.</p>
            </div>
            <div class="feature-box">
                <img src="Images/HL5.jpg" alt="Gym3">
                <h3>Variety of <br>Classes</h3>
                <p>From Pilates to Powerlifting, find classes that match your vibe.</p>
            </div>
        </section>

        <div class="class_wrapper">
            <img src="Images/HL6.jpg" alt="" class="class_img" />
            <div class="class_content">

                <h3 class="class_title">Why Choose FitZone?</h3>
                <p class="class_p">
                    At FitZone, we believe that fitness is not just about working out—it’s about building a healthier,
                    stronger, and more confident version of yourself. Our state-of-the-art gym is designed to cater to
                    all fitness levels, from beginners to athletes, with top-tier equipment, expert trainers, and a
                    motivating environment.
                </p>
                <a href="#content1" class="class_btn">Learn more</a>
            </div>
        </div>

        <hr style="border: 0; height: 2px; background: linear-gradient(to right, #1865ff, #00bfff); margin: 10px 0;">

        <section id="about">
            <div id="content1" class="about-container">
                <h2>About Us</h2>
                <p>"FitZone Fitness Center" is a newly established gym in Kurunegala, dedicated to providing a modern
                    and inclusive fitness environment for individuals of all fitness levels.
                    With a strong commitment to health and wellness, we offer state-of-the-art equipment, expert-led
                    training programs, and a variety of group fitness classes, including cardio, strength training, and
                    yoga.
                    Our certified trainers are here to guide members through personalized workout plans, ensuring they
                    achieve their fitness goals effectively.</p>
            </div>

            <div class="about-section">
                <h3><i class='bx bx-disc'></i>Our Vision</h3>
                <p>To be the leading fitness center in Kurunegala, promoting a healthy and active lifestyle for all.</p>
            </div>

            <div class="about-section">
                <h3><i class='bx bx-disc'></i>Our Mission</h3>
                <p>We strive to empower individuals to achieve their fitness goals through expert guidance, advanced
                    equipment, and a supportive environment.</p>
            </div>

            <div class="about-section">
                <h3><i class='bx bx-disc'></i>Our Goals</h3>
                <ul>
                    <li>Attract new members and provide details on services.</li>
                    <li>Facilitate online registration for fitness programs.</li>
                    <li>Allow customers to submit inquiries regarding services.</li>
                </ul>
            </div>

            <div class="about-section">
                <h3><i class='bx bx-disc'></i>Our Facilities</h3>
                <p>FitZone Fitness Center offers state-of-the-art equipment, spacious workout areas, professional
                    trainers, and group fitness classes for a well-rounded fitness experience.</p>
            </div>

            <div class="about-section">
                <h3><i class='bx bx-disc'></i>Location</h3>
                <p>We are located in Kurunegala, easily accessible for all fitness enthusiasts in the region.</p>
            </div>

            <div class="about-section">
                <h3><i class='bx bx-disc'></i>Our History</h3>
                <p>Founded in 2025, FitZone Fitness Center was established with the goal of creating a fitness space
                    that caters to beginners and professionals alike. With a commitment to quality and community, we
                    continue to grow and innovate.</p>
            </div>
        </section>

        <hr style="border: 0; height: 2px; background: linear-gradient(to right, #1865ff, #00bfff); margin: 10px 0;">

        <div id="content4">
            <section id="services">
                <h2>SERVICES</h2>
                <div class="service-section">
                    <div class="service-image">
                        <img src="Images/HL7.png" alt="Gym Image"
                            style="width: 100%; height: 100%; border-radius: 1rem;">
                    </div>
                    <div class="service-details">
                        <div class="service-box">
                            <div>
                                <h3><i class='bx bx-dumbbell'></i>ONE TO ONE TRAINING</h3>
                                <p>All our personal trainers are certified and ready to help with whatever fitness goal
                                    you
                                    may have!</p>
                            </div>
                        </div>
                        <div class="service-box">
                            <div>
                                <h3><i class='bx bx-body'></i>FITNESS CHECK-UP</h3>
                                <p>Get your Body Mass Index and Fat Percentage checked every month to keep track of your
                                    body composition.</p>
                            </div>
                        </div>
                        <div class="service-box">
                            <div>
                                <h3><i class='bx bxs-drink'></i>JUICE & SUPPLEMENT BAR</h3>
                                <p>We have a supplement bar at the gym with pre-workout, whey protein, BCAA, Greek
                                    Yoghurt,
                                    and more!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </main>

    <footer>
        <p>&copy; 2025 FitZone Fitness Center. All rights reserved.</p>

        <nav>
            <ul class="footer-nav">
                <li><a href="#privacy">Privacy Policy</a></li>
                <li><a href="#terms">Terms of Service</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>

        <div class="social-icons">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-youtube'></i></a>
        </div>
    </footer>




</body>

</html>
