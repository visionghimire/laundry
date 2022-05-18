<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Date;
use Mail;




class ExpensesController extends Controller {

    public function index() {
        $month=DB::table("months")->get();
      return view('expenses.index')->with("month",$month);

    }

     public function creates(Request $request) {
       
        $model = new Expenses();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->save();
       

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved"]);
        } else {
            // return response()->json($model->errors, 500);
             return json_encode(['status'=>0,'title'=>"error",'text'=>"Please enter numeric value for price"]);
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
            return $items = DB::table('expenses')->select('expenses.*','months.month as mnth')
            ->join("months","months.id","=","expenses.months")
            ->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('expenses')>select('expenses.*','months.month as mnth')
            ->join("months","months.id","=","expenses.months")
                    ->where('id', 'LIKE', "%$search%")
                    ->orwhere('name', 'LIKE', "%$search%")
                    ->paginate($entry, ['*'], 'page', $page);
            return $items;
        }
    }

    public function edits($id) {
        $model = Expenses::find($id);
        return response()->json($model);
    }

    public function updates(Request $request, $id) {
       
        $model = Expenses::find($id);
        if ($model->validate($request->all())) {
            $model->fill($request->all());
            $model->save();

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Updated"]);
        } else {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Error to update data"]);
        }
    }

     public function deletes($id) {
        $model = Expenses::find($id);
        try {
            $model->delete();
            return json_encode(['status' => 1, 'title' => "success", 'text' => "Data Successfully Deleted"]);
        } catch (\Exception $e) {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Unable to Delete Parent row"]);
        }
    }
}