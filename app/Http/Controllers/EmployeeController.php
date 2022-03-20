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
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->save();
       

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
       
        $model = Employee::find($id);
        if ($model->validate($request->all())) {
            $model->fill($request->all());
          
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
}