<?php
namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        return view();
    }
    public function public()
    {
        return view('pages.careers');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:male,female',
            'has_vehicle' => 'required|boolean',
            'employment_type' => 'required|in:full_time,part_time',
            'can_work_in_canada' => 'required|boolean',
            'available_days' => 'required|array',
            'preferred_hours' => 'required|string',
            'weekend_availability' => 'required|boolean',
            'has_cleaning_experience' => 'required|boolean',
            'years_experience' => 'required|integer',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'additional_notes' => 'nullable|string'
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');
        $coverLetterPath = null;
        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('cover_letters', 'public');
        }

        $application = JobApplication::create([
            ...$validated,
            'resume_path' => $resumePath,
            'cover_letter_path' => $coverLetterPath
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

    public function showTrackingForm()
{
    return view('pages.career-tracking');
}

public function trackApplication(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email'
    ]);

    $applications = JobApplication::where('email', $validated['email'])
        ->latest()
        ->get()
        ->map(function ($application) {
            return [
                'id' => $application->id,
                'position' => $application->employment_type,
                'submitted_date' => $application->created_at->format('M d, Y'),
                'status' => $this->getStatusWithDescription($application->status),
                'last_updated' => $application->updated_at->format('M d, Y')
            ];
        });

    return view('pages.career-tracking', [
        'applications' => $applications,
        'email' => $validated['email']
    ]);
}

private function getStatusWithDescription($status)
{
    $statusDescriptions = [
        'pending' => [
            'label' => 'Under Review',
            'description' => 'Your application is currently being reviewed by our HR team.'
        ],
        'reviewed' => [
            'label' => 'Application Reviewed',
            'description' => 'Your application has been reviewed and is being considered.'
        ],
        'contacted' => [
            'label' => 'Interview Stage',
            'description' => 'We are interested in your profile and will contact you soon.'
        ],
        'rejected' => [
            'label' => 'Not Selected',
            'description' => 'We have decided to proceed with other candidates.'
        ]
    ];

    return $statusDescriptions[$status] ?? ['label' => ucfirst($status), 'description' => ''];
}

}
