<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','asc')->paginate(30);
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.index');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.create');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'username'  => ['required', 'string', 'max:255', 'unique:users'],
        //     'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // ]);

        $users            = new User;
        $users->name      = $request->name;
        $users->username  = $request->username;
        $users->email     = $request->email;
        $users->password  = Hash::make($request->password);
        $users->user_type = $request->user_type;
        $users->phone     = $request->phone;
        $users->gender    = $request->gender;
        $users->save();

        return redirect()->route('users.index')
            ->with(['message' => "($users->username) - Added successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);
        
        if(auth()->user()->user_type == "admin"){
            return view('dashboard.users.edit',compact('model'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/users');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users            = User::findOrFail($id);
        $users->name      = $request->name;
        $users->username  = $request->username;
        $users->email     = $request->email;
        $users->password  = Hash::make($request->password);
        if($request->confirm_password == ""){
            return redirect()->back()->with('confirm_password_empty','Please confirm your password!');
        }
        elseif($request->confirm_password != $request->password){
            return redirect()->back()->with('confirm_password_not_matching','Password did not match confirmation. Please try again!');
        }
        $users->user_type = $request->user_type;
        $users->phone     = $request->phone;
        $users->gender    = $request->gender;
        $users->save();

        return redirect()->route('users.index')
            ->with(['message' => "($users->username) - Edited successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')
            ->with(['message' => "($users->username) - Deleted successfully!"]);
    }

    public function delete()
    {
        $users = User::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.delete',compact('users'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        $users = User::findOrFail($id);
        return redirect()->route('users.delete')
            ->with(['message' => "($users->username) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        User::where('id', $id)->forceDelete();
        return redirect()->route('users.delete')
            ->with(['message' => 'Permanently deleted successfully!']);
    }
}
