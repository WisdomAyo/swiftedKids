
@extends('dashboard.main')
@section('content')


@include('layout.sidebar')



<div class="col-xl-9">

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
				<!-- Edit profile START -->
				<div class="card bg-transparent border rounded-3">
					<!-- Card header -->
					<div class="card-header bg-transparent border-bottom">
						<h3 class="card-header-title mb-0">Edit Profile</h3>
					</div>
					<!-- Card body START -->

					<div class="card-body">
                        <span>Set up your professional presence by updating the recent versions of the information below that will be showcased on your profile.</span>
						<!-- Form -->
						<form class="row g-4" action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Profile Picture -->
                            <div class="col-12 text-center mb-4">
                                <label class="form-label d-block">Profile Picture</label>
                                <div class="d-flex justify-content-center align-items-center">
                                    <label class="position-relative me-4" for="uploadfile-1" title="Change Profile Picture">
                                        <span class="avatar avatar-xl">
                                            <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow"
                                                 src="{{ $teacher->profile_image ? asset('storage/' . $teacher->profile_image) : asset('assets/images/avatar/default.jpg') }}"
                                                 alt="Profile Image" width="150" height="150">
                                        </span>
                                    </label>
                                    <label class="btn btn-primary-soft" for="uploadfile-1">Upload</label>
                                    <input id="uploadfile-1" class="form-control d-none" type="file" name="profile_image" accept="image/*">
                                </div>
                                <small class="text-muted">(Image max size 4.00 MB and allowed ext png, jpg, jpeg, gif, bmp, Dimension (300 x 310)) </small>
                            </div>

                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $teacher->name) }}" placeholder="Full name">
                                </div>
                            </div>
                              <!-- Email -->
                              <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $teacher->email) }}" placeholder="Email">
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ old('dob', $teacher->dob) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <small class="text-muted">Select your gender.</small>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $teacher->phone_number) }}" placeholder="Phone number">
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" value="{{ old('location', $teacher->location ?? 'Nigeria') }}" placeholder="Location">
                            </div>

                            <!-- About Me -->
                            <div class="col-12">
                                <label class="form-label">About Me</label>
                                <textarea class="form-control" name="bio" rows="3" placeholder="Write a brief description about yourself...">{{ old('bio', $teacher->bio) }}</textarea>
                                <small class="text-muted">⚠️ About You & Teaching Style (Detailed, Not Less Than 2 Paragraphs)</small>
                            </div>

                            <!-- Education (Dynamic) -->
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

                            <!-- Specialties -->
                            <div class="col-12">
                                <label class="form-label">Specialties</label>
                                <select name="specialties[]" class="form-control js-example-basic-multiple" multiple="multiple">
                                    @foreach($teacher->specialties as $specialty)
                                        <option value="{{ $specialty->specialty }}" selected>{{ $specialty->specialty }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Skills -->
                            <div class="col-12">
                                <label class="form-label">Skills</label>
                                <input type="text" class="form-control mb-2" name="skills[]" id="skills" placeholder="Enter skills (comma separated)" value="{{ old('skills') ? implode(',', old('skills')) : implode(',', $teacher->skills->pluck('skill_name')->toArray()) }}" data-role="tagsinput" />
                            </div>

                            <!-- Video Source -->
                            <div class="col-12">
                                <label class="form-label">Profile Video Source</label>

                                <!-- Radio for YouTube Link -->
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
                                </div>

                                <!-- Video File Upload Input -->
                                <div id="fileInput" style="display: {{ old('videos[0][type]', $teacher->videos->first()->video_type ?? 'youtube') === 'uploaded' ? 'block' : 'none' }};">
                                    <label for="video_file">Upload Video File</label>
                                    <input type="file" class="form-control" name="videos[0][uploaded_video]" id="video_file" accept="video/*">
                                </div>
                            </div>

                            <!-- Social Media Profiles -->
                            <label class="form-label">Social Media Profiles</label>
                            <div class="row">
                                @foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $platform)
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fab fa-{{ $platform }} me-2"></i>{{ ucfirst($platform) }}
                                        </label>
                                        <input type="text" class="form-control" name="social_media[{{ $platform }}]" value="{{ old('social_media.'.$platform, $teacher->socialMediaHandles->where('platform', $platform)->first()->url ?? '') }}" placeholder="Enter {{ ucfirst($platform) }} URL">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Save Button -->
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Edit profile END -->


			<!-- Main content END -->
		</div><!-- Row END -->
	</div>
</section>


<script>





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
</script>

@endsection
