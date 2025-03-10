@extends('frontend.layouts.master')
@section('styles')
    <style>
 @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
.item-inner:hover .item-position {
color: white;
}

.heading-custom {
  width: 100%;
  text-align: center;
}
.heading-inner {
  display: inline-block;
  position: relative;
}
.item-subtitle {
  font-size: 16px;
  font-weight: 400;
  color: #FFFFFF;
  margin-bottom: 5px;
}
.item-subtitle .item-subtext {
  display: inline-block;
  padding: 5px 14px;
  background-color: #dc143c;;
  border-radius: 1000px;
  position: relative;
  z-index: 0;
  font-family: "Roboto", san-serif;
}
.item-title {
  color: #1755a6;
  font-size: 40px;
  font-weight: 600;
  line-height: 56px;
  margin-bottom: 0px;
  font-family: "Roboto", san-serif;
  z-index: 2;
  position: relative;
}
.item-inner{
  border-radius: 16px;
  overflow: hidden;
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
  position: relative;
}
.item-inner .item-image img {
  height: auto;
  max-width: 100%;
  border: none;
  border-radius: 0;
  box-shadow: none;
  width: 100%;
}

.item-inner .item-holder {
  padding: 0px 20px 14px 20px;
  position: absolute;
  bottom: 17px;
  left: 17px;
  right: 17px;
  background-color: #fff;
  text-align: center;
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
  border-radius: 16px;
}
.item-inner .item-holder a{
  box-shadow: none;
  text-decoration: none;
}
.item-inner .item-holder .plus {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -19px;
  left: 19px;
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
  width: 38px;
  height: 38px;
  background: #dc143c;;
  border-radius: 1000px;
  box-shadow: 0px 8.025px 32.099px 0px rgba(255, 137, 137, 0.50);
}

.item-holder .plus svg path {
  fill: #fff;
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
}

.item-holder h5{
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
  color: #1c3f39;
  text-align: center;
  font-size: 14px;
  font-weight: 600;
  line-height: 30px;
  margin-bottom: 0;
}
body {
    font-size: 12px !important;
    font-family: "Poppins", sans-serif;
    
}
.item-holer .item-position {
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
  color: #1c3f39;
  text-align: center;
  font-family: Inter;
  font-size: 10px !important;
  font-weight: 400;
  line-height: 24px;
  margin-bottom: -5px;
}

.item-holder .item-social {
  margin-bottom: -24px;
  -webkit-transition: 250ms all linear 0ms;
  -khtml-transition: 250ms all linear 0ms;
  -moz-transition: 250ms all linear 0ms;
  -ms-transition: 250ms all linear 0ms;
  -o-transition: 250ms all linear 0ms;
  transition: 250ms all linear 0ms;
  opacity: 0;
}

.item-holder .item-social a {
  display: inline-flex;
  justify-content: center;
  align-items: center;
  width: 14px;
  height: 14px;
  border-radius: 100px;
  background-color: #fff;
}
.item-holder .item-social a i {
  font-size: 8px;
  color: #1755a6;
  line-height: 14px;
}
.item-inner:hover {
  transform: scale(1.07);
}

.item-inner:hover .item-holder {
  background-color: #87047F;
}

.item-inner:hover .item-social {
  opacity: 1;
  margin-bottom: 0px;
}
.item-inner:hover .item-holder .item-position .item-title, .item-inner:hover .item-holder .item-title a {
  color: #fff;
}

        .section-wrapper {
            padding: 20px 0;
            font-family: "Poppins", sans-serif;
            background-color: #f9f9f9;
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

        .team-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .team-card {
            width: 260px;
            text-align: center;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .team-card img {
            width: 100%;
            height: auto;
            border-radius: 10px; /* Rounded top corners for the image */
            border: solid 4px orange;
        }

        .team-card .name-role {
            background: #0044cc;
            color: #fff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 35px; /* Rounded bottom corners for the name section */
        }

        .team-card .name-role h4 {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            margin: 0;
        }

        .team-card .name-role p {
            font-size: 12px;
            margin: 5px 0 0;
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
    <div class="section-wrapper">
        <div class="container">

            <div class="heading">
                <h1>OUR CORE TEAM</h1>
                <div class="divider"></div>
            </div>
        <div class="row pt-2">
          @php
              $teamMembers = App\Models\TeamMember::all(); // Fetch all team members
          @endphp
          @foreach ($teamMembers as $member)

          <div class="col-md-3 col-lg-3 col-sm-12 col-12">
            <div class="item-inner wow skewIn m-2" data-wow-delay="ms" style="visibility: visible;">
              <div class="item-image">
                <img loading="lazy" decoding="async" width="700" height="700" src="{{ asset($member->photo_path) }}" class="no-lazyload attachment-full" alt="">
              </div>
              <div class="item-holder">
                <p href="">
                  <div class="plus">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.7715 15.494C7.19927 15.494 6.7356 15.0303 6.7356 14.4581V1.28298C6.7356 0.710743 7.19927 0.24707 7.7715 0.24707C8.34374 0.24707 8.80741 0.710743 8.80741 1.28298V14.4581C8.80741 15.0303 8.34374 15.494 7.7715 15.494Z" fill="#FF7D44"></path>
                                                    <path d="M14.3592 8.90629H1.1841C0.611866 8.90629 0.148193 8.44262 0.148193 7.87038C0.148193 7.29815 0.611866 6.83447 1.1841 6.83447H14.3592C14.9314 6.83447 15.3951 7.29815 15.3951 7.87038C15.3951 8.44262 14.9314 8.90629 14.3592 8.90629Z" fill="#FF7D44"></path>
                                                </svg>
                  </div>
                </p>
                <h5 class="item-title">
                  <a href="">
                    {{ strtoupper($member->name) }} </a>
                </h5>
                <div class="item-position">{{ $member->role }}</div>
                
              </div>
            </div>
          </div>
          @endforeach
        </div>
        </div>
    </div>
@endsection
