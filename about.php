<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>About Me - Arjeeah Abdulbasit</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="styles.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
        />

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>
    <body>
        <nav
            id="navbar-top"
            class="navbar navbar-expand-lg navbar-light bg-white sticky-top"
        >
            <div class="container-fluid px-5">
                <button
                    class="nav-menu d-md-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                >
                    <i class="bi bi-menu-button-fill"></i>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-center"
                    id="navbarNav"
                >
                    <ul class="navbar-nav gap-4" style="font-size: 1.1rem">
                        <li class="nav-item mb-4">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Admin Panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                    </ul>
                </div>
                <button id="contactButton" class="c-btn ms-4 py-2 px-4 rounded-pill d-none d-md-block">Contact</button>
            </div>
        </nav>

        <section class="about pt-5 pb-5" id="about">
            <div class="container mx-auto my-10 p-6 shadow-lg rounded-lg">
                <h1 class="text-4xl font-bold mb-4">Resume</h1>
                <h2 class="text-2xl font-semibold mb-2">Arjeeah Abdulbasit</h2>
                <h3 class="text-xl font-medium mb-4">Software Engineer</h3>
                <div class="contact-info mb-6">
                    <p>Contact Info: <a href="mailto:argea2004@gmail.com">argea2004@gmail.com</a> | 0911716177</p>
                    <p>Location: Benghazi Tablino</p>
                </div>
                <h3 class="text-xl font-semibold mb-2">Objective</h3>
                <p class="mb-6">A motivated Software Engineering student in my 6th semester at LIMU</p>
                <h3 class="text-xl font-semibold mb-2">Skills</h3>
                <div class="skills mb-6">
                    <ul class="list-disc list-inside">
                        <li>Programming Languages: PHP (Laravel), Python, C#, VB, Go, Kotlin</li>
                        <li>Database Design: MySQL, SQL Server, SQLite</li>
                        <li>Backend Development: Laravel (independently developed backend for projects)</li>
                        <li>API Development: Familiar with RESTful APIs</li>
                        <li>Version Control: Familiar with Git</li>
                        <li>Problem-Solving: Strong analytical and problem-solving skills</li>
                        <li>UI/UX: Figma</li>
                        <li>Mobile Apps: Flutter, Kotlin</li>
                        <li>Virtualization: VMware technologies</li>
                    </ul>
                </div>
                <h3 class="text-xl font-semibold mb-2">Certifications</h3>
                <div class="certifications mb-6">
                    <ul class="list-disc list-inside">
                        <li>VMware Certified Technical Associate (VCTA) - Passed with a full mark of 500/500</li>
                        <li>Completed a 300-hour bootcamp (LATI)</li>
                        <li>Google Developer Student Clubs (GDSC) Certification in Flutter</li>
                        <li>Completed a 1080-hour Mobile Development bootcamp (LATI)</li>
                    </ul>
                </div>
                <h3 class="text-xl font-semibold mb-2">Education</h3>
                <div class="education mb-6">
                    <p>Bachelor of Science in Software Engineering</p>
                    <p>LIMU, 5th Semester | GPA: 96.5</p>
                </div>
                <h3 class="text-xl font-semibold mb-2">Projects</h3>
                <div class="projects mb-6">
                    <ul class="list-disc list-inside">
                        <li>Hamzat Wasl App SRS Design: Led SRS document creation for an app project (IEEE 830 standard).</li>
                        <li>Fnd8 Mobile App: Developed a local product marketplace app with Kotlin.</li>
                        <li>ToDo Task Application: Backend for a task management system (Laravel).</li>
                        <li>Blog Management System: Backend system for blog content management (Laravel).</li>
                        <li>Hobbynest: UI/UX design for a social media app for hobbies and events.</li>
                        <li>Stadium: Worked on a full project from design to backend to mobile development, focusing on a platform for reserving small stadiums. Developed the entire backend independently using Laravel.</li>
                        <li>Movie App (Flutter): Developed a mobile app to browse, search, and review movies, integrating public APIs (e.g., TMDb API).</li>
                        <li>Game App (Flutter): Created a mobile app focused on gaming news, integrating public APIs for game news and community features.</li>
                        <li>To-Do App (Flutter): Built a task management application with local database integration and notifications.</li>
                    </ul>
                </div>
                <h3 class="text-xl font-semibold mb-2">References</h3>
                <div class="references">
                    <ul class="list-disc list-inside">
                        <li>Hamed El-Asma, Trainer, Phone: 0928126174</li>
                        <li>Mohammed Alsaee, Trainer, Phone: 0926175513</li>
                    </ul>
                </div>
                <h3 class="text-xl font-semibold mb-2">Mohammed Gaafar</h3>
                <div class="contact-info mb-6">
                    <p>Contact Information: Email | Phone | LinkedIn</p>
                </div>
                <h3 class="text-xl font-semibold mb-2">Skills</h3>
                <div class="skills mb-6">
                    <ul class="list-disc list-inside">
                        <li>Academic Writing: Competitive College Club Member at EducationUSA</li>
                        <li>Design Thinking: Competitive College Club Member at EducationUSA</li>
                        <li>Problem Solving: Competitive College Club Member at EducationUSA</li>
                        <li>Laravel: Mobile App Development</li>
                        <li>Flutter: Mobile App Development</li>
                        <li>Kotlin: Mobile App Development</li>
                    </ul>
                </div>
                <h3 class="text-xl font-semibold mb-2">Experience</h3>
                <div class="experience mb-6">
                    <ul class="list-disc list-inside">
                        <li>Lead, Google Developers Group | Nov 2024 – Present | Benghazi, Libya (On-site)</li>
                        <li>Organizer, Google Developer Student Clubs | Oct 2023 – Oct 2024 | Benghazi, Libya (On-site)</li>
                        <li>Competitive College Club Member, EducationUSA | Feb 2022 – Feb 2024 | Remote</li>
                    </ul>
                </div>
                <h3 class="text-xl font-semibold mb-2">Education</h3>
                <div class="education mb-6">
                    <p>Libyan International Medical University</p>
                    <p>B.Sc. in Information Technology</p>
                </div>
                <h3 class="text-xl font-semibold mb-2">Summary of Technical Skills and Training</h3>
                <div class="skills mb-6">
                    <ul class="list-disc list-inside">
                        <li>Backend Development with Laravel: RESTful API design, JWT Authentication, Eloquent ORM, and API documentation with Postman. Guided by Eng. Hamed El-Asma.</li>
                        <li>Frontend Development with Flutter: Dart fundamentals, responsive UI, state management, and API integration. Supervised by Eng. Mohammed Alsaee.</li>
                        <li>UX/UI Design: Two-week course focused on User Experience and Advanced UI Design. Collaborated on a travel booking app with Eng. Mohamed Ganaway and Eng. Khaira Tarabolsi.</li>
                        <li>Kotlin Development: Fundamentals of Android applications development. Led by Eng. Walid Alayash.</li>
                        <li>Secure App Development: Best practices for secure app development under the guidance of Dr. Ali Jwaid.</li>
                        <li>Business Modeling & Analysis: Workshops held by experienced business incubators.</li>
                    </ul>
                </div>
            </div>
        </section>

        <footer class="text-center text-muted py-4">
            <h3 class="text-white pt-4" data-aos="fade-up">About</h3>
            <div class="link-group mt-5" data-aos="fade-up">
                <a href="home.php">Home</a>
                <div class="vr"></div>
                <a href="#about">About</a>
                <div class="vr"></div>
                <a href="index.php">Admin panel</a>
                <div class="vr"></div>
            </div>
            <div class="social-links mt-5" data-aos="fade-up">
                <button href="https://www.facebook.com/share/1Hne5c4AfK/?mibextid=LQQJ4d" class="rounded-pill facebook" target="_blank">
                    <i class="bi bi-facebook"></i>
                </button>
                <button href="https://wa.me/0911716177" class="rounded-pill whatsapp" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                </button>
                <button href="https://www.instagram.com/ilo0qj/profilecard/?igsh=Yno5dnZycDB1NmJr" class="rounded-pill instagram" target="_blank">
                    <i class="bi bi-instagram"></i>
                </button>
            </div>
            <hr class="text-muted my-4" />
            <p>Copyright 2024 | All Rights Reserved.</p>
        </footer>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                offset: 50,
            });

            document.getElementById('contactButton').onclick = function() {
                window.location.href = 'mailto:argea2004@gmail.com';
            };
        </script>
        <script src="script.js"></script>
    </body>
</html>
