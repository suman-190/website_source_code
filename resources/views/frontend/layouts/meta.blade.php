<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Line Academy">
    <meta name="description"
        content="Line Academy offers expert coaching for B.E (Tribhuvan University, Pokhara University, Purbanchal University), NEC License Preparation, IT Trainings, Engineering Trainings, and Professional Development Courses. Visit us in Lalitpur for top-quality education and training.">
    <meta name="keywords"
        content="Line Academy, B.E Coaching, NEC License Preparation, IT Trainings, Engineering Trainings, Professional Trainings, Tribhuvan University, Pokhara University, Purbanchal University, Lalitpur Education, Nepal Coaching Classes">
    <meta name="subject" content="Education and Training">
    <meta name="language" content="English">
    <meta name="copyright" content="© 2024 Line Academy">
    <meta name="url" content="https://www.lineacademy.edu.np">
    <meta name="identifier-URL" content="https://www.lineacademy.edu.np">
    <meta name="coverage" content="Worldwide">
    <meta name="rating" content="General">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Line Academy | Quality Coaching and Training in Nepal">
    <meta property="og:description"
        content="Providing top-notch coaching for B.E courses, NEC License preparation, IT, and Engineering Trainings. Join us at Jal Vinayak Marg, Lalitpur.">
    <meta property="og:url" content="https://www.lineacademy.edu.np">
    <meta property="og:site_name" content="Line Academy">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/logo.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Line Academy | Coaching and Training in Nepal">
    <meta name="twitter:description"
        content="Expert coaching for B.E programs, NEC License, IT Trainings, and more. Visit us at Lalitpur for professional training.">
    <meta name="twitter:image" content="/logo.png">

    <!--favicon-->
    <link href="/ui/images/favicon.png" rel="icon">
    <!-- CSS -->
    <link rel="stylesheet" href="/ui/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ui/bootstrap/dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/ui/bootstrap/dist/css/bootstrap-utilities.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/ui/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/ui/css/smart_wizard.css" />
    <style>
    .has-sub-menu.open .sub-menu {
        display: block !important;
    }

    .owl-stage {
        display: flex;
    }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const subTabs = document.querySelectorAll(".has-sub-menu > .sub_tab");

        subTabs.forEach((tab) => {
            tab.addEventListener("click", function() {
                const parent = this.parentElement;
                const subMenu = parent.querySelector(".sub-menu");

                // Close other open menus
                document.querySelectorAll(".has-sub-menu.open").forEach((menu) => {
                    if (menu !== parent) {
                        menu.classList.remove("open");
                        menu.querySelector(".sub-menu").style.display = "none";
                    }
                });

                // Toggle current menu
                if (parent.classList.contains("open")) {
                    parent.classList.remove("open");
                    subMenu.style.display = "none";
                } else {
                    parent.classList.add("open");
                    subMenu.style.display = "block";
                }
            });
        });

        // Add click event for sub-menu links to redirect
        const subMenuLinks = document.querySelectorAll(".sub-menu a");

        subMenuLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault(); // Prevent default link behavior
                const url = link.getAttribute("href"); // Get the href value
                window.location.href = url; // Redirect to the page
            });
        });
    });
    </script>
</head>