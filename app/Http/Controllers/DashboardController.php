<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(){
        //$this->middleware('permission:user-list', ['only' => ['index']]);
    }
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('Super Admin')){
            $data = User::orderBy('id','DESC')->paginate(10);
            return view('dashboard/index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
        }
        else{
            return view('dashboard/normalUserIndex');
        }
    }  
    public function affiliate(Request $request)
    {
        $user = User::find(Auth::id());
        if(Auth::user()->hasRole('Affiliations')){
            $link = request()->getSchemeAndHttpHost().'/registration?ref='.$user->code;
            return view('dashboard/affiliate', compact('link'));
        }
        else{
            return view('dashboard/normalUserAffiliate');
        }
    }  
}
