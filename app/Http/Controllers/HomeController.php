<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\followup_company_es;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Gaza");

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('home');
    }

public function Permissions()

{
  $permissions = new user_permissions_esController;
  return view('Permissions')
  ->with('navbar', $permissions->navbar("",""));
}


}
