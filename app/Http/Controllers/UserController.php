<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        //
        // $user=User::latest()->paginate(5);
        // return view('userindex',compact('user'))->with('i',(request()->input('page,1')-1)*5);
        return view('userindex',compact('users'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'isadmin'=>'required',
            'rollno'=>'required',
            'mobile'=>'required',
            'points'=>'required',
            'password'=>'required',
        ]);
        $user=new User([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=> Hash::make( $request->get('password'),[    'rounds' => 10]),
            'rollno'=>$request->get('rollno'),
            'points'=>$request->get('points'),
            'mobileno'=>$request->get('mobile'),
            'is_admin'=>$request->get('isadmin')


        ]);
        //use
        $user->save();  
        return redirect('/users')->with('success', 'user created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        // return view('usershow',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $users=User::all();

        $users= User::find($id);  
        return view('useredit', compact('users'));  
        // return view('useredit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'isadmin'=>'required',
            'rollno'=>'required',
            'mobile'=>'required',
            'points'=>'required',
        ]);

        $user=User::findOrFail($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->is_admin=$request->get('isadmin');
        $user->rollno=$request->get('rollno');
        $user->mobileno=$request->get('mobile');
        $user->points=$request->get('points');
        $user->save();






        return redirect('/users')->with('success', 'user updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'user Deleted');

    }
}
