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
        $areasCollection = auth()->user()->areas;
        $areaId = [];
        foreach ($areasCollection as $c) {
            $areaId[] = $c->id;
        };
        if ($areaId == null) {
            $consumers = Consumer::paginate(10);
            return view('front.consumer.index', compact('consumers'));
        }
        $consumers = Consumer::whereIn('area_id', $areaId)->paginate(10);
        return view('front.consumer.index', compact('consumers'));
    }
}
