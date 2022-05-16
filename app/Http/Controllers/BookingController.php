<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Log;
use App\Booking;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use App\Mail\SendMailable;
use Mail;

use PDF;
class BookingController extends Controller
{


 public function index(Request $request){
    $type=DB::table('laundry_categories')->where("ltype","=",null)->get();
    return view('booking.index')->with('type',$type);
 }

 public function sendemail(){

    $this->payment_email("vision","ghimire","vision.ghimere96@gmail.com","123"); 
 }

 public function viewPayment($id){
    $customer=DB::table('booking')
    ->select('booking.*','laundry_categories.name as laundry')
    ->join('laundry_categories','laundry_categories.id','=','booking.type')
    ->where("booking.id","=",$id)->first();
   // $html = \Illuminate\Support\Facades\View::make('payment.receipt', ['customer' => $customer]);
   //     $html = $html->render();
   //      $mpdf = $this->getMpdfInstance();
   //      $mpdf->WriteHTML($html);
   //      return $mpdf->Output();

    return view("payment.receipt")
    ->with('customer',$customer);
 }

  public function getMpdfInstance() {
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path('fonts'),
            ]),
            'fontdata' => $fontData + [
        'nirmala' => [
            'R' => 'nirmala.ttf',
            'B' => 'nirmalab.ttf',
            'useOTL' => 0xFF,
        ],
                'kalimati'=>[
                    'R' => 'kalimati.ttf',
                ]
            ]
        ]);

        $mpdf->allow_charset_conversion = true;
        return $mpdf;
    }

  public function payment_email($code,$id,$email,$fullname) {
    $conf=substr($code,6,6);
      Mail::send('email.payment',['conf'=>$conf,'name'=>$fullname],function($m) use ($email){
      $m->to($email);
      $m->subject('Laundry OTP');
      });
     return true;
     
   }

   public function status_email($msg,$id,$email,$fullname,$tcode) {
    
      Mail::send('email.status',['msg'=>$msg,'name'=>$fullname,'tcode'=>$tcode],function($m) use ($email){
      $m->to($email);
      $m->subject('Laundry Status');
      });
     return true;
     
   }

   public function status_edit($msg,$id,$email,$fullname,$unit,$price) {
    
      Mail::send('email.edit',['msg'=>$msg,'name'=>$fullname,'unit'=>$unit,'price'=>$price],function($m) use ($email){
      $m->to($email);
      $m->subject('Laundry Status');
      });
     return true;
     
   }

   public function status_email_att($msg,$id,$email,$fullname,$tcode) {

    $customer=DB::table('booking')
    ->select('booking.*','laundry_categories.name as laundry')
    ->join('laundry_categories','laundry_categories.id','=','booking.type')
    ->where("booking.id","=",$id)->first();
    $html =  \Illuminate\Support\Facades\View::make('payment.receipt', ['customer' => $customer]);
         $html = $html->render();
        $mpdf = $this->getMpdfInstance();
        $mpdf->WriteHTML($html);
      Mail::send('email.status',['msg'=>$msg,'name'=>$fullname,'tcode'=>$tcode],function($m) use ($email,$mpdf){
      $m->to($email);
      $m->subject('Laundry Status');
     $m->attachData($mpdf->output('', 'S'), "invoice.pdf");
      });
     return true;
     
   }

 public function dash(){
    return view("main");
 }

 public function dashboard(Request $request){
    $type=DB::table('laundry_categories')->where("ltype","=",null)->get();
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
         $item=DB::table("booking")->select('booking.*','time_slot.slot')
            ->join('time_slot','time_slot.id','=','booking.timeslot')->where('booking.status','=',6)
      ->whereBetween('booking.created_at', [$fd, $td]) 
      ->get();
      }else if($fd!=null && $td==null){
         $item=DB::table("booking")->select('booking.*','time_slot.slot')
            ->join('time_slot','time_slot.id','=','booking.timeslot')->where('booking.status','=',6)
      ->where('booking.created_at','LIKE',"$fd%") 
      ->get();
      }
      else{
         $item=DB::table("booking")->select('booking.*','time_slot.slot')
            ->join('time_slot','time_slot.id','=','booking.timeslot')->where('booking.status','=',6)
      // ->whereBetween('inventory.created_at', [$fd, $td]) 
      ->get();
      }
    
       return view('booking.reportlist')->with('item',$item);
 }

 public function invalid(Request $request){
    $id=$request->input("id");
    $model=Booking::find($id);
        $model->status=9;
        $s=$model->save();
        return "successs";

 }

 public function updates($id,Request $request){
       $type=$request->input('type');
       $unit=$request->input('unit');
       $ctype=DB::table('laundry_categories')->where('id','=',$type)->first();
       $model = Booking::find($id);
       $model->price=$ctype->price;
       $model->total=$ctype->price*$unit;
       $model->unit=$unit;
       $model->type=$type;
       $s=$model->save();
       if($s){
        $msg="Your laundry status has been updated. ";
        $this->status_edit($msg,$model->id,$model->email,$model->fullname,$unit,$model->total);
         return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Updated"]);
       }else{
        return json_encode(['status' => 0, 'title' => "error", 'text' => "Error to update data"]);
       }
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
            $s=$model->save();
            if($s){
                $e=$this->payment_email($tcode,$model->id,$model->email,$model->fullname);
                $conf=substr($tcode,6,6);
            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved",'tcode'=>$tcode,'otp'=>1,'conf'=>$conf,"id"=>$model->id]);
            }
            
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
            return $items = DB::table('booking')->select('booking.*','time_slot.slot')
            ->join('time_slot','time_slot.id','=','booking.timeslot')->where('booking.status','!=',9)->orderby('id','desc')->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('booking')->select('booking.*','time_slot.slot')
            ->join('time_slot','time_slot.id','=','booking.timeslot')->where('booking.status','!=',9)
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
            if($model->status==1){
                $msg= "Your Order is Confirmed. ";
            }
            if($model->status==2){
                $msg= "Your Order is Canceled. Please Reorder Again ";
            }
            if($model->status==3){
                $msg= "On the way for Pickup ";
            }
            if($model->status==4){
                $msg= "Your laundry is Received. ";
            }
            if($model->status==5){
                $msg= "Your laundry is being washed. ";
            }
            if($model->status==6){
                $msg= "Your laundry has been sent to your Location.";
            }
            if($model->status==6){
                 $this->status_email_att($msg,$model->id,$model->email,$model->fullname,$model->trackingcode);
            }else{
                 $this->status_email($msg,$model->id,$model->email,$model->fullname,$model->trackingcode);
            }
           

             return json_encode(['status' => 1, 'title' => "Success", 'text' => "Status Successfully changed"]);
        }else{
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Failed to change status"]);
        }
    }
}