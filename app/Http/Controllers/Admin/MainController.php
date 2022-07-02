<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\User;



class MainController extends Controller
{
    public function index()
    {

        $usersCount = User::all()->count();
        $areasCount = Area::all()->count();

        return view('admin.index', compact('usersCount', 'areasCount'));
    }
}
