@extends('home.main')
@section('content')

<!--==============================
    Team Area
    ==============================-->
    <section class=" space-top space-extra-bottom">
        <div class="container">
            <h2 class="sec-title mt-lg-3 pb-lg-1 text-center">Interested In Becoming a Tutor?</h2>
            {{-- <div class="row align-items-center">
                @foreach($teachers as $teacher)
                <div class="col-sm-6">
                    <div class="team-style1 layout2">
                        <div class="team-img">
                            <!-- Teacher's profile image or placeholder -->
                            <a href="#"><img src="{{ $teacher->profile_image ? asset('storage/' . $teacher->profile_image) : asset('assets/img/team/t-1-1.jpg') }}" alt="team"></a>
                        </div>
                        <div class="team-content">
                            <!-- Teacher's Name -->
                            <h3 class="team-name h2">
                                <a href="#" class="text-inherit">{{ $teacher->name }}</a>
                            </h3>

                            <!-- Teacher's Role (assuming bio or title can be displayed) -->
                            <p class="team-degi">{{ $teacher->bio ?? 'Tutor' }}</p>

                            <!-- Teacher's phone number -->
                            <a href="tel:{{ $teacher->phone_number }}" class="team-number">{{ $teacher->phone_number ?? 'N/A' }}</a>

                            <!-- Social media links (if available) -->
                            <div class="vs-social">
                                @if($teacher->socialMediaHandles->where('platform', 'facebook')->first())
                                    <a href="{{ $teacher->socialMediaHandles->where('platform', 'facebook')->first()->url }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($teacher->socialMediaHandles->where('platform', 'twitter')->first())
                                    <a href="{{ $teacher->socialMediaHandles->where('platform', 'twitter')->first()->url }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                <!-- Add more social links as needed -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach







            </div> --}}

            <div class="container">

                <div class="row align-items-center">
                    @foreach($teachers as $teacher)
                    <div class="col-sm-6 col-lg-3">
                        <div class="team-style2">

                            <div class="team-img"><a href="team-details.html"><img src="{{ $teacher->profile_image ? asset('storage/' . $teacher->profile_image) : asset('assets/img/team/t-1-1.jpg') }}" alt="team"></a></div>
                            <h3 class="team-name"><a class="text-inherit" href="team-details.html">{{ $teacher->name }}</a></h3>

                        </div>
                    </div>

            @endforeach
                </div>
                </div>



            <div class="text-center mt-30">
                <div class="vs-pagination pt-md-3">
                    <!-- Previous Page Link -->
                    @if ($teachers->onFirstPage())
                        <span class="pagi-btn disabled">Prev</span>
                    @else
                        <a href="{{ $teachers->previousPageUrl() }}" class="pagi-btn">Prev</a>
                    @endif

                    <!-- Pagination Links -->
                    <ul>
                        @foreach ($teachers->getUrlRange(1, $teachers->lastPage()) as $page => $url)
                            <li class="{{ $page == $teachers->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- "Three Dots" Separator if necessary -->
                        @if ($teachers->lastPage() > 3 && $teachers->currentPage() < $teachers->lastPage() - 1)
                            <li><a href="#">...</a></li>
                            <li><a href="{{ $teachers->url($teachers->lastPage()) }}">{{ $teachers->lastPage() }}</a></li>
                        @endif
                    </ul>

                    <!-- Next Page Link -->
                    @if ($teachers->hasMorePages())
                        <a href="{{ $teachers->nextPageUrl() }}" class="pagi-btn">Next</a>
                    @else
                        <span class="pagi-btn disabled">Next</span>
                    @endif
                </div>
            </div>
        </div>
    </section>





    <section class=" space-bottom">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-10">
                    <div class="icon-btn style2 mb-4 mb-lg-5"><img src="assets/img/icon/cta-i-1-1.svg" alt="icon"></div>
                    <h2 class="sec-title mb-lg-3 pb-lg-1">Interested In Becoming a Tutor?</h2>
                    <p class="sec-text col-10 mx-auto mb-3 mb-lg-5">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups dolor sit amet, consectetur dolore magna aliqua</p>
                    <a href="{{route('register')}}" class="vs-btn">Register</a>
                </div>
            </div>
        </div>
    </section><!--==============================
			Footer Area
	==============================-->


@endsection
