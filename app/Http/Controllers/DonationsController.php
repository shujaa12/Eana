<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\products_es;
use App\Models\products_comment_es;
use App\Models\order_es;
use App\Models\notifications_es;



use Illuminate\Support\Facades\DB;





class DonationsController extends Controller
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

    public function index()
    {
        $products_es = products_es::
        leftJoin('users', 'products_es.userId', '=', 'users.id')
        ->select('users.name as userName', 'products_es.*' )
        ->where('userId', auth()->user()->id)
        ->get();
        return view('Donations.index')
        ->with('products_es', $products_es);
    }

    public function MyDonations()
    {
        $products_es = products_es::
        leftJoin('users', 'products_es.userId', '=', 'users.id')
        ->select('users.name as userName', 'products_es.*' )
        ->where('userId_order', auth()->user()->id)
        ->get();
        return view('Donations.MyDonations')
        ->with('products_es', $products_es);
    }



    public function store(Request $request)
    {
        $this->validate($request ,[
            'nameProduct'=>'required',
            'details'=>'required',
            'file'=>'required',
        ]);

   		$date = date('Y-m-d');
        $time = date('Y-m-d H:i:s');
        $id = $request->input('id');
        $nameProduct = $request->input('nameProduct');
        $details = $request->input('details');
        $note = $request->input('note');
        $file = $request->input('file');

        if ($id == 0) {
            $products_es = new products_es;
            $products_es->userId = auth()->user()->id;
            $products_es->date0 = $date;
        }
        else{
                $products_es = products_es::find($id);
            }

            if (empty($file)) {
                $time = date('Y-m-d H:i:s');
                $fileName =  strtotime($time) . '.'. $request->file->extension();
                $request->file->move(public_path('uploads'), $fileName);
                $products_es->img = $fileName;
            }


            $products_es->nameProduct = $nameProduct;
            $products_es->details = $details;
            $products_es->note = $note;
            $products_es->save();

        return back()->with('success', 'تم الحفظ بنجاح');

    }


    public function storeComment(Request $request)
    {
        $this->validate($request ,[
            'message'=>'required'
        ]);

   		$date = date('Y-m-d');
        $time = date('Y-m-d H:i:s');
        $id = $request->input('id');
        $message = $request->input('message');

            $comment_es = new products_comment_es;
            $comment_es->id_products = $id;
            $comment_es->details = $message;
            $comment_es->userId = auth()->user()->id;

            $comment_es->save();

        return back();

    }

    public function update(Request $request, $id)
    {

    }
    public function show($id)
    {
        $products_es = products_es::find($id);

        $comment_es = DB::table('products_comment_es')
        ->leftJoin('users', 'products_comment_es.userId', '=', 'users.id')
        ->select('users.name as userName', 'products_comment_es.*' )
        ->where('products_comment_es.id_products', $id)
        ->get();


        $order_es = DB::table('order_es')
        ->where('id_product', $id)
        ->where('userId', auth()->user()->id)
        ->first();

        return view('Donations.show')
        ->with('products_es', $products_es)
        ->with('order_es', $order_es)
        ->with('comment_es', $comment_es);
    }



    public function edit($id)
    {


    }




    public function destroy($id)
    {

    }

}
