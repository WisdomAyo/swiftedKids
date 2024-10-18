@extends('dashboard.main2')
@section('content')


<div class="main-wrapper">



    <section class="page-content profile-sec">
        <div class="container">
            <div class="row align-items-left">
                <div class="col-md-12">
                    <div class="add-course-header">
                        <h2>Complete Your Profile</h2>
                        <div class="add-course-btns">
                            <ul class="nav">
                                <li>
                                    <p>Please fill out the information below as completely and accurately as possible</p>
                                    <a href="/" class="btn btn-black">Back to Homepage</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Multistep Form -->
            <div class="row">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="col-xl-10 card shadow p-5   mb-5">


                    <!-- Edit profile START -->
                    <div class="card bg-transparent border rounded-3">
                        <!-- Card header -->
                        <div class="card-header bg-transparent border-bottom">
                            <h3 class="card-header-title mb-0">Complete your Profile </h3>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <div class="col-xl-12">


                            <!-- Form -->
                            <form class="row g-4" method="POST" action="{{ route('teacher.profile.store') }}" enctype="multipart/form-data">
                                @csrf



                                <!-- Profile picture -->
                                <div class="col-12 justify-content-center align-items-center">
                                    <label class="form-label">Profile picture</label>
                                    <div class="d-flex align-items-center">
                                        <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                            <!-- Avatar place holder -->
                                            <span class="avatar avatar-xl">
                                                <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow"
                                                     src="{{ $teacher->profile_image ? asset('storage/' . $teacher->profile_image) : asset('assets/images/avatar/default.jpg') }}"
                                                     alt="Profile Image" width="150" height="150">
                                            </span>
                                            <!-- Remove btn -->
                                            <label class="btn btn-primary-soft" for="uploadfile-1">Upload</label>

                                            <input id="uploadfile-1" class="form-control d-none" type="file" name="profile_image" accept="image/*">
                                            <small class="text-muted">(Image max size 4.00 MB and allowed ext png, jpg, jpeg, gif, bmp, Dimension (300 x 310)) </small>
                                            @error('profile_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>

                                <!-- Full name -->
                                <div class="col-12">
                                    <label class="form-label">Full name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $teacher->name) }}" placeholder="Full Name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Country Code</span>
                                        <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number', $teacher->phone_number) }}" placeholder="Phone Number">
                                        @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="{{ old('dob', $teacher->dob) }}">
                                    @error('dob')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="add-course-label">Language</label>
                                    <input type="text" class="form-control" name="language" value="{{ old('nin', $teacher->languge) }}" placeholder="Enter Language">
                                    @error('language')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Gender -->
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="" disabled selected>Select your gender</option>
                                        <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <small class="text-muted">Select your gender.</small>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- NIN (National ID Number) -->
                                <div class="col-md-6">
                                    <label class="add-course-label">NIN (National ID Number)</label>
                                    <input type="number" class="form-control" name="nin" value="{{ old('nin', $teacher->nin) }}" placeholder="Enter NIN">
                                    @error('nin')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Country, State, City Selection -->
                                {{-- <div class="input-block col-md-6">
                                    <label class="add-course-label">Country</label>
                                    <select class="form-control select2" id="country-dropdown" name="country_id">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country_id', $teacher->country_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-block col-md-6">
                                    <label class="add-course-label">State</label>
                                    <select class="form-control" id="state-dropdown" name="state_id">
                                        <option value="">Select State</option>
                                    </select>
                                    @error('state_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-block col-md-6">
                                    <label class="add-course-label">City</label>
                                    <select class="form-control" id="city-dropdown" name="city_id">
                                        <option value="">Select City</option>
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="col-md-6">
                                    <label class="form-label">Profile Video Source</label>

                                    <!-- Radio for YouTube Link -->
                                    <div class="video-player">
                                        <div id="player-youtube" data-plyr-provider="youtube" data-plyr-embed-id="Uh9643c2P6k"></div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="videos[0][type]" id="videoTypeLink" value="youtube"
                                               {{ old('videos[0][type]', $teacher->videos->first()->video_type ?? 'youtube') === 'youtube' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="videoTypeLink">YouTube Video Link</label>

                                    </div>




                                    <!-- Radio for Video File Upload -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="videos[0][type]" id="videoTypeFile" value="uploaded"
                                               {{ old('videos[0][type]', $teacher->videos->first()->video_type ?? 'youtube') === 'uploaded' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="videoTypeFile">Upload Video File</label>
                                    </div>

                                    <!-- YouTube Video Link Input -->
                                    <div id="linkInput" style="display: {{ old('videos[0][type]', $teacher->videos->first()->video_type ?? 'youtube') === 'youtube' ? 'block' : 'none' }};">
                                        <label for="video_link">Video Link</label>
                                        <input type="url" class="form-control" name="videos[0][youtube_link]" id="video_link" placeholder="YouTube URL"
                                               value="{{ old('videos[0][youtube_link]', $teacher->videos->first()->youtube_link ?? '') }}">
                                        <iframe id="youtubePreview" width="320" height="180" style="display:none; margin-top: 10px;" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>

                                    <!-- Video File Upload Input -->
                                    <div id="fileInput" style="display: {{ old('videos[0][type]', $teacher->videos->first()->video_type ?? 'youtube') === 'uploaded' ? 'block' : 'none' }};">
                                        <label for="video_file">Upload Video File</label>
                                        <input type="file" class="form-control" name="videos[0][uploaded_video]" id="video_file" accept="video/*">
                                    </div>
                                </div>


                                <!-- About me -->
                                <div class="col-12">
                                    <label class="form-label">About Me</label>
                                    <textarea class="form-control" name="bio" rows="3" placeholder="Write a brief description about yourself...">{{ old('bio', $teacher->bio) }}</textarea>
                                    <small class="text-muted">⚠️ About You & Teaching Style (Detailed, Not Less Than 2 Paragraphs)</small>
                                    @error('bio')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Education -->
                                <div class="col-12">
                                    <label class="form-label">Education</label>
                                    <div id="education-fields">
                                        @foreach($teacher->education as $key => $education)
                                            <div class="education-entry mb-3" id="education-{{ $key }}">
                                                <input class="form-control mb-2" type="text" name="education[{{ $key }}][institution]" value="{{ old('education.'.$key.'.institution', $education->institution) }}" placeholder="Institution">
                                                <input class="form-control mb-2" type="text" name="education[{{ $key }}][field_of_study]" value="{{ old('education.'.$key.'.field_of_study', $education->field_of_study) }}" placeholder="field_of_study">
                                                <input class="form-control mb-2" type="text" name="education[{{ $key }}][degree]" value="{{ old('education.'.$key.'.degree', $education->degree) }}" placeholder="Degree">
                                                <input class="form-control mb-2" type="date" name="education[{{ $key }}][graduation_year]" value="{{ old('education.'.$key.'.graduation_year', $education->graduation_year) }}" placeholder="Graduation Year">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeEducationField({{ $key }})">Remove</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-sm btn-light" onclick="addEducationField()">Add More</button>
                                </div>


                                <div class="row g-4 mt-3">
                                    <!-- Linked account START -->
                                    <div class="col-lg-6">
                                        <div class="card bg-transparent border rounded-3">
                                            <!-- Card header -->
                                            <div class="card-header bg-transparent border-bottom">
                                                <h5 class="card-header-title mb-0">Skill & Specialty</h5>
                                            </div>
                                            <!-- Card body START -->
                                            <div class="card-body pb-0">
                                                 <!-- Specialties -->
                                            {{-- <div class="col-12">
                                                <label class="form-label">Specialties</label>
                                                <select name="specialties[]" class="form-control js-example-basic-multiple" multiple="multiple">
                                                    @foreach($teacher->specialties as $specialty)
                                                        <option value="{{ $specialty->specialty }}" selected>{{ $specialty->specialty }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                            <!-- Skills -->
                            <div class="col-12">
                                <label class="form-label">Skills</label>
                                <input type="text" class="form-control mb-2" name="skills[]" id="skills" placeholder="Enter skills (comma separated)" value="{{ old('skills') ? implode(',', old('skills')) : implode(',', $teacher->skills->pluck('skill_name')->toArray()) }}" data-role="tagsinput" />
                            </div>



                                            </div>
                                            <!-- Card body END -->
                                        </div>
                                    </div>
                                    <!-- Linked account end -->

                                    <!-- Social media profile START -->
                                    <div class="col-lg-6">
                                        <div class="card bg-transparent border rounded-3">
                                            <!-- Card header -->
                                            <div class="card-header bg-transparent border-bottom">
                                                <h5 class="card-header-title mb-0">Social media profile</h5>
                                            </div>
                                            <!-- Card body START -->
                                            <div class="card-body">
                                                <!-- Facebook username -->
                                                <div class="mb-3">

                                                    @foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $platform)

                                                        <label class="form-label"><i class="fab fa-{{ $platform }} text-{{ $platform }}  m-2"></i>{{ ucfirst($platform) }} URL</label>
                                                        <input type="text" class="form-control mb-2" name="social_media[{{ $platform }}]" value="{{ old('social_media.'.$platform, $teacher->socialMediaHandles->where('platform', $platform)->first()->url ?? '') }}" placeholder="Enter {{ ucfirst($platform) }} URL">

                                                @endforeach
                                                </div>


                                                <
                                            </div>
                                            <!-- Card body END -->
                                        </div>
                                    </div>

                                </div>

                                 <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary mb-0">Complete Profile </button>
                            </div>
                            </form>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Edit profile END -->


                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div id="successModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="modal-title">Profile Completed!</h4>
                        <p>Your profile has been successfully updated. Welcome aboard!</p>
                        <a href="{{ route('teacher.dashboard') }}" class="btn btn-success-dark">Go to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
</section>


<div class="modal fade" id="completionModal" tabindex="-1" aria-labelledby="completionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="completionModalLabel">Profile Completed!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your profile has been successfully completed. You can now proceed to your dashboard.
            </div>
            <div class="modal-footer">
                <a href="{{ route('teacher.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
            </div>
        </div>
    </div>
</div>



</div>

<script type="text/javascript">






    var input = document.querySelector('input[name="skills[]"]');
    new Tagify(input)



    document.getElementById('uploadfile-1').addEventListener('change', function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('uploadfile-1-preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});


     // Function to dynamically add education fields
     let educationFieldIndex = {{ count($teacher->education) }};

    // Add dynamic education field
    function addEducationField() {
        const newField = `
            <div class="education-entry mb-3" id="education-${educationFieldIndex}">
                <input class="form-control mb-2" type="text" name="education[${educationFieldIndex}][institution]" placeholder="Institution">
                <input class="form-control mb-2" type="text" name="education[${educationFieldIndex}][field_of_study]" placeholder="Field Of Study">
                <input class="form-control mb-2" type="text" name="education[${educationFieldIndex}][degree]" placeholder="Degree">
                <input class="form-control mb-2" type="text" name="education[${educationFieldIndex}][graduation_year]" placeholder="Graduation Year">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeEducationField(${educationFieldIndex})">Remove</button>
            </div>
        `;
        document.getElementById('education-fields').insertAdjacentHTML('beforeend', newField);
        educationFieldIndex++;
    }

    // Remove education field
    function removeEducationField(index) {
        document.getElementById(`education-${index}`).remove();
    }


        // Script to toggle visibility of video link/file input based on user selection
        document.addEventListener("DOMContentLoaded", function() {
            const linkInput = document.getElementById('linkInput');
            const fileInput = document.getElementById('fileInput');
            const videoTypeLink = document.getElementById('videoTypeLink');
            const videoTypeFile = document.getElementById('videoTypeFile');

            // Event listener for radio buttons
            videoTypeLink.addEventListener('change', () => {
                linkInput.style.display = 'block';
                fileInput.style.display = 'none';
            });

            videoTypeFile.addEventListener('change', () => {
                linkInput.style.display = 'none';
                fileInput.style.display = 'block';
            });
        });



//  // Fetch states when a country is selected
// $(document).ready(function() {
//     $('#country-dropdown').on('change', function() {
//         var countryId = $(this).val();
//         alert(countryId);



//         if (countryId) {
//             $.ajax({
//                 url: '/get-states/' + countryId,
//                 type: 'POST',
//                 dataType: 'json',
//                 success: function(states) {
//                     $('#state-dropdown').empty().append('<option value="">Select State</option>');
//                     $('#city-dropdown').empty().append('<option value="">Select City</option>').prop('disabled', true);

//                     $.each(states, function(key, state) {
//                         $('#state-dropdown').append('<option value="' + state.id + '">' + state.name + '</option>');
//                     });

//                     $('#state-dropdown').prop('disabled', false); // Enable the state dropdown
//                 },
//                 error: function(xhr) {
//                     console.error('Error fetching states:', xhr.responseText);
//                 }
//             });
//         } else {
//             $('#state-dropdown').empty().append('<option value="">Select State</option>').prop('disabled', true);
//             $('#city-dropdown').empty().append('<option value="">Select City</option>').prop('disabled', true);
//         }
//     });

//     // Fetch cities when a state is selected
//     $('#state-dropdown').on('change', function() {
//         var stateId = $(this).val();

//         if (stateId) {
//             $.ajax({
//                 url: '/get-cities/' + stateId,
//                 type: 'GET',
//                 dataType: 'json',
//                 success: function(cities) {
//                     $('#city-dropdown').empty().append('<option value="">Select City</option>');

//                     $.each(cities, function(key, city) {
//                         $('#city-dropdown').append('<option value="' + city.id + '">' + city.name + '</option>');
//                     });

//                     $('#city-dropdown').prop('disabled', false); // Enable the city dropdown
//                 },
//                 error: function(xhr) {
//                     console.error('Error fetching cities:', xhr.responseText);
//                 }
//             });
//         } else {
//             $('#city-dropdown').empty().append('<option value="">Select City</option>').prop('disabled', true);
//         }
//     });
// });



$(document).ready(function () {
    // YouTube Video Preview
    $('#video_link').on('input', function () {
        const url = $(this).val();
        const videoId = getYouTubeVideoId(url);
        if (videoId) {
            $('#youtubePreview').attr('src', 'https://www.youtube.com/embed/' + videoId).show();
        } else {
            $('#youtubePreview').hide();
        }
    });

    function getYouTubeVideoId(url) {
        const regExp = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|embed)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        const match = url.match(regExp);
        return match ? match[1] : false;
    }
});
</script>



@endsection
