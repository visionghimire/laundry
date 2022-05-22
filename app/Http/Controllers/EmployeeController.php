<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Date;
use Mail;




class EmployeeController extends Controller {

    public function index() {
        $items=DB::table('employee')->get();

      return view('employee.employee')->with('employee',$items);

    }

     public function creates(Request $request) {
       
        $model = new Employee();
        $pass=$request->input("password");
         
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->save();
       

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved"]);
        } else {
            return response()->json($model->errors, 500);
            return json_encode(['status'=>0,'title'=>"error",'text'=>"Error to save data"]);
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
            return $items = DB::table('employee')
            ->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('employee')
                    ->where('id', 'LIKE', "%$search%")
                    ->orwhere('name', 'LIKE', "%$search%")
                    ->paginate($entry, ['*'], 'page', $page);
            return $items;
        }
    }

    public function edits($id) {
        $model = Employee::find($id);
        return response()->json($model);
    }

    public function updates(Request $request, $id) {
        $pass=$request->input("password");
        $model = Employee::find($id);
        if ($model->validate($request->all())) {
            $model->fill($request->all());
          $hpass=Hash::make($pass);
           $model->password=$hpass;
            $model->save();

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Updated"]);
        } else {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Error to update data"]);
        }
    }

     public function deletes($id) {
        $model = Employee::find($id);
        try {
            $model->delete();
            return json_encode(['status' => 1, 'title' => "success", 'text' => "Data Successfully Deleted"]);
        } catch (\Exception $e) {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Unable to Delete Parent row"]);
        }
    }

    public function report(){
        $emp=DB::table("employee")->get();

    return view("employee.report")->with("emp",$emp);
 }

 public function getreport(Request $request){
    $fd=$request->input("fd");
      $td=$request->input("td");
      $emp=$request->input("emp");
      if($fd!=null && $td!=null){
        if($emp=="all"){
            $item=DB::table("clock")->select('clock.*','employee.name','employee.address')
         ->join('employee','employee.id','=','clock.emp_id')
         ->where('clock.timestmp','LIKE',"$fd%") 
          ->orwhere('clock.timestmp','LIKE',"$td%") 
      // ->whereBetween('clock.timestmp', [$fd, $td]) 
      ->get();
        }else{
$item=DB::table("clock")->select('clock.*','employee.name','employee.address')
         ->join('employee','employee.id','=','clock.emp_id')
         ->where('clock.emp_id','=',$emp)
         ->where('clock.timestmp','LIKE',"$fd%") 
          ->orwhere('clock.timestmp','LIKE',"$td%") 
      // ->whereBetween('clock.timestmp', [$fd, $td]) 
      ->get();        }
         
      }else if($fd!=null && $td==null){
        if($emp=="all"){
         $item=$item=DB::table("clock")->select('clock.*','employee.name','employee.address')
         ->join('employee','employee.id','=','clock.emp_id')
      ->where('clock.timestmp','LIKE',"$fd%") 
      ->get();
        }else{
         $item=$item=DB::table("clock")->select('clock.*','employee.name','employee.address')

         ->join('employee','employee.id','=','clock.emp_id')
         ->where("clock.emp_id","=",$emp)
      ->where('clock.timestmp','LIKE',"$fd%") 
      ->get();
        }

      }
      else{
        if($emp=="all"){
            $item=$item=DB::table("clock")->select('clock.*','employee.name','employee.address')
         ->join('employee','employee.id','=','clock.emp_id')
      ->get();
        }else{
            $item=$item=DB::table("clock")->select('clock.*','employee.name','employee.address')
         ->join('employee','employee.id','=','clock.emp_id')
         ->where("clock.emp_id","=",$emp)
      ->get();
        }
         
      }

      // dd($item);

       return view('employee.reportlist')->with('item',$item);
 }

}