
@extends('dashboard.main')
@section('content')


@include('layout.student-sidebar')



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
						<!-- Form -->
						<form class="row g-4" action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Profile Picture -->
                            <div class="col-12 text-center mb-4">
                                <label class="form-label d-block">Profile Picture</label>
                                <div class="d-flex justify-content-center align-items-center">
                                    <label class="position-relative me-4" for="uploadfile-1" title="Change Profile Picture">
                                        <span class="avatar avatar-xl">
                                            <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow"
                                                 src="{{ $student->profile_image ? asset('storage/' . $student->profile_image) : asset('assets/images/avatar/default.jpg') }}"
                                                 alt="Profile Image" width="150" height="150">
                                        </span>
                                    </label>
                                    <label class="btn btn-primary-soft" for="uploadfile-1">Change</label>
                                    <input id="uploadfile-1" class="form-control d-none" type="file" name="profile_image" accept="image/*">
                                </div>
                                <small class="text-muted">Click on the image to upload a new one.</small>
                            </div>

                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}" placeholder="Full name">
                                </div>
                            </div>
                              <!-- Email -->
                              <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $student->email) }}" placeholder="Email">
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ old('dob', $student->dob) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <small class="text-muted">Select your gender.</small>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $student->phone_number) }}" placeholder="Phone number">
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" value="{{ old('location', $student->location ?? 'Nigeria') }}" placeholder="Location">
                            </div>

                            <!-- About Me -->
                            <div class="col-12">
                                <label class="form-label">About Me</label>
                                <textarea class="form-control" name="bio" rows="3" placeholder="Write a brief description about yourself...">{{ old('bio', $student->bio) }}</textarea>
                                <small class="text-muted">A brief description of your profile.</small>
                            </div>







                            <!-- Video Source -->




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
        document.getElementById('uploadfile-1').addEventListener('change', function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('uploadfile-1-preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});
</script>


@endsection
