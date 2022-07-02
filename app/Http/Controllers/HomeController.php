<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consumer;

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
        $consumers = Consumer::paginate(10);
        return view('front.consumer.index', compact('consumers'));
    }
}
