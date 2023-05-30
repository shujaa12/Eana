<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\products_es;
use App\Models\products_comment_es;
use App\Models\order_es;
use App\Models\notifications_es;



use Illuminate\Support\Facades\DB;





class OrdersController extends Controller
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
        $products_es = order_es::
        leftJoin('products_es', 'order_es.id_product', '=', 'products_es.id')
        ->leftJoin('users', 'order_es.userId', '=', 'users.id')
        ->select(
            'products_es.nameProduct as nameProduct',
            'products_es.details as details',
            'users.name as userName',
         'order_es.*' )
         ->where('products_es.userId', auth()->user()->id)
         ->where('order_es.status', 0)
         ->get();

        return view('Orders.index')
        ->with('products_es', $products_es);
    }

    public function MyOrders()
    {
        $products_es = order_es::
        leftJoin('products_es', 'order_es.id_product', '=', 'products_es.id')
        ->select(
            'products_es.nameProduct as nameProduct',
            'products_es.details as details',
            'products_es.note as note',
         'order_es.*' )
        ->where('order_es.userId', auth()->user()->id)
        ->get();

        return view('Orders.MyOrders')
        ->with('products_es', $products_es);
    }



    public function store(Request $request)
    {
        $date = date('Y-m-d');
        $time = date('Y-m-d H:i:s');
        $id = $request->input('id');

            $order_es = new order_es;
            $order_es->id_product = $id;
            $order_es->dateTime = $time;
            $order_es->userId = auth()->user()->id;
            $order_es->save();

            $products_es = products_es::find($id);

            $notifications_es = new notifications_es;
            $notifications_es->userId = $products_es->userId;
            $notifications_es->Title = 'طلب جديد' . " - " . $date ;
            $notifications_es->notifications = $products_es->nameProduct . " (". auth()->user()->name .")";
            $notifications_es->href = "/Orders";
            $notifications_es->date0 = $time;
            $notifications_es->save();

        return back();
    }

    public function approval(Request $request)
    {
        $date = date('Y-m-d');
        $time = date('Y-m-d H:i:s');
        $id = $request->input('id');
        $order_es = order_es::find($id);

        $update = array('status' => 2);

        DB::table('order_es')->where('id_product',$order_es->id_product)->update($update);

            $order_es = order_es::find($id);
            $order_es->status = 1;
            $order_es->save();

            $products_es = products_es::find($order_es->id_product);
            $products_es->status = 1;
            $products_es->userId_order = $order_es->userId;
            $products_es->save();

            $notifications_es = new notifications_es;
            $notifications_es->userId = $order_es->userId;
            $notifications_es->Title = 'الموافقة على الطلب' . " - " . $date ;
            $notifications_es->notifications = $products_es->nameProduct;
            $notifications_es->href = "/MyOrders";
            $notifications_es->date0 = $time;
            $notifications_es->save();

        return back();
    }


    public function disapproval(Request $request)
    {
        $date = date('Y-m-d');
        $time = date('Y-m-d H:i:s');
        $id = $request->input('id');
        $order_es = order_es::find($id);


            $order_es = order_es::find($id);
            $order_es->status = 2;
            $order_es->save();

            $products_es = products_es::find($order_es->id_product);
            $products_es->status = 1;
            $products_es->userId_order = $order_es->userId;
            $products_es->save();

            $notifications_es = new notifications_es;
            $notifications_es->userId = $order_es->userId;
            $notifications_es->Title = 'رفض الطلب' . " - " . $date ;
            $notifications_es->notifications = $products_es->nameProduct;
            $notifications_es->href = "/MyOrders";
            $notifications_es->date0 = $time;
            $notifications_es->save();

        return back();
    }

    public function update(Request $request, $id)
    {

    }
    public function show($id)
    {

    }



    public function edit($id)
    {


    }




    public function destroy($id)
    {

    }

}
