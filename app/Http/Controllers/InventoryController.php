<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Date;
use Mail;




class InventoryController extends Controller {

    public function index() {


      return view('inventory.index');

    }

     public function creates(Request $request) {
       
        $model = new Inventory();
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
            return $items = DB::table('stock_list')->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('stock_list')
                    ->where('id', 'LIKE', "%$search%")
                    ->orwhere('name', 'LIKE', "%$search%")
                    ->paginate($entry, ['*'], 'page', $page);
            return $items;
        }
    }

    public function edits($id) {
        $model = Inventory::find($id);
        return response()->json($model);
    }

    public function updates(Request $request, $id) {
        $model = Inventory::find($id);
        if ($model->validate($request->all())) {
            $model->fill($request->all());
            $model->save();

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Updated"]);
        } else {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Error to update data"]);
        }
    }

     public function deletes($id) {
        $model = Inventory::find($id);
        try {
            $model->delete();
            return json_encode(['status' => 1, 'title' => "success", 'text' => "Data Successfully Deleted"]);
        } catch (\Exception $e) {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Unable to Delete Parent row"]);
        }
    }
}