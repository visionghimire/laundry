<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clock;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Date;
use Mail;




class ClockController extends Controller {

    public function index() {
        // $items=DB::table('Clock')->get();

      return view('employee.clock');
      // ->with('Clock',$items);

    }

     public function clockin(Request $request, $id) {
       
        $model=new Clock();
        $model->emp_id=$id;
        $model->type="in";
        $s=$model->save();
        if($s){
            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved"]);
        } else {
            return response()->json($model->errors, 500);
            // return json_encode(['status'=>0,'title'=>"error",'text'=>"Error to save data"]);
        }
    }

    public function clockout(Request $request, $id) {
       
        $model=new Clock();
        $model->emp_id=$id;
        $model->type="out";
        $s=$model->save();
        if($s){
            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved"]);
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
            
             $items = DB::table('employee')
            ->paginate($entry, ['*'], 'page', $page);
           foreach($items as $v){
            $v->in=$this->checkin($v->id);
             $v->out=$this->checkout($v->id);
           }
            return $items;
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('employee')
                    ->where('id', 'LIKE', "%$search%")
                    ->orwhere('name', 'LIKE', "%$search%")
                    ->paginate($entry, ['*'], 'page', $page);
            return $items;
        }
    }

    public function checkin($id){
       
         $items=DB::table("clock")->where("emp_id","=",$id)->where("type","=","in")->latest("timestmp")->first();
         if($items){
            if(date('Ymd') == date('Ymd', strtotime($items->timestmp))){
                 return $items->timestmp;
            }else{
                return "";
            }
           
         }else{
            return "";
         }
         
    }

    public function checkout($id){
       
         $items=DB::table("clock")->where("emp_id","=",$id)->where("type","=","out")->latest("timestmp")->first();
         if($items){
             if(date('Ymd') == date('Ymd', strtotime($items->timestmp))){
                 return $items->timestmp;
            }else{
                return "";
            }
         }else{
            return "";
         }
    }

    
}