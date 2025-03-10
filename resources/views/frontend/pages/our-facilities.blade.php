@extends('frontend.layouts.master')

@section('styles')
    <style>
        .section-wrapper {
            padding: 50px 0;
            font-family: "Poppins", sans-serif;
            background-color: #ffffff;
        }

        .heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .heading h1 {
            font-size: 36px;
            color: #0044cc;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }

        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
            gap: 30px;
            padding: 0 20px;
        }

        .content-section {
            flex: 1;
            /*max-width: 600px;*/
        }

        .content-section h2 {
            color: #004aad;
            font-family: "Poppins", sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: 400;
            /*line-height: 48px;*/
            margin: 0 auto 12px;
            padding-top: 0;
            /*text-align: center;*/
        }

        .content-section p {
            font-size: 16px;
            text-align:justify;
            color: #000;
            line-height: 1.6;
            margin-bottom: 20px;
            font-family: "Poppins", sans-serif;
        }

        .content-image {
            flex: 1;
            max-width: 400px;
        }

        .content-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .divider {
    width: 100px;
    height: 4px;
    background: #fdd835;
    margin: 15px auto 30px;
    animation: fadeIn 1.5sease-in-out;
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
    </style>
@endsection

@section('main_content')
    <div class="section-wrapper">
        <div class="container">
            <div class="heading">
                <h1>Our Facilities</h1>
                <div class="divider"></div>
            </div>
            <!-- Facilities Content -->
            <div class="content-wrapper">
                <!-- Left Section -->
                <div class="content-section">
                    <h2>Modern, Technology-Enhanced Classrooms</h2>
                    <p>
                        Our classrooms are thoughtfully designed to foster an optimal learning environment. Featuring advanced technology such as projectors, high-speed internet, and Smart boards, we ensure that students have access to top-notch educational facilities. Additionally, for added security, all classrooms are under CCTV surveillance, providing a safe and secure learning space.
                    </p>

                    <h2>Experienced and Skilled Faculty</h2>
                    <p>
                        At Line Academy, we take pride in our team of highly experienced and qualified faculty members. Our instructors bring a wealth of knowledge and real-world expertise to the classroom, ensuring that students receive top-tier education and practical insights in their respective fields. Each faculty member is dedicated to fostering a supportive and engaging learning atmosphere, tailored to help students reach their full potential. With a commitment to excellence in teaching and continuous professional development, our faculty plays a key role in shaping the academic success of every student.
                    </p>
                </div>

                <!-- Right Section -->
                <div class="content-image">
                    <img src="{{ asset('/ourfacilities/one.jpeg') }}" alt="Classrooms">
                </div>
            </div>

            <div class="content-wrapper">
                <!-- Left Section -->
                <div class="content-image">
                    <img src="{{ asset('/ourfacilities/two.jpeg') }}" alt="Library">
                </div>

                <!-- Right Section -->
                <div class="content-section">
                    <h2>Dedicated Student Support Services</h2>
                    <p>
                        We offer comprehensive support services, including academic counseling, career guidance, and mental health resources, ensuring that every student has the assistance they need to succeed both inside and outside the classroom.
                    </p>

                    <h2>Industry-Linked Internship and Placement Opportunities</h2>
                    <p>
                        Through strategic partnerships with leading companies and organizations, Line Academy provides students with valuable internship and placement opportunities, giving them real-world experience and a competitive edge in the job market.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
