<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Models\Accountcategories;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function goaccount(){
        $id=Auth::id();
        $role = User::where('id',Auth::id())->first()->role;
        $accountdatas=Accounts::where("user_id","=",$id)->get();
        $accountcategoriescount=Accountcategories::where("user_id","=",$id)->count();
        return view("displayaccounts",compact("accountdatas","accountcategoriescount","role"));
    }

    public function goaddaccount (){
        $userid=Auth::id();
        $accountcategoriesdatas=Accountcategories::where("user_id","=",$userid)->get();
        $role = User::where('id',Auth::id())->first()->role;
        // dd($accountcategoriesdatas);
        return view("addaccount",compact("accountcategoriesdatas","role","userid"));
    }

    public function addaccount(Request $request){
        $data=new Accounts();
        $data->description=$request->description;
        $data->date=$request->date;
        $data->accountcategory_id=$request->accountcategory_id;
        if($request->debitsubtotal==null){
            $data->debitsubtotal=0;
        }else{
            $data->debitsubtotal=$request->debitsubtotal;
        }
        if($request->creditsubtotal==null){
            $data->creditsubtotal=0;
        }else{
            $data->creditsubtotal=$request->creditsubtotal;
        }
        $data->user_id=$request->userid;
        $data->save();
        return redirect("/account");
    }

    public function goviewaccount(request $request){
        $role = User::where('id',Auth::id())->first()->role;
        $data=Accounts::where("id","=",$request->accountid)->first();
        return view("viewaccount",compact("data","role"));
    }

    public function goeditaccount(request $request){
        $userid=Auth::id();
        $role = User::where('id',Auth::id())->first()->role;
        $data=Accounts::where("id","=",$request->accountid)->first();
        $accountcategoriesdatas=Accountcategories::where("user_id","=",$userid)->get();
        return view("accountedit",compact("data","role","userid","accountcategoriesdatas"));
    }

    public function editaccount(request $request){
        $data=Accounts::find($request->id);
        if($request->debitsubtotal==null){
            $debitsubtotal=0;
        }else{
            $debitsubtotal=$request->debitsubtotal;
        }
        if($request->creditsubtotal==null){
            $creditsubtotal=0;
        }else{
            $creditsubtotal=$request->creditsubtotal;
        }
        $data->update([
            'description' => $request->description,
            'date' => $request->date,
            'accountcategory_id' => $request->accountcategory_id,
            'debitsubtotal' => $debitsubtotal,
            'creditsubtotal' =>$creditsubtotal
        ]);
        return redirect("/account");
    }
    public function deleteaccount(Request $request){
        $data=Accounts::find($request->accountid);
        $data->delete();
        return redirect("/account");
    }
}
