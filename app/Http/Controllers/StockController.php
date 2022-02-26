<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Date;
use Mail;




class StockController extends Controller {

    public function index() {
        $items=DB::table('stock_list')->get();

      return view('stock.stock')->with('stock',$items);

    }

     public function creates(Request $request) {
       $in=$request->input("in_qty");
       $used=$request->input("used_qty")||0;
       $rem=$in-$used;
        $model = new Stock();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->remaining_qty=$rem;
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
            return $items = DB::table('inventory')->select('inventory.id','inventory.in_qty','inventory.price','inventory.used_qty','stock_list.name')
            ->Join('stock_list','stock_list.id','=','inventory.supply_id')
            ->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('inventory')->select('inventory.id','inventory.in_qty','inventory.price','inventory.used_qty','stock_list.name')
            ->join('stock_list','stock_list.id','inventory.supply_id')
                    ->where('id', 'LIKE', "%$search%")
                    ->orwhere('name', 'LIKE', "%$search%")
                    ->paginate($entry, ['*'], 'page', $page);
            return $items;
        }
    }

    public function edits($id) {
        $model = Stock::find($id);
        return response()->json($model);
    }

    public function updates(Request $request, $id) {
        $in=$request->input("in_qty");
       $used=$request->input("used_qty");
       // dd($used);
       $rem=$in-$used;
        $model = Stock::find($id);
        if ($model->validate($request->all())) {
            $model->fill($request->all());
            $model->remaining_qty=$rem;
            $model->save();

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Updated"]);
        } else {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Error to update data"]);
        }
    }

     public function deletes($id) {
        $model = Stock::find($id);
        try {
            $model->delete();
            return json_encode(['status' => 1, 'title' => "success", 'text' => "Data Successfully Deleted"]);
        } catch (\Exception $e) {
            return json_encode(['status' => 0, 'title' => "error", 'text' => "Unable to Delete Parent row"]);
        }
    }
}