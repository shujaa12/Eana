<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\notifications_es;
use Illuminate\Support\Facades\DB;
use Excel;
date_default_timezone_set("Asia/Gaza");

class notifications_esController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

      }


public function notifications()
{
  $id = $_GET['id'];

  $notifications = "";
  $notifications_count =0;

$notifications_es = notifications_es::
  where("userId", $id)
  ->where("status",0)
  ->orderBy("id",'DESC')
  ->get();
foreach ($notifications_es as  $value) {

  $notifications = $notifications . '
  <li>
  <a href="' . $value->href . '"  data-id= "' . $value->id. '" id="notificationsDone">
  <span class="details"> ' . $value->Title . ' </span><br>
  <span class="details font-blue"> ' . $value->notifications . ' </span>
  </a>
  </li>
';
}

$notifications_count += $notifications_es->count();

$data = array(
  'notifications' => $notifications,
  'notifications_count' => $notifications_count
);


echo json_encode($data);

}



public function notificationsDone()
{
  $id = $_GET['id'];

  $time = date('Y-m-d H:i:s');
  $notifications_es = notifications_es::find($id);
  $notifications_es->status = 1;
  $notifications_es->dateDone = $time;
  $notifications_es->save();

$data = 0;

echo json_encode($data);

}



public function notificationsDoneAll()
{
  $id = $_GET['id'];

  $time = date('Y-m-d H:i:s');

  $update_details = array(
    'status' => 1,
    'dateDone' => $time
);

DB::table('notifications_es')
  ->where('userId', $id)
  ->where('status', 0)
  ->update($update_details);

$data = 0;

echo json_encode($data);

}

}
