<?php
session_start();
include 'config.php';


if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'customer') {
    echo "<script>alert('Access Denied!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id']; 

$sql = "SELECT * FROM classes";
$result = $conn->query($sql);


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
                    <li><a href=#content2>Membership</a></li>
                    <li><a href=#content8>Blogs</a></li>
                    <li><a href=#content6>Classes</a></li>
                    <li><a href=#content5>Contact Us</a></li>
                </ul>
                <a href="logout.php" class="nav-btn">Sign out</a>
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
                <a href="" class="btnx">Logged in</a>
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



        <hr style="border: 0; height: 2px; background: linear-gradient(to right, #1865ff, #00bfff); margin: 10px 0;">

        <div id="content2">
            <section id="membership">
                <h2>Membership Plans</h2>
                <p>Choose the plan that best fits your fitness goals and lifestyle.</p>

                <div class="membership-container">
                    <div class="membership-plan">
                        <h3>Basic Plan</h3>
                        <p class="price">$20<br>/month</p>
                        <ul>
                            <li><i class='bx bx-check'></i> Access to gym equipment</li>
                            <li><i class='bx bx-check'></i> Locker facilities</li>
                            <li><i class='bx bx-check'></i> Free WiFi</li>
                            <li><i class='bx bx-x'></i> Group fitness classes</li>
                            <li><i class='bx bx-x'></i> Nutrition counseling</li>
                            <li><i class='bx bx-x'></i> Personalized training sessions</li>
                            <li><i class='bx bx-x'></i> Exclusive member events</li>
                        </ul>
                        <a class="btn">BUY Now</a>
                    </div>


                    <div class="membership-plan featured">
                        <h3>Premium Plan</h3>
                        <p class="price">$40<br>/month</p>
                        <ul>
                            <li><i class='bx bx-check'></i> Access to gym equipment</li>
                            <li><i class='bx bx-check'></i> Locker facilities</li>
                            <li><i class='bx bx-check'></i> Free WiFi</li>
                            <li><i class='bx bx-check'></i> Group fitness classes</li>
                            <li><i class='bx bx-check'></i> Nutrition counseling</li>
                            <li><i class='bx bx-x'></i> Personalized training sessions</li>
                            <li><i class='bx bx-x'></i> Exclusive member events</li>
                        </ul>
                        <a class="btn">BUY Now</a>
                    </div>


                    <div class="membership-plan">
                        <h3>Elite Plan</h3>
                        <p class="price">$60<br>/month</p>
                        <ul>
                            <li><i class='bx bx-check'></i> Access to gym equipment</li>
                            <li><i class='bx bx-check'></i> Locker facilities</li>
                            <li><i class='bx bx-check'></i> Free WiFi</li>
                            <li><i class='bx bx-check'></i> Group fitness classes</li>
                            <li><i class='bx bx-check'></i> Nutrition counseling</li>
                            <li><i class='bx bx-check'></i> Personalized training sessions</li>
                            <li><i class='bx bx-check'></i> Exclusive member events</li>
                        </ul>
                        <a class="btn">BUY Now</a>
                    </div>
                </div>
            </section>


            <section id="promotions">
                <h2>Special Promotions</h2>
                <div class="promo-box">
                    <h3>New Year Offer</h3>
                    <p>Sign up now and get 15% off your first 3 months!</p>
                </div>

                <div class="promo-box">
                    <h3>Referral Bonus</h3>
                    <p>Refer a friend and get 1 month free membership.</p>
                </div>
            </section>
        </div>

        <hr style="border: 0; height: 2px; background: linear-gradient(to right, #1865ff, #00bfff); margin: 10px 0;">


        <div id="content8">
            <div class="h2">
        <h2>Our Blogs</h2>
        </div>
            <section id="workouts" class="category">
                <h3>Workout Routines</h3>
                <div class="post-grid">
                    <div class="post">
                        <h3>Full-Body Strength</h3>
                        <p>A beginner-friendly strength workout.</p><a href="https://www.muscleandstrength.com/workouts/muscle-strength-full-body-workout-routine" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                    <div class="post">
                        <h3>HIIT for Fat Loss</h3>
                        <p>Quick and effective fat-burning HIIT session.</p><a href="https://www.medicalnewstoday.com/articles/hiit-workouts-weight-loss" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                    <div class="post">
                        <h3>Yoga for Recovery</h3>
                        <p>Improve flexibility and recovery.</p><a href="https://yogaofrecovery.com/" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                </div>
            </section>

            <section id="recipes" class="category">
                <h3>Healthy Recipes</h3>
                <div class="post-grid">
                    <div class="post">
                        <h3>Protein Smoothie</h3>
                        <p>A delicious high-protein shake.</p><a href="https://www.eatingwell.com/gallery/7910825/high-protein-smoothie-recipes/" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                    <div class="post">
                        <h3>Oven-Baked Salmon</h3>
                        <p>Easy and healthy omega-3 rich meal.</p><a href="https://www.lecremedelacrumb.com/best-easy-healthy-baked-salmon/" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                    <div class="post">
                        <h3>Quinoa Salad</h3>
                        <p>A refreshing and nutritious meal.</p><a href="https://cookieandkate.com/best-quinoa-salad-recipe/" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                </div>
            </section>

            <section id="mealplans" class="category">
                <h3>Meal Plans</h3>
                <div class="post-grid">
                    <div class="post">
                        <h3>Weight Loss Plan</h3>
                        <p>A structured 7-day weight loss plan.</p><a href="https://quiz.nutrimate.fit/kit_age_range_1?cohort=mf_intro2&ad_id=713107747670&adset_id=169694163240&campaign_id=21688930001&gad_source=1&uuid=967bc443-4c6d-4d52-8c77-859abd26525c&lang=en" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                    <div class="post">
                        <h3>Muscle Gain Plan</h3>
                        <p>High-protein meals for muscle building.</p><a href="https://www.betterhealth.vic.gov.au/health/healthyliving/weight-and-muscle-gain" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                    <div class="post">
                        <h3>Vegan Nutrition</h3>
                        <p>A balanced meal plan for vegans.</p><a href="https://www.hopkinsmedicine.org/health/wellness-and-prevention/how-to-maintain-a-balanced-diet-as-a-vegetarian-or-vegan" target="_blank" rel="noopener noreferrer">Read More</a>
                    </div>
                </div>
            </section>



        <hr style="border: 0; height: 2px; background: linear-gradient(to right, #1865ff, #00bfff); margin: 10px 0;">

        <div id="content6">
    <section class="class-schedule">
        <h2>Class Schedule</h2>
        <table id="class-table">
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Exercise</th>
                <th>Time</th>
                <th>Trainer</th>
                <th>Book</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["day"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["class_date"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["exercise"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["class_time"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["trainer"]) . "</td>";
                    echo "<td><button class='book-btn' onclick='bookClass(" . $row["id"] . ", this)'>Book</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No classes available</td></tr>";
            }
            ?>
        </table>
    </section>
</div>




        <div id="content7">
            <section class="contact">
                <h2 class="contact-h2">Book a Private Class</h2>
                <div class="query-container">
                    <h1>Schedule a private session with a trainer!</h1>
                    <form id="private-class-form">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>

                        <label for="phone_no">Phone No</label>
                        <input type="tel" id="phone_no" name="phone_no" placeholder="Enter your phone number" required>

                        <label for="trainer">Select Trainer</label>
                        <select id="trainer" name="trainer" required>
                            <option value="" disabled selected>Select a trainer</option>
        
                        </select>

                        <label for="class_date">Class Date</label>
                        <input type="date" id="class_date" name="class_date" required>

                        <label for="class_start_time">Class Time</label>
                        <div style="display: flex; gap: 10px; width: 100%;">
                            <input type="time" id="class_start_time" name="class_start_time" required>
                            <span style="align-self: center; color: white;">to</span>
                            <input type="time" id="class_end_time" name="class_end_time" required></div>



                        <div class="btn2">
                            <button type="submit">Submit</button><br>
                            <button onclick="window.location.href='Customer functions/customer_appointments.php';">My Appointments</button> 
                        </div>
                    </form>
                </div>
            </section>
        </div>



        <section class="trainers">
            <h2>Meet Our Certified Trainers</h2>
            <div class="trainer-container">
                <div class="trainer">
                    <img src="Images/FAC.jpg" alt="John Doe">
                    <h3>John Doe</h3>
                    <p><strong>Certified in:</strong> NASM, ISSA</p>
                    <p><strong>Specialty:</strong> Strength Training & Bodybuilding</p>
                    <p><strong>Experience:</strong> 8 Years</p>
                    <p><strong>Personal Training Package:</strong> $50/session</p>
                </div>
                <div class="trainer">
                    <img src="Images/FAC1.jpg" alt="Jane Smith">
                    <h3>Jane Smith</h3>
                    <p><strong>Certified in:</strong> ACE, RYT-200</p>
                    <p><strong>Specialty:</strong> Yoga & Flexibility Training</p>
                    <p><strong>Experience:</strong> 6 Years</p>
                    <p><strong>Personal Training Package:</strong> $40/session</p>
                </div>
                <div class="trainer">
                    <img src="Images/FAC2.jpg" alt="Mike Johnson">
                    <h3>Mike Gasly</h3>
                    <p><strong>Certified in:</strong> ACSM, CPR/AED</p>
                    <p><strong>Specialty:</strong> HIIT & Fat Loss</p>
                    <p><strong>Experience:</strong> 7 Years</p>
                    <p><strong>Personal Training Package:</strong> $45/session</p>
                </div>
            </div>
            </div>
        </section>



        <hr style="border: 0; height: 2px; background: linear-gradient(to right, #1865ff, #00bfff); margin: 10px 0;">


        <div id="content5">
    <section class="contact">
        <h2>Contact Us</h2>
        <div class="contact-container">
            <div class="contact-info">
                <h3>📍 Visit Us</h3>
                <p>FitZone Fitness Center, <br> 123 peradeniya Street, Kandy, Srilanka</p>

                <h3>📞 Call Us</h3>
                <p>+123 456 7890</p>

                <h3>📧 Email Us</h3>
                <p>support@fitzone.com</p>

                <h3>⏰ Working Hours</h3>
                <p>Mon - Fri: 6:00 AM - 10:00 PM</p>
                <p>Sat - Sun: 8:00 AM - 8:00 PM</p>

                <h3>💬 Let's Talk!</h3>
                <p>Have questions about our services? Feel free to ask, and our team will get back to you soon.</p>
            </div>


            <div class="query-container">
                <h1>Have a question? Send us a message!</h1>
                <form action="Customer functions/submit_query.php" method="POST">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="8" placeholder="Enter your message" required></textarea>
                    <div class="btn2">
                        <button type="submit">Submit Query</button>
                        <button onclick="window.location.href='Customer functions/customer_queries.php';">My Queries</button>
                    </div>
                </form>
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



    <script>

    document.addEventListener("DOMContentLoaded", () => {
        fetchTrainers();
        setupFormSubmission();
    });
    
    function fetchTrainers() {
        fetch('Customer functions/fetch_trainers_for_form.php')
        .then(response => response.json())
        .then(data => {
    
                const trainerSelect = document.getElementById('trainer');
                trainerSelect.innerHTML = '';
                data.forEach(trainer => {
                    const option = document.createElement('option');
                    option.value = trainer.name;
                    option.textContent = `${trainer.name} (${trainer.specialty})`;
                    trainerSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching trainers:', error);
                alert('Error fetching trainers: ' + error);
            });
    }
      
    
    
    function setupFormSubmission() {
    const form = document.getElementById('private-class-form');
    form.addEventListener('submit', event => {
        event.preventDefault();
        const formData = new FormData(form);

        fetch('Customer functions/submit_private_class.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Server error: ' + response.status);
                }
                return response.json();
            })
            .then(data => {    
                alert(data.message);

                
                if (data.success) {
                    form.reset();
                } else if (data.redirect) {
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error('Error submitting form:', error);
                alert('An error occurred: ' + error.message);
            });
    });
}

function bookClass(classId, button) {
    const formData = new FormData();
    formData.append('class_id', classId);

    fetch('Customer functions/book_class.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Server error: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Class booked successfully!');
            button.disabled = true;
            button.textContent = 'Booked';
            button.style.background = '#ccc';
        } else if (data.message.includes('already booked')) {
            alert('You have already booked this class.');
        } else if (data.redirect) {
            alert(data.message); 
            window.location.href = data.redirect; 
        } else {
            alert(data.message); 
        }
    })
    .catch(error => {
        console.error('Error booking class:', error);
        alert('Error booking class: ' + error.message);
    });
}

    
    
    
</script>


</body>

</html>
