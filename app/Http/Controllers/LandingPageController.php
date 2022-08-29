<?php

namespace App\Http\Controllers;

use App\Models\Landing\LandingAbout;
use App\Models\Landing\LandingCourse;
use App\Models\Landing\LandingHome;
use App\Models\Landing\LandingMentor;
use App\Models\Landing\LandingPrice;
use App\Models\Landing\LandingVacancy;
use App\Models\LandingSection;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\View\View;

/**
 * Controller to fetch data from db
 *
 * @returns View
 */

class LandingPageController extends Controller
{
    public function index():View
    {
        $content = LandingHome::first();
        $aboutContent = LandingAbout::first();
        $courses = LandingCourse::all();
        $mentors = LandingMentor::all();
        $vacancies = LandingVacancy::all();
        return view('index', compact([
            'content',
            'aboutContent',
            'courses',
            'mentors',
            'vacancies'
        ]));
    }
    
    public function vacancies($id):View {

        $vacancy = LandingVacancy::findOrFail($id);

        return view('vacancies', compact('vacancy'));

    }

    public function apply(Request $request, $id)
    {
        $application = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:10'],
            'email' => ['required', 'email'],
            'resume' => ['required', 'mimes:pdf,docx,doc', 'max:2048'],
            'description' => ['max:5000']
        ]);

        $application['resume'] = $request->file('resume')->store('resume', 'public');
        
        JobApplication::create([
            'first_name' => $application['first_name'],
            'last_name' => $application['last_name'],
            'phone' => $application['phone'],
            'email' => $application['email'],
            'resume' => $application['resume'],
            'description' => $application['description'],
            'landing_vacancy_id' => $id
        ]);
        
        return redirect('/');
    }
}
