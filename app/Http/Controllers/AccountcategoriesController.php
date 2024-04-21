<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Accountcategories;
use Illuminate\Support\Facades\Auth;

class AccountcategoriesController extends Controller
{
    public function goaccountcategory(){
        $id=Auth::id();
        $role = User::where('id',Auth::id())->first()->role;
        $datas=Accountcategories::where("user_id","=",$id)->get();
        return view("displayaccountcategories",compact("datas","role"));
    }

    public function goaddaccountcategory(){
        $id=Auth::id();
        $role = User::where('id',Auth::id())->first()->role;
        return view("addaccountcategory",compact("id","role"));
    }

    public function addaccountcategory(request $request){
        $accountcategories = new Accountcategories();
        $accountcategories->name=$request->name;
        $accountcategories->user_id=$request->id;
        $accountcategories->save();
        return redirect("/account/category");
    }

    public function goeditaccountcategory(request $request){
        $role = User::where('id',Auth::id())->first()->role;
        $id=Auth::id();
        $accountCategoryid=$request->accountcategoryid;
        $data=Accountcategories::where("id","=",$accountCategoryid)
                                ->first();
        return view('accountcategoryedit', compact('data','role'));
    }

    public function editaccountcategory(request $request){
        $accountcategoryid=$request->accountcategoryid;
        $accountcategory = Accountcategories::find($accountcategoryid);
            $accountcategory->update([
                'name' => $request->name,
            ]);

        return redirect("/account/category");
    }

    public function viewaccountcategory(request $request){
        $role = User::where('id',Auth::id())->first()->role;
        $accountCategoryid=$request->accountcategoryid;
        $data=Accountcategories::where("id",$accountCategoryid)
                                ->first();
        return view('viewaccountcategory', compact('data','role'));
    }

    public function deleteaccountcategory(request $request){
        $data=Accountcategories::find($request->accountcategoryid);
        $data->delete();
        return redirect("/account/category");
    }
}
