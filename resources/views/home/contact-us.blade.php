@extends('home.main')
@section('content')


    <section class=" space-top space-extra-bottom ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="info-style2">
                        <div class="info-icon"><img src="assets/img/icon/c-b-1-1.svg" alt="icon"></div>
                        <h3 class="info-title">Phone No</h3>
                        <p class="info-text"><a href="tel:+4402076897888" class="text-inherit">+44 (0) 207 689 7888</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-style2">
                        <div class="info-icon"><img src="assets/img/icon/c-b-1-2.svg" alt="icon"></div>
                        <h3 class="info-title">Monday to Friday</h3>
                        <p class="info-text">8.30am – 02.00pm</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-style2">
                        <div class="info-icon"><img src="assets/img/icon/c-b-1-3.svg" alt="icon"></div>
                        <h3 class="info-title">Email Address</h3>
                        <p class="info-text"><a href="mailto:user@domainname.com" class="text-inherit">user@domainname.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--==============================
    Contact Area
    ==============================-->
    <section class=" space-extra-bottom ">
        <div class="container">
            <div class="row flex-row-reverse gx-60 justify-content-between">
                <div class="col-xl-auto">
                    <img src="assets/img/about/con-2-1.png" alt="girl" class="w-100">
                </div>
                <div class="col-xl col-xxl-6 align-self-center">
                    <div class="title-area">
                        <span class="sec-subtitle">Have Any questions? so plese</span>
                        <h2 class="sec-title">Feel Free to Contact!</h2>
                    </div>
                    <form action="#" class="form-style3 layout2 ajax-contact">
                        <div class="row justify-content-between">
                            <div class="col-md-6 form-group">
                                <label>First Name <span class="required">(Required)</span></label>
                                <input name="firstname" id="firstname" type="text">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name <span class="required">(Required)</span></label>
                                <input name="lastname" id="lastname" type="text">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email Address <span class="required">(Required)</span></label>
                                <input name="email" id="email" type="email">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phone Number <span class="required">(Required)</span></label>
                                <input name="number" id="number" type="number">
                            </div>
                            <div class="col-12 form-group">
                                <label>Message <span class="required">(Required)</span></label>
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Type your message"></textarea>
                            </div>
                            <div class="col-auto form-group">
                                <button class="vs-btn" type="submit">Send Message</button>
                            </div>
                            <p class="form-messages"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--==============================
    Map Area
    ==============================-->


@endsection
