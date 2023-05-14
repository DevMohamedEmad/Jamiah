<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return View("dashboard.admin.index",['users'=>User::paginate(5)]);
    }
    public function create(){
        return View('dashboard.admin.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required' ,
            'password'=>['required' , 'min:8'],
            'role'=>['required'],
            'email' =>['required','unique:App\Models\User,email']
        ]);

        if($request->role == 'Super-Admin' || $request->role == 'Admin'){
            $user = User::create([
                'name' =>$request->name,
                'email'=>$request->email,
                'role'=>$request->role,
                'password'=>Hash::make($request->password)
            ]);
        }
        if($user){
            return redirect()->route('users')->with(["success"=>'تم اضافة الموظف بنجاح ']);;
        }else{
            return redirect()->back()->withErrors(["error"=>'نأسف هناك خطأ']);
        }
    }

    public function edit(User $user){
        if(auth()->user()->role == 'Super-Admin'){
            $user->role = 'Super-Admin';
            $user->save();
            return redirect()->route('users')->with(["success"=>' تم ترقية الموظف بنجاح']);;
        }else{
            return redirect()->route('users')->withErrors(["error"=>'ليس لديك هذه الصلاحيات']);;
        }

    }
    public function destroy(User $user){
        if(auth()->user()->role == 'Super-Admin'){
            if($user->delete()){
                return redirect()->back()->with(["success"=>'تم حذف الموظف']);
            }else{
                return redirect()->back()->withErrors(["error"=>'حذف الموظف فشل']);
            }
        }else{
            return redirect()->back()->withErrors(["error"=>'ليس لديك هذه الصلاحية']);
        }

    }
}
