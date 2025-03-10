@extends('frontend.layouts.master')

@section('styles')
<style>
    /* Styling for the Welcome Section */
    .testimonial-wrapper {
        background: #f8f9fa;
        padding: 80px 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section-wrapper.testimonial-wrapper {
        padding-top: 30px;
    }

    .sn-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
        max-width: 100%;
        margin: auto;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .sn-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .sn-profile-image {
        width: 240px;
        height: 240px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #004aad;
        display: block;
        margin: 0px auto 20px auto;
        background: #fff;
        transition: transform 0.3s ease-in-out;
    }

    .sn-profile-image:hover {
        transform: scale(1.05);
    }

    /* Name & Position Animation */
    .sn-card h3, .sn-card h5 {
        font-family: "Poppins", sans-serif;
        opacity: 0;
        transform: translateX(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .sn-card h3.show, .sn-card h5.show {
        font-family: "Poppins", sans-serif;
        opacity: 1;
        transform: translateX(0);
    }

    .sn-card h3 {
        font-family: "Poppins", sans-serif;
        color: #333;
        font-size: 24px;
        font-weight: bold;
        margin-top: 10px;
    }

    .sn-card h5 {
        font-family: "Poppins", sans-serif;
        color: #555;
        font-size: 18px;
        margin-bottom: 20px;
    }

    /* Welcome Message Animation */
    .sn-text-box {
        opacity: 0;
        transform: translateX(-50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .sn-text-box.show {
        opacity: 1;
        transform: translateX(0);
    }

    .sn-text-box h1 {
        font-size: 32px;
        font-family: "Poppins", sans-serif;
        color: #004aad;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .sn-text-box p {
        font-family: "Poppins", sans-serif;
        font-size: 18px;
        color: #444;
        line-height: 1.8;
        text-align: justify;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sn-card {
            padding: 30px;
        }

        .sn-profile-image {
            width: 150px;
            height: 150px;
            margin: 0px auto 20px auto;
        }

        .sn-text-box h1 {
            font-size: 28px;
        }

        .sn-text-box p {
            font-size: 16px;
        }
    }
    .heading h1 {
        color: #004aad;
        font-family: "Poppins", sans-serif;
        font-size: 32px;
        font-style: normal;
        font-weight: 400;
        line-height: 48px;
        margin: 0 auto 12px;
        padding-top: 0;
        text-align: center;
    }
    .divider {
        width: 100px;
        height: 4px;
        background: #fdd835;
        margin: 15px auto 30px;
        animation: fadeIn 1.5sease-in-out;
    }
</style>
@endsection

@section('main_content')
<div class="section-wrapper testimonial-wrapper">
    <div class="container">
            <div class="heading">
                <h1>WELCOME MESSAGE</h1>
                <div class="divider"></div>
            </div>
        <div class="sn-card">
            <!-- Image Section (Top) -->
            <img src="{{ asset('/sunilthapa.png') }}" alt="ER. Suneil Thapa" class="sn-profile-image">
            <h3 class="sn-name">ER. SUNEIL THAPA</h3>
            <h5 class="sn-position">CHIEF EXECUTIVE OFFICER (CEO)</h5>

            <!-- Welcome Message Section -->
            <div class="sn-text-box">
                <!--<h1>WELCOME MESSAGE</h1>-->
                <p>
                    At Line Academy, we are committed to shaping the future of engineering education and training.
                    As one of the leading institutes in the field, we pride ourselves on offering top-notch
                    classes and programs designed to empower aspiring engineers and professionals with the skills,
                    knowledge, and confidence they need to excel in their careers.
                </p>
                <p>
                    We believe in a holistic approach to education, combining rigorous academic training with practical,
                    hands-on experience to ensure our students are well-prepared to tackle real-world challenges.
                </p>
                <p>
                    The strength of our institute lies in our dedicated faculty, who are not only highly qualified
                    and experienced but also passionate about teaching and mentoring the next generation of engineers.
                    We foster a collaborative and supportive learning environment, where students and professionals are
                    encouraged to innovate, explore, and grow.
                </p>
                <p>
                    We also understand the importance of flexibility in today’s fast-paced world, which is why we offer a
                    variety of learning options, including online and hybrid courses, to accommodate the diverse needs of our students.
                </p>
                <p>
                    As we continue to expand our offerings and reach, we remain steadfast in our mission to provide unparalleled
                    engineering education and professional training. Whether you are just starting your engineering journey or
                    looking to advance your career in any relevant field, we are here to support you every step of the way.
                </p>
                <p>
                    Thank you for choosing Line Academy. Together, let’s build a brighter future!
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Apply animation on scroll
    document.addEventListener("DOMContentLoaded", function() {
        const textBox = document.querySelector(".sn-text-box");
        const name = document.querySelector(".sn-name");
        const position = document.querySelector(".sn-position");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    textBox.classList.add("show");
                    name.classList.add("show");
                    position.classList.add("show");
                }
            });
        }, { threshold: 0.3 });

        observer.observe(textBox);
    });
    
    
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Selecting elements
        const textBox = document.querySelector(".sn-text-box");
        const name = document.querySelector(".sn-name");
        const position = document.querySelector(".sn-position");

        // Add class to trigger animations
        setTimeout(() => {
            name.classList.add("show");
            position.classList.add("show");
            textBox.classList.add("show");
        }, 500); // Adding slight delay for smooth effect
    });
</script>

@endsection
