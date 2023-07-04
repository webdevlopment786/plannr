<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserControllers extends Controller
{

    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'status' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return redirect("user")->with('success','User Add Successfully');

    }

    public function edit(Request $request, $id)
    {
        $users = User::find($id);
        return view('pages.user.edit',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); 
        $user->status = $request->status;
        $user->update();
        return redirect("user")->with('success','User Update Successfully');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect("user")->with('success','User Delete Successfully');
        
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->delete();
        // return redirect("category")->with('success','User Delete Successfully');
        return response()->json(['success'=>"User Delete Successfully."]);
    }

}
