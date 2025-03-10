@extends('frontend.layouts.master')

@section('styles')
    <style>
        /* General Styles */
        .section-wrapper {
            padding: 20px 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Heading Styles */
        .heading {
            text-align: center;
            margin-bottom: 20px;
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
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Content Styles */
        .content {
            text-align: justify;
            color: #333;
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 50px;
            animation: fadeInUp 1s ease-in-out;
        }

        .content h2 {
            font-size: 32px;
            color: #0044cc;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        /* Mission List Styles */
        .mission-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .mission-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .mission-list li:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .mission-list li span {
            font-size: 15px;
            color: #0044cc;
            font-weight: bold;
            margin-right: 20px;
            min-width: 50px;
        }

        .mission-list li p {
            margin: 0;
            color: #555;
        }

        /* Image Styles */
        .mission-image, .vision-image {
            text-align: center;
            margin-bottom: 40px;
        }

        .mission-image img, .vision-image img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .content{
                display: flex;
                align-items: flex-start;
                margin-bottom: 30px;
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
    </style>
@endsection

@section('main_content')
    <div class="section-wrapper">
        <div class="container">
            <!-- Mission Section -->
            <div class="heading">
                <h1>Our Mission</h1>
                <div class="divider"></div>
            </div>
            <div class="content">
                <ul class="mission-list">
                    <li>
                        <span>01</span>
                        <p>To provide comprehensive B.E. coaching classes that enhance students' understanding and mastery of engineering subjects.</p>
                    </li>
                    <li>
                        <span>02</span>
                        <p>To offer specialized preparation programs for the Nepal Engineering Council License exam, ensuring students are well-prepared for their professional certification.</p>
                    </li>
                    <li>
                        <span>03</span>
                        <p>To deliver practical and industry-relevant training for students and professionals, bridging the gap between academic learning and real-world application.</p>
                    </li>
                    <li>
                        <span>04</span>
                        <p>To foster an environment that encourages continuous learning, critical thinking, and innovation in the engineering field.</p>
                    </li>
                    <li>
                        <span>05</span>
                        <p>To support the personal and professional growth of our learners by providing resources and mentorship that align with their career goals.</p>
                    </li>
                </ul>
            </div>

            <!-- Vision Section -->
            <div class="heading">
                <h1>Our Vision</h1>
                <div class="divider"></div>
            </div>
            <div class="content">
                <p>
                    Line Academy envisions becoming the premier institution for engineering education and professional training in Nepal.
                    We aim to cultivate a community of skilled and knowledgeable engineers and professionals who are equipped to meet the challenges of the modern world.
                    Our goal is to inspire and empower our students and professionals to become leaders and innovators in the industry, contributing to the development and progress of society at large.
                </p>
            </div>
        </div>
    </div>
@endsection