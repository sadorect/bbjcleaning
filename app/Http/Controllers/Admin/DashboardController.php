<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Contact;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {//dd('I am here');
        $stats = [
            'services' => Service::count(),
            //'contacts' => Contact::count(),
            'users' => User::count()
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
