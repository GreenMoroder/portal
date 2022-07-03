<?php

namespace App\Http\Controllers;

use App\Models\Area;
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
        $areas = auth()->user()->areas;
        $id = [];
        foreach ($areas as $area) {
            $id[] = ($area->id);
        }
        $areas = Area::find($id);
        return view('front.consumer.home', compact('areas'));
    }

    public function edit($consumer)
    {
        dd(
            $consumer
        );
    }
}
