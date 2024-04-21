<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showusers()
    {
        $role = User::where('id',Auth::id())->first()->role;
        $users=User::select('id','name','email','role')->get();
        return view('usersdisplay',compact('users','role'));
    }

    public function viewuser(request $request)
    {
        $role = User::where('id',Auth::id())->first()->role;
        $id=$request->id;
        $user=User::find($id);
        // dd($user);
        return view('userview', compact('user','role'));
    }

    public function displayedituser(request $request)
    {
        $role = User::where('id',Auth::id())->first()->role;
        $id=$request->id;
        $user=User::where('id',$id)->first();
        return view('useredit', compact('user','role'));
    }

    public function edituser(request $request)
    {
        $id=$request->id;
        $user = User::find($id);
        if($request->password==''){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect("/users");
    }
    public function deleteuser(request $request)
    {
        $id=$request->id;
        $user = User::find($id);
        $user->delete();

        return redirect("/users");
    }

    public function goadduser(){
        $role = User::where('id',Auth::id())->first()->role;
        return view('adduser')->with('role',$role);
    }

    public function adduser(request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/users');
    }
}
