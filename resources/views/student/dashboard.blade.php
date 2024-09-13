@extends('home.main')
@section('content')


<section class="vs-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="woocommerce-Reviews">
                <div class="vs-comments-wrap   ">
                    <ul class="comment-list">
                        <li class="review vs-comment-item">
                            <div class="vs-post-comment">
                                <div class="comment-avater">
                                    <img src="assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                                </div>
                                <div class="comment-content">
                                    <h4 class="name h4"> Welcome {{ auth()->user()->name }} !</h4>
                                    <span class="commented-on"><i class="fal fa-calendar-alt"></i>26 April, 2023</span>
                                    <div class="review-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span style="width:100%">Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                    </div>
                                    <p class="text">The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <div class="row gx-40">
            <div class="col-lg-4">
                <aside class="sidebar-area">


                    <div class="widget widget_categories   ">
                        <h3 class="widget_title">Dashboard</h3>
                        <ul>
                            <li>
                                <a href="blog.html">TODDLER</a>
                            </li>
                            <li>
                                <a href="blog.html">PRESCHOOL</a>
                            </li>
                            <li>
                                <a href="blog.html">KINDERGARTEN</a>
                            </li>
                            <li>
                                <a href="blog.html">PRE-K PROGRAM</a>
                            </li>
                            <li>
                                <a href="blog.html">AFTER SCHOOL</a>
                            </li>
                        </ul>
                    </div>

                    <div class="widget  ">
                        <h3 class="widget_title">Video</h3>
                        <div class="vs-video-widget">
                            <div class="video-thumb mega-hover">
                                <img src="assets/img/blog/intro-video-thumb.jpg" alt="Video Thumb" class="w-100">
                                <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video position-center"><i class="fas fa-play"></i></a>
                            </div>
                            <h4 class="video-title h5"><a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="text-inherit popup-video">A very warm welcome to our new Treasurer</a></h4>
                        </div>
                    </div>

                    <div class="widget bg-vs-secondary  " data-bg-src="assets/img/bg/widget-bg-1-1.png">
                        <h4 class="mt-n2 text-white">Join together to make amazing things happen</h4>
                        <p class="mb-4 pb-1 text-white">Get all the latest information, support and guidance about the cost of living with kindergarten.</p>
                        <a href="registration.html" class="vs-btn">Start Registration</a>
                    </div>
                </aside>
            </div>
            <div class="col-lg-8">
                <div class="row vs-carousel mb-3 pb-1 border-0 " data-slide-show="3" data-md-slide-show="2">
            <div class="col-md-6 col-lg-4">
                <div class="service-style2">
                    <div class="service-icon">
                        <div class="service-shape1"></div>
                        <div class="service-shape2"></div>
                        <div class="service-shape3"></div>
                        <img src="assets/img/icon/sr-2-1.svg" alt="icon">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><a class="text-inherit" href="class-details.html">Learning &amp; Fun</a></h3>
                        <p class="service-text">Our goal is to carefully educate and develop children in a fun way. We strive learning process into a bright.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-style2">
                    <div class="service-icon">
                        <div class="service-shape1"></div>
                        <div class="service-shape2"></div>
                        <div class="service-shape3"></div>
                        <img src="assets/img/icon/sr-2-2.svg" alt="icon">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><a class="text-inherit" href="class-details.html">Healthy Meals</a></h3>
                        <p class="service-text">Our goal is to carefully educate and develop children in a fun way. We strive learning process into a bright.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-style2">
                    <div class="service-icon">
                        <div class="service-shape1"></div>
                        <div class="service-shape2"></div>
                        <div class="service-shape3"></div>
                        <img src="assets/img/icon/sr-2-3.svg" alt="icon">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><a class="text-inherit" href="class-details.html">Children Safety</a></h3>
                        <p class="service-text">Our goal is to carefully educate and develop children in a fun way. We strive learning process into a bright.</p>
                    </div>
                </div>
            </div>

        </div>
            </div>


        </div>
    </div>
</section>

@endsection
