<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $user;
    public function index($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('role/mangeUserRole', compact('user', 'roles'));
    }
    public function manage(Request $request)
    {
        $this->validate($request, [
            'role' => 'required',
            'userId' => 'required'
        ]);
    
        $input = $request->all();
        $user = User::find($input['userId']);
        $user->roles()->detach();
        $user->assignRole($input['role']);
        return redirect("dashboard")->withSuccess('Role added successful');
    }
}
