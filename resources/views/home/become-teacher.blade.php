@extends('home.main')
@section('content')

<section class=" space-top">
    <div class="container">
        <div class="row justify-content-between flex-row-reverse gx-50">
            <div class="col-lg-6">
                <div class="img-box7">
                    <div class="mega-hover"><img class="w-100" src="assets/img/service/sr-d-1-1.jpg" alt="teacher"></div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="service-about">
                    <h2 class="service-title h1 mt-n2">Healthy Meals</h2>
                    <div class="title-divider2"></div>
                    <p class="service-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
                    <div class="list-style1">
                        <ul class="list-unstyled">
                            <li>Comprehensive reporting on individual achievement</li>
                            <li>Educational field trips and school presentations</li>
                            <li>Individual attention in a small-class setting</li>
                            <li>Learning program with after-school care</li>
                        </ul>
                    </div>
                    <h3 class="h6 pt-1 text-uppercase">Sessions: Monday – Friday</h3>
                    <div class="row gx-50">
                        <div class="col-auto">
                            <div class="info-style1">
                                <p class="info-title">Morning:</p>
                                <p class="info-text">9am – 12noon</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="info-style1">
                                <p class="info-title">Lunch:</p>
                                <p class="info-text">12noon – 1pm</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="info-style1">
                                <p class="info-title">Afternoon:</p>
                                <p class="info-text">1pm – 3.30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto"><a href="{{route('register.teacher')}}" class="vs-btn">Apply To Teach</a></div>
                </div>
            </div>
            <div class="service-description">
                <h2>Service Details</h2>
                <div class="title-divider2"></div>
                <p>We are constantly expanding the range of services offered, taking care of children of all ages. Our goal is to carefully educate and develop children in a fun way. We strive to turn the learning process into a bright event so that children study with pleasure. We are constantly expanding the range of services offered, taking care of children of all ages. Our goal is to carefully educate and develop children in a fun way. We strive to turn the learning process into a bright event so that children study with pleasure. We are constantly expanding the range of services offered, taking care of children of all ages. Our goal is to carefully educate and develop children in a fun way. We strive to turn the learning process into a bright event so that children study with pleasure. </p>
            </div>
        </div>
    </div>
</section>








@endsection
