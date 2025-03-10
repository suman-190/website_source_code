<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function homepage()
    {
        $courses = Category::where('status','active')->where('is_parent',0)->limit(12)->latest()->get();
        $banners = Carousel::get();

        // B.E Coaching Classes
        $becoachingclassesIds = Category::where('status', 'active')
        ->whereIn('slag', ['ioe', 'pokhara-university', 'purwanchal-university', 'others'])
        ->limit(12)
        ->get();

        $becoachingclasses = Category::where('status', 'active')
        ->whereIn('parent_id', $becoachingclassesIds->pluck('id'))
        ->limit(4)
        ->get();

        // NEC License Preparation Classes
        $necLicenseIds = Category::where('status', 'active')
        ->whereIn('slag', [
            'civil-engineering-acie',
            'mechanical-engineering-amee',
            'electrical-engineering-aeie',
            'electrical-and-electronics-engineering-aeee',
            'computer-engineering-acte',
            'electronics-and-communication-engineering-aexe',
            'electronics-communication-and-information-engineeringaeie',
            'information-technology-engineering-aite'
        ])
        ->limit(12)
        ->get();

        $necLicense = Category::where('status', 'active')
        ->whereIn('parent_id', $necLicenseIds->pluck('id'))
        ->limit(14)
        ->get();

        // Trainings
        $trainingsIds = Category::where('status', 'active')
        ->whereIn('slag', ['it-trainings', 'engineering-trainings', 'professional-trainings'])
        ->limit(12)
        ->get();

        $trainings = Category::where('status', 'active')
        ->whereIn('parent_id', $trainingsIds->pluck('id'))
        ->limit(4)
        ->get();

        // MSc Entrance Preparation
        $mscEntranceIds = Category::where('status', 'active')
        ->whereIn('slag', ['about-msc-entrance-preparation', 'syllabus', 'class-offered'])
        ->limit(12)
        ->get();

        $mscEntrance = Category::where('status', 'active')
        ->whereIn('parent_id', $mscEntranceIds->pluck('id'))
        ->limit(4)
        ->get();

        return view('frontend.index', compact('courses','banners', 'becoachingclasses', 'necLicense', 'trainings', 'mscEntrance'));
    }

    public function courseDetail($slug)
    {
        $course = Category::where('slag', $slug)->first();
        if (!$course) {
            abort(404);
        }
        return view('frontend.pages.course-detail', compact('course'));
    }

    public function courseList($slug)
    {
        $cat = Category::where('slag', $slug)->first();
        if (!$cat) {
            abort(404);
        }
        $courses = $cat->sub_category()->where('status', 'active')->get();
        return view('frontend.pages.course-list', compact('courses', 'cat'));
    }
        public function courseSearch(Request $request)
        {
            $keyword = $request->search;
            $courses = Category::where('name', 'like', '%' . $keyword . '%')
                ->where('is_parent','0')
                ->where('status', 'active')
                ->get();
            return view('frontend.pages.course-search', compact('courses', 'keyword'));
        }

    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }
    public function welcomeMessage()
    {
        return view('frontend.pages.welcome-message');
    }
    public function missionVission()
    {
        return view('frontend.pages.mission-vision');
    }
    public function ourTeam()
    {
        return view('frontend.pages.our-team');
    }
    public function ourFacilities(){
        return view('frontend.pages.our-facilities');
    }
    public function sendEnquiry()
    {
        return view('frontend.pages.send-enquiry');
    }

    public function gallery()
    {
        return view('frontend.pages.gallery');
    }

    public function testimonial()
    {
        return view('frontend.pages.testimonial');
    }

    public function testimonialDetail()
    {
        return view('frontend.pages.testimonial-detail');
    }

    public function upcomingClasses()
    {
        return view('frontend.pages.classes');
    }
    public function blogs()
    {
        return view('frontend.pages.blog');
    }
    public function blogsDetail()
    {
        return view('frontend.pages.blog-detail');
    }
    public function career()
    {
        return view('frontend.pages.career');
    }
    public function onlineAdmission()
    {
        return view('frontend.pages.online-admission');
    }
    public function profile(){
        return view('auth.profile');
    }
    public function updateProfile(Request $request){
        $user = Auth::user();

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|string|min:6',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update name
        $user->name = $validatedData['name'];

        // Handle image upload using your logic
        if ($request->hasFile('image')) {
            $img_file = $request->file('image');
            $img_name = 'image' . Str::lower(Str::random(9)) . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/users/';
            $img_file->move($img_path, $img_name);  // Save image to the server
            $user->image = $img_path . $img_name;  // Save image path to the database
        }

        // Handle password change if provided
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $user->password = Hash::make($request->new_password); // Update password
        }

        // Save the updated user profile
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}