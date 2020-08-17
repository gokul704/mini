<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserRequest;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        return view('adminpages.changePassword');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        if (auth()->user()->is_admin == 1) {
            $request->session()->flash('status', 'Password Changed Successfully!');
            return redirect()->route('admin.home');
        }else{
            $request->session()->flash('status', 'Password Changed Successflly');
            return redirect()->route('home');
        }

    }
    }
