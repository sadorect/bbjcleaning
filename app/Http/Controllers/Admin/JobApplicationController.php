<?php
namespace App\Http\Controllers\Admin;


use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Mail\ApplicationStatusUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::latest()->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    public function show(JobApplication $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,contacted,rejected',
            'email_message' => 'required_if:send_email,1'
        ]);

        $application->update(['status' => $validated['status']]);

        if ($request->has('send_email') && $request->send_email) {
            Mail::to($application->email)->send(
                new ApplicationStatusUpdate($application, $validated['email_message'])
            );
        }

        return redirect()->back()->with('success', 'Application status updated successfully');
    }
}
