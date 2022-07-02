<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consumer;
use App\Models\User;

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

        $currentUser = auth()->user()->areas;
        foreach ($currentUser as $c) {
            $areaId = $c->id;
        };

        $consumers = Consumer::where('area_id', $areaId)->paginate();
        dd($consumers);

        return view('front.consumer.index', compact('consumers'));
    }
}
