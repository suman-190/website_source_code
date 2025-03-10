@extends('frontend.layouts.master')
@section('main_content')
    <div class="section-wrapper inner-form-wrapper pt-4" style="padding-bottom:0px !important">
        <div class="container pb-5">
            <div class="contact-box shadow-contact-box">
                <h2 class="text-center">GOT A QUESTION? SEND AN ENQUIRY</h2>
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
@endsection
