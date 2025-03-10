@extends('frontend.layouts.master')
@section('styles')
    <style>

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
    <div class="section-wrapper contact-container scroll__down">
        <div class="container">
            <div class="contact-pos p-0">
                <div class="row">
                    
                    <div class="col col-md-6 col-sm-12">
                        <div class="contact-row">
                            
                            <div class="heading">
                                <h1>Line Academy Pvt. Ltd.</h1>
                                <div class="divider"></div>
                            </div>
                            <hr>
                            <address class="ins-address mb-0">Jal Vinayak Marg, Na Tole, Pulchowk, Lalitpur
                            </address>
                            <div class="ins-phone">
                                <a href="tel:+977-9749424636" target="">+977-9749424636</a>
                                /
                                <a href="tel:01-5445555" target="">01-5445555</a>
                                /
                                <a href="tel:+977-9763604776" target="">+977-9763604776</a>
                            </div>
                            <div class="ins-phone">
                                <a href="tel:01-5445555">Inquiry Hotline : 01-5445555</a>
                                <br>
                            </div>
                            <div class="ins-email">
                                <a href="mailto:info.lineacademy@gmail.com">info.lineacademy@gmail.com</a><br>
                            </div>
                            <hr>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.364414054371!2d85.31464991112938!3d27.675129726812287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19fb219c4cab%3A0x27ad2d020a7d839b!2sLine%20Academy!5e0!3m2!1sen!2snp!4v1739004388063!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col col-md-6 col-sm-12">
                        <div class="contact-box">
                            <h2>GET IN TOUCH!</h2>
                            <!--<p>We would love to hear from you.</p>-->
                            <form method="POST" action="{{ route('front.feedback.store') }}"
                                  accept-charset="UTF-8" class="base-form form-vertical form-liner" id="contact-form"
                                  name="contact-form">
                                  @csrf
                                  @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                  @endif
                                <div class="form-pos">
                                    <div class="input-group">
                                        <label for="name" class="form-label">Name <span class="ast">*</span></label>
                                        <input class="form-control" name="name" placeholder="Your Name" tabindex="1"
                                               type="text">
                                    </div>
                                    <div class="input-group">
                                        <label class="control-label">
                                            Email <span class="required">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Your Email" tabindex="2"
                                               onkeyup=""
                                               pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)" required=""
                                               name="email" type="email">
                                    </div>
                                    <div class="input-group">
                                        <label class="control-label">
                                            Mobile Number <span class="required">*</span>
                                        </label>
                                            <input class="form-control" id="mobile" tabindex="3"
                                                   name="contact" type="tel" autocomplete="off"
                                                   placeholder="e.g. 9841002000">
                                    </div>
                                    <div class="input-group">
                                        <label for="name" class="form-label">Subject <span class="ast">*</span></label>
                                        <input placeholder="Your Subject" class="form-control" tabindex="5"
                                               name="subject" type="text">
                                    </div>
                                    <div class="input-group">
                                        <label for="message" class="form-label">Message <span
                                                class="ast">*</span></label>
                                        <textarea class="form-control" required="" placeholder="You Message"
                                                  tabindex="6" name="message" cols="50" rows="10"></textarea>
                                    </div>
                                    <div class="btn-holder">
                                        <button type="submit" tabindex="7" id="contact-submit-btn"
                                                class="btn btn-icon btn-primary">Submit enquiry
                                            <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
