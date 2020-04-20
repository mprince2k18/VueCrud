<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function all_users()
    {
        $x = User::all();
        return response()->json($x);
    }

    public function new_user(Request $request)
    {
        User::insert([
          'name'  => $request->name,
          'email'  => $request->email,
          'password'  => Hash::make('12345678'),
        ]);
        return $request;
    }

    public function delete_post($id)
    {
        User::findOrfail($id)->delete();
    }

    public function edit_user($id)
    {
        $y = User::findOrfail($id);
        return response()->json($y);
    }

    public function update_user(Request $request)
    {
      User::findOrfail($request->id)->update([
        'name'   => $request->editname,
        'email'  => $request->editemail
      ]);

      return back();
    }
    // END
}
