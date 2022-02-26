<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Log;
use App\Booking;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Mail;
class BookingController extends Controller
{


 public function index(Request $request){
    return view('booking.index');
 }

 public function dashboard(Request $request){
    $type=DB::table('laundry_categories')->get();
    $slot=DB::table("time_slot")->get();
    return view('dashboard.index')->with('type',$type)->with("slot",$slot);
 }

 public function report(){
    return view("booking.report");
 }

 public function getreport(Request $request){
    $fd=$request->input("fd");
      $td=$request->input("td");
      if($fd!=null && $td!=null){
         $item=DB::table("booking")
      ->whereBetween('booking.created_at', [$fd, $td]) 
      ->get();
      }else{
         $item=DB::table("booking")
      // ->whereBetween('inventory.created_at', [$fd, $td]) 
      ->get();
      }

       return view('booking.reportlist')->with('item',$item);
 }

  public function creates(Request $request) {
        $b=DB::table('booking')->count();
        $t=time();
        $tcode=$t.$b;
       $type=$request->input('type');
       $unit=$request->input('unit');
       $ctype=DB::table('laundry_categories')->where('id','=',$type)->first();
        $model = new Booking();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->price=$ctype->price;
            $model->total=$ctype->price*$unit;
            $model->trackingcode=$tcode;
            $model->save();
       

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved",'tcode'=>$tcode]);
        } else {
            return response()->json($model->errors, 500);
            // return json_encode(['status'=>0,'title'=>"error",'text'=>"Error to save data"]);
        }
    }
    public function lists(Request $request) {

        $entry = $request->input("entry");
        $search = $request->input("search", null);
        $page = $request->input("page", null);
        // return [$pgno,$srch];
        if ($page == null) {
            $page = 1;
        }
        if ($search == null) {
            return $items = DB::table('booking')->orderby('id','desc')->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('booking')
                    ->where('id', 'LIKE', "%$search%")
                    ->orwhere('fullname', 'LIKE', "%$search%")
                    ->paginate($entry, ['*'], 'page', $page);
            return $items;
        }
    }

    public function trackorder(Request $request){
        $tcode=$request->input('tcode');
        $order=DB::table('booking')->where('trackingcode','=',$tcode)->get();
        return $order;
    }

    public function changeStatus(Request $request){
        $status=$request->input('status');
        $id=$request->input('id');
        $model=Booking::find($id);
        $model->status=$status;
        $s=$model->save();
        if($s){
             return json_encode(['status' => 1, 'title' => "Success", 'text' => "Status Successfully changed"]);
        }else{
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Failed to change status"]);
        }
    }
}