<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
//use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Specialty;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Models\Education;
use App\Models\SocialMediaHandle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class TeacherController extends Controller
{
    //


    public function verify()
{
    return view('dashboard.teacher.teacher_verify');
}

    public function dashboard(){


        $teacher = Auth::user();
        return view('dashboard.teacher.dashboard',  compact('teacher'));
    }
     // Method to fetch states for a country (AJAX)


     // Complete profile method (where you pass countries)


     // Show the teacher's profile
     public function show()
     {
         $teacher = Auth::user(); // Get the authenticated teacher
         return view('dashboard.teacher.profile', compact('teacher')); // Show the teacher profile view
     }



     public function getStates($country_id)
     {
         $states = State::where('country_id', $country_id)->get();
         return response()->json($states);
     }

     // Method to fetch cities for a state (AJAX)
     public function getCities($state_id)
     {
         $cities = City::where('state_id', $state_id)->get();
         return response()->json($cities);
     }


     public function showCompleteProfileForm()
     {
         $teacher = Auth::user();  // Get the logged-in teacher

                  // Check if the user is authenticated
          if (!Auth::check()) {
        return redirect()->route('login');  // Redirect to login if not authenticated
         }

         // If profile is already completed, redirect to the dashboard
         if ($teacher->profile_completed) {
             return redirect()->route('teacher.dashboard');
         }

         $countries = Country::all();  // Assuming you're using countries in the form

         return view('dashboard.teacher.profile-complete', compact('teacher', 'countries'));
     }






     public function storeProfile(ProfileUpdateRequest $request)
     {
         $teacher = Auth::user();

         // Use a database transaction to ensure all updates succeed or fail together
         DB::transaction(function () use ($request, $teacher) {
             // Handle profile image upload
             if ($request->hasFile('profile_image')) {
                 $this->handleProfileImageUpload($request, $teacher);
             }

             // Update teacher's general information
             $teacher->update($request->only([
                 'name', 'phone_number', 'gender', 'dob', 'bio'
             ]));

             // Update specialties, skills, education, videos, and social media handles
             $this->updateSpecialties($request, $teacher);
             $this->updateSkills($request, $teacher);
             $this->updateEducation($request, $teacher);
             $this->updateVideos($request, $teacher);
             $this->updateSocialMediaHandles($request, $teacher);

             // Mark the profile as completed
             $teacher->profile_completed = true;
             $teacher->save();
         });


         return redirect()->route('teacher.dashboard')->with('success', 'Profile completed successfully!');
     }



     public function edit()
     {
         $teacher = Auth::user(); // Get the authenticated teacher
         return view('dashboard.teacher.profile', compact('teacher')); // Show the teacher profile edit form
     }

     // Update the teacher's profile
     public function update(Request $request)
     {
         $teacher = Auth::user(); // Get the authenticated teacher

         // Validate the form data
         $this->validateRequest($request, $teacher->id);

         // Use DB transaction to ensure atomicity of the entire operation
         DB::transaction(function () use ($request, $teacher) {
             // Handle profile image upload
             $this->handleProfileImageUpload($request, $teacher);

             // Update general teacher profile information
             $teacher->update($request->only([
                 'name', 'email', 'phone_number', 'gender', 'dob', 'bio'
             ]));

             // Update specialties
             $this->updateSpecialties($request, $teacher);

             // Update skills (many-to-many)
             $this->updateSkills($request, $teacher);

             // Update education
             $this->updateEducation($request, $teacher);

             // Update videos (YouTube or uploaded)
             $this->updateVideos($request, $teacher);

             // Update social media profiles
             $this->updateSocialMediaHandles($request, $teacher);
         });

         return redirect()->back()->with('success', 'Profile updated successfully!');
     }

     // Validate the request data
     private function validateRequest(Request $request, $teacherId)
     {


         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $teacherId,
             'phone_number' => 'nullable|string|max:20',
             'gender' => 'nullable|in:male,female,other',
             'nin'=>'nullable|int|max:10',
             'dob' => 'nullable|date',
             'bio' => 'nullable|string|max:500',
             'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'skills' => 'nullable|array',
             'skills.*' => 'string|max:255',
             'specialties' => 'nullable|array',
             'specialties.*' => 'string|max:255',
             'education' => 'nullable|array',
             'education.*.degree' => 'required_with:education|string|max:255',
             'education.*.field_of_study' => 'required_with:education|string|max:255',
             'education.*.institution' => 'required_with:education|string|max:255',
             'education.*.graduation_year' => 'nullable|integer:4',
             'videos' => 'nullable|array',
             'videos.*.type' => 'required|string|in:youtube,uploaded',
             'videos.*.youtube_link' => 'nullable|required_if:videos.*.type,youtube|url',
             'videos.*.uploaded_video' => 'nullable|required_if:videos.*.type,uploaded|file|mimes:mp4|max:10240',
             'social_media' => 'nullable|array',
             'social_media.*' => 'nullable|url',

         ]);
     }

     // Handle profile image upload
     private function handleProfileImageUpload(Request $request, $teacher)
     {
         if ($request->hasFile('profile_image')) {
             // Delete old image if it exists
             if ($teacher->profile_image) {
                 Storage::disk('public')->delete($teacher->profile_image);
             }

             // Process the uploaded image
             $image = $request->file('profile_image');
             $imageName = 'profile_images/' . uniqid() . '.' . $image->getClientOriginalExtension(); // Unique file name

             // Resize the image to 310x310 pixels using Intervention Image
             $resizedImage = Image::make($image)->fit(300, 310)->stream();
            // $resizedImage = Image::configure(['driver' => 'imagick'])->make($image)->fit(300, 310)->stream();

             // Store the resized image in the public disk
             Storage::disk('public')->put($imageName, $resizedImage);

             // Update the teacher's profile_image path
             $teacher->profile_image = $imageName;
         }
        }

     // Update teacher specialties
     private function updateSpecialties(Request $request, $teacher)
     {
         $teacher->specialties()->delete(); // Remove old specialties
         foreach ($request->input('specialties', []) as $specialty) {
             $teacher->specialties()->create(['specialty' => $specialty]);
         }
     }

     // Update teacher skills (many-to-many)
     private function updateSkills(Request $request, $teacher)
     {
         $skills = $request->input('skills', []);
         $skillIds = [];

         foreach ($skills as $skillName) {
             $skill = Skill::firstOrCreate(['skill_name' => $skillName]); // Find or create skill
             $skillIds[] = $skill->id;
         }

         // Sync the skills with the teacher (many-to-many)
         $teacher->skills()->syncWithoutDetaching($skillIds);
         $teacher->skills()->sync($skillIds);
     }

     // Update teacher's education
     private function updateEducation(Request $request, $teacher)
     {
         $teacher->education()->delete(); // Remove old education records
         foreach ($request->input('education', []) as $edu) {
             $teacher->education()->create([
                 'degree' => $edu['degree'],
                 'field_of_study' => $edu['field_of_study'],
                 'institution' => $edu['institution'],
                 'graduation_year' => $edu['graduation_year'] ,
             ]);
         }
     }

     // Update teacher's videos (YouTube or uploaded)
     private function updateVideos(Request $request, $teacher)
     {
         // Validate the input for videos, both YouTube links and uploaded files
         $request->validate([
             'videos.*.type' => 'required|in:youtube,uploaded',
             'videos.*.youtube_link' => 'nullable|required_if:videos.*.type,youtube|url',
             'videos.*.uploaded_video' => 'nullable|required_if:videos.*.type,uploaded|file|mimes:mp4,avi,mkv|max:20480', // Max 20MB for videos
         ]);

         // Start a transaction to ensure data consistency
         \DB::beginTransaction();

         try {
             // Remove old videos if new ones are provided successfully
             $teacher->videos()->delete();

             foreach ($request->input('videos', []) as $index => $video) {
                 if ($video['type'] === 'youtube') {
                     $teacher->videos()->create([
                         'video_type' => 'youtube',
                         'youtube_link' => $video['youtube_link'],
                     ]);
                 } elseif ($video['type'] === 'uploaded' && $request->hasFile("videos.{$index}.uploaded_video")) {
                     // Store the uploaded video file
                     $uploadedPath = $request->file("videos.{$index}.uploaded_video")->store('teacher_videos', 'public');
                     $teacher->videos()->create([
                         'video_type' => 'uploaded',
                         'uploaded_video_path' => $uploadedPath,
                     ]);
                 }
             }

             // Commit the transaction after successful video creation
             \DB::commit();

             // Return success message
             return redirect()->back()->with('success', 'Videos updated successfully!');

         } catch (\Exception $e) {
             // Rollback the transaction in case of errors
             \DB::rollBack();

             // Log the error for debugging purposes
             \Log::error('Failed to update videos for teacher: ' . $e->getMessage());

             // Return an error message to the user
             return back()->withErrors(['message' => 'An error occurred while updating videos. Please try again.']);
         }
        }

     // Update social media handles
     private function updateSocialMediaHandles(Request $request, $teacher)
     {
         $teacher->socialMediaHandles()->delete(); // Remove old social media handles

         foreach ($request->input('social_media', []) as $platform => $url) {
             if (!empty($url)) {
                 $teacher->socialMediaHandles()->create([
                     'platform' => $platform,
                     'url' => $url,
                 ]);
             }
         }
     }
 }










