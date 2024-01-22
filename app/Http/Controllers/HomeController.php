<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $data = [
            'title' => 'Admin Page',
            'gallery' => Gallery::all(),
        ];

        return view('admin.admin', $data);
    }

    public function operator()
    {
        $data = [
            'title' => 'Operator Page'
        ];

        return view('operator', $data);
    }
}
