<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\users;
use App\Models\messages_es;
use Illuminate\Support\Facades\DB;




class MessengerController extends Controller
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
        $userId = auth()->user()->id;

        $users = DB::table('users')
        ->get();

        $messages1 = DB::table('messages_es')
        ->select(
            'sender AS sender',
            'receiver AS receiver',
            DB::raw('count(id) as countMas')
        )
        ->where('status', 0)
        ->where('sender', $userId)
        ->groupBy('sender', 'receiver')
        ->get();


        $messages2 = DB::table('messages_es')
        ->select(
            'sender AS sender',
            'receiver AS receiver',
            DB::raw('count(id) as countMas')
        )
        ->where('status', 0)
        ->where('receiver', $userId)
        ->groupBy('sender', 'receiver')
        ->get();


        return view('Messenger.index')
        ->with('userId', $userId)
        ->with('messages1', $messages1)
        ->with('messages2', $messages2)
        ->with('users', $users);

    }

    public function showMessages()
{
    $receiver = auth()->user()->id;
    $sender = $_GET['sender'];
    $time = date('Y-m-d H:i:s');
    $date = date('Y-m-d');

    $messagesRead = messages_es::Where('sender', $sender)
    ->Where('receiver', $receiver)
    ->Where('status', 0)->get();

    foreach ($messagesRead as  $value) {
        $value->status = 1;
        $value->dateRead = $time;
        $value->save();

    }
    $p = new MessengerController;
    $p->messages_es($sender, $receiver);
}



public function SendMas()
{
    $sender = auth()->user()->id;
    $text = $_GET['text'];
    $receiver = $_GET['receiver'];
    $time = date('Y-m-d H:i:s');
    $date = date('Y-m-d');

    $messages_es = new  messages_es;
    $messages_es->sender = $sender;
    $messages_es->receiver = $receiver;
    $messages_es->message = $text;
    $messages_es->date0 = $time;
    $messages_es->save();

    $p = new MessengerController;
    $p->messages_es($receiver, $sender);

}

public function count()
{

$id = $_GET['id'];
$messages = "";

$messages_es = DB::table('messages_es')
->leftjoin('users', 'messages_es.sender', '=', 'users.id')
->select('messages_es.*','users.id as idEmp','users.name as name')
->where('messages_es.receiver', $id)
->where('messages_es.status', 0)
->orderBy("id",'DESC')
->get();

foreach ($messages_es as  $value) {

  $messages = $messages . '
  <li>
  <a href="/Messenger">
  <span class="details"> ' . $value->name . ' </span><br>
  <span class="details font-blue"> ' . $value->message . ' </span>

  </a>
  </li>
';
}


$messages_count = DB::table('messages_es')
->where('receiver', $id)
->where('status', 0)
->get();


 $messages1 = DB::table('messages_es')
 ->select(
     'sender AS sender',
     'receiver AS receiver',
     DB::raw('count(id) as countMas')
 )
 ->where('status', 0)
 ->where('receiver', $id)
 ->groupBy('sender', 'receiver')
 ->get();
 $messages_count = 0;
 foreach ($messages1 as  $value) {
    $messages_count +=  $value->countMas;
}


$data = array(
'messages' => $messages,
'messages_count' => $messages_count
);
echo json_encode($data);

}
public function updatemessage()
{
    $receiver = auth()->user()->id;
    $sender = $_GET['sender'];
    $time = date('Y-m-d H:i:s');
    $date = date('Y-m-d');


    $messagesRead = messages_es::Where('sender', $sender)
    ->Where('receiver', $receiver)
    ->Where('status', 0)->get();

    foreach ($messagesRead as  $value) {
        $value->status = 1;
        $value->dateRead = $time;
        $value->save();

    }

    $p = new MessengerController;
    $p->messages_es($sender, $receiver);



}

public function messages_es($sender, $receiver)
{

  $messages_es = DB::table('messages_es')

  ->leftJoin('users', 'messages_es.sender', '=', 'users.id')
  ->select('users.name as senderName', 'messages_es.*' )

  ->orderBy('messages_es.id', 'DESC')

  ->Where('messages_es.sender', $sender)
  ->Where('messages_es.receiver', $receiver)

  ->orWhere('messages_es.sender', $receiver)
  ->Where('messages_es.receiver', $sender)

   ->get();

   $data01 = '';

foreach ($messages_es as  $value) {
 if ($value->sender != $receiver) {
   $data01 = $data01 . '<div class="todo-tasklist-item">
   <img class="todo-userpic pull-left" src="uploads/user.png" width="27px" height="27px">
   <div class="todo-tasklist-item-title"> '. $value->senderName . ' </div>
   <div class="todo-tasklist-item-text font-black; bold" style="padding-right: 20px;"> '. $value->message .' </div>
   <div class="todo-tasklist-item-text">
   <span class="todo-tasklist-item-text font-blue" style="font-size:13px;padding-right: 20px;">
   <i class="fa fa-send"></i> '. $value->date0 .' </span>';

   if (!is_null($value->dateRead)) {
    $data01 = $data01 .'
    <span class="todo-tasklist-item-text font-green" style="font-size:13px;">
    <i class="fa fa-check"></i> '. $value->dateRead .'  </span>
    ';                  }


$data01 = $data01 .' </div></div>';

     }
     else{

       $data01 = $data01 .
       '<div class="todo-tasklist-item">
                 <img class="todo-userpic pull-right" src="uploads/user.png" width="27px" height="27px">
                 <div class="todo-tasklist-item-title "  style="text-align: left; padding-left: 50px;">  '. $value->senderName  .'</div>
                 <div class="todo-tasklist-item-text font-black; bold"  style="text-align: left;padding-left: 20px; "> '. $value->message .' </div>
                 <div class="todo-tasklist-item-text pull-right">
                 <span class="todo-tasklist-item-text pull-right font-blue" style="text-align: left;font-size:13px;padding-right: 5px;">
                  '. $value->date0 .' <i class="fa fa-send"></i></span>';

                  if (!is_null($value->dateRead)) {
                    $data01 = $data01 .'
                    <span class="todo-tasklist-item-text pull-right font-green" style="text-align: left;font-size:13px;">
                     '. $value->dateRead .' <i class="fa fa-check"></i> </span>
                    ';                  }


             $data01 = $data01 .' </div></div>';
     }

}

$data01 = $data01 . '';

echo json_encode($data01);

}

public function updatemessage2()
{
    $receiver = auth()->user()->id;

    $messagesRead = messages_es::
    Where('receiver', $receiver)
    ->Where('status', 0)->get();


$datamsg = count($messagesRead);

echo json_encode($datamsg);

}
    public function store(Request $request)
    {
        $this->validate($request ,[

           ]);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $userId = auth()->user()->id;


    }

    public function update(Request $request, $id)
    {



    }


}
