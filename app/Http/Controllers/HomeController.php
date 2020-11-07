<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Advertisement;

class HomeController extends Controller
{
    public function init()
    {
        $users = User::all();
        return Inertia::render('Layouts/AppLayout',[
            'users' => $users
        ]);
    }
    public function index()
    {
        $advertisements = Advertisement::with('user')->where('is_available', true)->get();
        return view('welcome')->with([
            'advertisements' => $advertisements
        ]);
    }
}
