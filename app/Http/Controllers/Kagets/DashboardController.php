<?php

namespace App\Http\Controllers\Kagets;

use App\Models\News;
use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Complaint $complaint)
    {
        return view('dashboard', [
            'news' => News::get(),
           'complaint' => $complaint->get(),
            'user' => User::get(),
            'comp_verif' => $complaint->where('status_complaint', 'verifikasi')->get()
        ]);
      
    }
}
