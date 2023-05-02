<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;


use Illuminate\Support\Facades\DB;
use Excel;
date_default_timezone_set("Asia/Gaza");

class usersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

      }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

           $users = DB::table('users')
           ->get();
    return view('users.index')
    ->with('users',$users);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
           return view('users.create');

      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        }

        public function showProfile()
        {
            $id = auth()->user()->id;
            $user = users::find($id);
             return view('Profile.index')
             ->with('user',$user);

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

      $users = users::find($id);
      $users->name = $request->input('name');
      $users->email = $request->input('email');
      $users->phone = $request->input('phone');
      $users->address = $request->input('address');
      $users->save();
      return back()->with('success', 'تم التعديل بنجاح');
    }


    public function newPassword($id)
    {
      $users = users::find($id);
      $users->password = bcrypt("123456");
      $users->save();
      return back()->with('success', 'كلمة المرور لهذا الحساب هي : 1234546');

    }





    public function resetPassword(Request $request)
    {

      if ($request->isMethod('GET')) {
        return view('auth.passwords.reset');

      }

      if ($request->isMethod('POST')) {


    $id = auth()->user()->id;
      $users = users::find($id);
      $pass1 = $request->input('password');
      $pass2 = $request->input('password_confirmation');
     if($pass1 == $pass2){
      $users->password = bcrypt($pass1);
      $users->save();
      return back()->with('success', 'تم تغيير كلمة المرور بنجاح');
    }
    else{
      return back()->with('error', 'يرجى تأكيد كلمة المرور');
    }
  }

    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        }







}
