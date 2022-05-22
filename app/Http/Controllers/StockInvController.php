<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockInv;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Date;
use Mail;




class StockInvController extends Controller {

    public function index() {
        $items=DB::table('stock_list')->get();

      return view('stock.stock')->with('stock',$items);

    }

     public function creates(Request $request) {
       $in=$request->input("in_qty");

       $used=$request->input("used_qty")||0;
       $stid=$request->input("supply_id");
       $pp=DB::table("stock_list")->where('id','=',$stid)->first();
       
       $rem=$in-$used;
        $model = new Stock();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->price=$in*$pp->price;
            $model->remaining_qty=$rem;
            $model->save();
       

            return json_encode(['status' => 1, 'title' => "Success", 'text' => "Data Successfully Saved"]);
        } else {
            // return response()->json($model->errors, 500);
            return json_encode(['status'=>0,'title'=>"error",'text'=>"Please enter quantity in numeric"]);
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
            return $items = DB::table('stockinv')->select('stockinv.id','stockinv.in_qty','stockinv.price','stockinv.used_qty','stock_list.name')
            ->Join('stock_list','stock_list.id','=','stockinv.supply_id')
            ->paginate($entry, ['*'], 'page', $page);
            // $table=$this->getData($modeltries);
        } else {

            $items = DB::table('stockinv')->select('stockinv.id','stockinv.in_qty','stockinv.price','stockinv.used_qty','stock_list.name')
            ->join('stock_list','stock_list.id','stockinv.supply_id')
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
       $stid=$request->input("supply_id");
       $pp=DB::table("stock_list")->where('id','=',$stid)->first();
       // dd($used);
       $rem=$in-$used;
        $model = Stock::find($id);
        if ($model->validate($request->all())) {
            $model->fill($request->all());
            $model->remaining_qty=$rem;
             $model->price=$in*$pp->price;
            $model->date_created=date("y-m-d");
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