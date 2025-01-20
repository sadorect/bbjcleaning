<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusUpdate;
use Illuminate\Support\Facades\Storage;

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

    public function previewDocument(JobApplication $application, $type)
    {
        $path = $type === 'resume' ? $application->resume_path : $application->cover_letter_path;
        
        if (!$path) {
            abort(404);
        }
    
        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);
    
        return response($file)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'inline');
    }
    
  }
