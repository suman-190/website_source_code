@extends('frontend.layouts.master')
@section('main_content')
    <div class="hero hero-detail hero-sub hero-career text-center">
        <div class="bg">
            <img src="/ui/images/hero-section.jpg" alt="Online Admission">
        </div>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Careers
                    </li>
                </ol>
            </nav>
            <div class="hero-detail-text">
                <h2>Online Student Admission Form</h2>
                <div class="section-wrapper hero-cta hero-cta-big">
                    <p>
                        For our candidates to admit for their interested IT Course at their comfort, we have made
                        available the Online Admission Form below!
                    </p>
                </div>
                <div class="btn-holder">
                    <a href="" class="btn btn-warning text-white"
                       id="arrow__down">
                        View Form
                        <i class="fa fa-arrow-down"></i>
                    </a><a href="" class="btn btn-primary text-white"
                           id="arrow__down">
                        Payment Options
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-wrapper inner-form-wrapper scroll__down">
        <div class="container">
            <div class="content-header text-center">
                <h2>Online Admission</h2>
                <p>Please fill out the form below and get enrolled now! All Asterisks (*) fields are mandatory to
                    fill-up.</p>
            </div>
            <div id="smartwizard" class="sw sw-theme-default sw-justified">
                <ul class="nav">
                    <li><a class="nav-link inactive active" href="#step-1">Personal Information</a></li>
                    <li><a class="nav-link inactive" href="#step-2">Payment Information</a></li>
                    <li><a class="nav-link inactive" href="#step-3">Review Details</a></li>
                </ul>
                <form method="POST" action="" accept-charset="UTF-8">
                    <div class="tab-content">
                        <div class="alert alert-danger ajax_server_validation" style="display: none;">
                            <ul class="fullErrors"></ul>
                        </div>
                        <div id="step-1" class="tab-pane" role="tabpanel" style="display: block;">
                            <div class="contact-box">
                                <div class="form-pos">
                                    <div class="input-group">
                                        <label for="full_name" class="form-label">Full Name <span
                                                class="ast">*</span></label>
                                        <input class="form-control form-control-error form-name" placeholder="Your Name"
                                               title="Your full name is required." tabindex="1" name="full_name"
                                               type="text" wfd-id="id8">
                                    </div>
                                    <div class="input-group">
                                        <label for="email" class="form-label">Email <span class="ast">*</span></label>
                                        <input class="form-control form-email form-control-error"
                                               title="Please enter a valid email" tabindex="2" placeholder="Your Email"
                                               pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)" name="email"
                                               type="email" wfd-id="id9">
                                    </div>
                                    <div class="input-group">
                                        <label for="address" class="form-label">Address <span
                                                class="ast">*</span></label>
                                        <input class="form-control form-address form-control-error" tabindex="4"
                                               placeholder="Your Address" title="Address is required." required=""
                                               name="address" type="text" wfd-id="id11">
                                    </div>
                                    <div class="input-group">
                                        <label for="academic_level" class="form-label">Academic Level <span class="ast">*</span></label>
                                        <select class="form-control academic_levelNum form-control-error" tabindex="5"
                                                title="Academic is required." id="academic_level" required=""
                                                name="academic_level">
                                            <option value="" selected="selected">Select level</option>
                                            <option value="plus_2">+2</option>
                                            <option value="bachelors">Bachelors</option>
                                            <option value="masters">Masters</option>
                                            <option value="phd">Phd</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="other_course" class="form-label">Other Course</label>
                                        <input class="form-control" tabindex="7" placeholder="Mention the course name"
                                               title="Other Course" name="other_course" type="text" wfd-id="id53">
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">School / College Name </label>
                                        <input class="form-control form-address college_name" tabindex="8"
                                               placeholder="Your School / College Name" name="college" type="text"
                                               wfd-id="id54">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" style="display: none;">
                            <div class="contact-box">
                                <div class="input-group">
                                    <label for="name" class="form-label">Select Payment Option</label>
                                    <div class="custom-radios custom-payment payment-option-group">
                                        <div class="payment-slot payment-online">
                                            <input type="radio" id="esewa" name="payment_through" value="esewa"
                                                   attr-name="esewa" attr-display-name="Esewa" wfd-id="id55">
                                            <label for="esewa" class="payment__slot__label">
                                                <img src="https://broadwayinfosys.com/assets/images/esewa-sml.png"
                                                     alt="Esewa" title="Click here">
                                            </label>
                                        </div>
                                        <div class="payment-slot payment-online">
                                            <input type="radio" id="khalti" name="payment_through" value="khalti"
                                                   attr-name="khalti" attr-display-name="Khalti" wfd-id="id56">
                                            <label for="khalti" class="payment__slot__label">
                                                <img src="https://broadwayinfosys.com/assets/images/khalti.png"
                                                     alt="Khalti" title="Click here">
                                            </label>
                                        </div>
                                        <div class="payment-slot payment-online">
                                            <input type="radio" id="connect-ips" name="payment_through"
                                                   value="connect_ips" attr-name="connect-ips" title="Click here"
                                                   attr-display-name="connect-ips" wfd-id="id57">
                                            <label for="connect-ips" class="payment__slot__label">
                                                <img src="https://broadwayinfosys.com/assets/images/connectips-img.png"
                                                     alt="connect-ips">
                                            </label>
                                        </div>
                                        <div class="payment-slot payment-online">
                                            <input type="radio" id="imepay" name="payment_through" value="imepay"
                                                   attr-name="imepay" title="Click here" attr-display-name="Imepay"
                                                   wfd-id="id58">
                                            <label for="imepay" class="payment__slot__label">
                                                <img src="https://broadwayinfosys.com/assets/images/imepay.png"
                                                     alt="ImePay">
                                            </label>
                                        </div>
                                        <div class="payment-slot payment-alternet">
                                            <input type="radio" id="fonepay" name="alternet_payment" value="fonepay"
                                                   attr-name="fonepay" attr-display-name="Fonepay" wfd-id="id59">
                                            <label for="fonepay" class="payment__slot__label">
                                                <img
                                                    src="https://broadwayinfosys.com/uploads/payment-option/8021585746120.png"
                                                    alt="Fonepay" title="Click here" attr-name="fonepay">
                                            </label>
                                        </div>
                                        <div class="payment-slot payment-alternet">
                                            <input type="radio" id="bank-transfer" name="alternet_payment"
                                                   value="bank-transfer" attr-name="bank-transfer"
                                                   attr-display-name="Bank Transfer" wfd-id="id60">
                                            <label for="bank-transfer" class="payment__slot__label">
                                                <img
                                                    src="https://broadwayinfosys.com/uploads/payment-option/4801585975279.png"
                                                    alt="Bank Transfer" title="Click here" attr-name="bank-transfer">
                                            </label>
                                        </div>
                                        <div class="payment-slot payment-alternet">
                                            <input type="radio" id="other" name="alternet_payment" value="other"
                                                   attr-name="other" attr-display-name="Other" wfd-id="id61">
                                            <label for="other" class="payment__slot__label">
                                                <img
                                                    src="https://broadwayinfosys.com/uploads/payment-option/3241595519241.jpg"
                                                    alt="Other" title="Click here" attr-name="other">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="sub payment-guide" style="display: none">
                                        <div class="info-box">
                                            <section class="training-points pay-block" id="model-content-fonepay"
                                                     style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h2>How to pay from <span>Fonepay Application?</span>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 text-center" style="margin-top: 10px">
                                                                <img
                                                                    src="https://broadwayinfosys.com/assets/images/Broadway_Infosys-QR-1.png"
                                                                    width="300px" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="training-points pay-block" id="model-content-bank-transfer"
                                                     style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2>How to pay via <span>Bank Transfer?</span></h2>
                                                                <p>In order to pay via Bank Transfer, Broadway Infosys
                                                                    has the following banks:</p>
                                                                <p><strong>Siddhartha Bank Details:</strong></p>
                                                                <p>Bank Name: Siddhartha Bank Ltd.<br>
                                                                    Account Name: Broadway Infosys Private Limited<br>
                                                                    Account Number: 01715301386<br>
                                                                    Branch: Tinkune<br>
                                                                    SWIFT: SIDDNPKA</p>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <img
                                                                    src="https://broadwayinfosys.com/uploads/payment-option/2691628744427.png"
                                                                    width="300px" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="training-points pay-block" id="model-content-other"
                                                     style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2>Other</h2>
                                                                <p>Please specify if you have used any other payment
                                                                    option apart from the ones listed above.</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <img
                                                                    src="https://broadwayinfosys.com/uploads/payment-option/1651595519241.jpg"
                                                                    width="300px" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group alternet-section">
                                    <label for="alternet_payment_proof" class="form-label">Upload your Proof of Payment
                                        <span class="ast">*</span></label>
                                    <div class="custom-file-upload">
                                        <input class="file-upload filestyle" type="file" data-buttonname="btn-primary"
                                               id="alternet_payment_proof" name="alternet_payment_proof"
                                               onchange="encodeAltPayImgtoBase64(this)" wfd-id="id62">
                                        <input type="hidden" name="alt_pay_image_base64" id="convertAltPayImg" value=""
                                               wfd-id="id63">
                                    </div>
                                    <p class="note">Supported files: pdf, png, jpg, jpeg (Maximum image size: 2MB)</p>
                                </div>
                                <div class="sub alternet-section" style="display: none;">
                                    <div class="input-group">
                                        <label for="alternet_payment_amount" class="form-label">Amount (Rs.) <span
                                                class="ast">*</span></label>
                                        <input type="text" class="form-control payment_amount" min="1000"
                                               id="alternet_payment_amount" name="alternet_payment_amount"
                                               placeholder="Enter your amount" wfd-id="id64">
                                        <small class="note">
                                            The amount must be at least Rs. <span class="OA_min_amt_info">1000</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="sub online-section">
                                    <div class="input-group">
                                        <label for="amount" class="form-label">Amount (Rs.) <span
                                                class="ast">*</span></label>
                                        <input type="text" class="form-control payment_amount" id="amount" min="1000"
                                               name="amount" placeholder="Enter your amount" wfd-id="id65">
                                        <small class="note">The amount must be at least Rs. <span
                                                class="OA_min_amt_info">1000</span> </small>
                                    </div>
                                </div>
                                <input type="hidden" value="1000" class="payment_amount_updated" wfd-id="id66">
                                <input type="hidden" value="1000" id="default_payment_amount" wfd-id="id67">
                                <input type="hidden" value="1000" name="final_min_deposit_amt" wfd-id="id68">
                                <div class="input-group">
                                    <label for="remarks" class="form-label">Remarks </label>
                                    <input type="text" class="form-control" id="remarks" name="remarks"
                                           placeholder="Your Remarks" wfd-id="id69">

                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel">
                            <div class="contact-box review-box">
                                <div class="form-pos" id="oa-form-summary">
                                    <div class="input-group">
                                        <div class="custom-profile-upload" id="profile-preview">
                                            <img src="" alt="">
                                        </div>
                                        <label id="profile-preview-label" for="file"
                                               class="form-label text-center"></label>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Full Name</label>
                                        <span id="full_name" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Email</label>
                                        <span id="email" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Mobile Number</label>
                                        <span id="mobile" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Address</label>
                                        <span id="address" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Academic Level</label>
                                        <span id="selected_academic_level" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Selected Course</label>
                                        <span id="selected_course" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Other Course</label>
                                        <span id="other_course" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Payment Option</label>
                                        <span id="payment_option" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Amount</label>
                                        <span id="amount" class="value"></span>
                                    </div>
                                    <div class="input-group offerTitleWrapper">
                                        <label class="form-label">Offer Title</label>
                                        <span id="offerTitle" class="value"></span>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label">Remarks</label>
                                        <span id="remarks" class="value"></span>
                                    </div>
                                    <div class="input-group d-flex align-items-center">
                                        <input class="accepting_terms_condition" name="terms_condition"
                                               id="accepting_terms_condition" type="checkbox" wfd-id="id70">
                                        <label for="accepting_terms_condition" class="ml-2 mt-2"
                                               style="flex-basis: auto;">
                                            I understand and agree to the <a class="d-inline-block"
                                                                             href="/terms-conditions"
                                                                             target="_blank">Terms &amp; Conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: center;">
                        <button class="btn sw-btn-prev disabled" type="button">Previous</button>
                        <button class="btn sw-btn-next" type="button">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
