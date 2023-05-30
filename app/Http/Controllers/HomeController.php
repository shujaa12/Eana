<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products_es;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_es = products_es::
        leftJoin('users', 'products_es.userId', '=', 'users.id')
        ->select('users.name as userName', 'products_es.*' )
        ->where('products_es.status',0 )
        ->get();
        

          return view('home')
          ->with('products_es', $products_es);

    }

}
