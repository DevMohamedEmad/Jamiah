<?php

namespace App\Http\Controllers;

use App\Models\meeting;
use App\Models\meeting_company;
use App\Models\vote;
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
        $meeting =meeting::latest()->first();
         $votes = meeting_company::where('attendance','معتزر')->orwhere('attendance','حاضر')->paginate(100);
        return view('dashboard.index',compact('votes' , 'meeting'));
    }
}
