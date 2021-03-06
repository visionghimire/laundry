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




class ReportController extends Controller {

    public function index() {
       
      $stock = DB::table("stock_list")->get();
      return view('stock.report')->with("stock", $stock);

    }

    public function getReport(Request $request){
      $fd=$request->input("fd");
      $td=$request->input("td");
      $stock=$request->input("stock");

      // dd($td);
      if($fd!=null && $td!=null){
        if($stock=="all"){
          $item=DB::table("inventory")->select('inventory.*','stock_list.name')
      ->join('stock_list','stock_list.id','=','inventory.supply_id')
      // ->whereBetween('inventory.date_created', [$fd, $td])
      ->where('inventory.date_created','>=',$fd)
      ->orwhere('inventory.date_created','<=',$td)
      ->get();
        }else{
          $item=DB::table("inventory")->select('inventory.*','stock_list.name')
      ->join('stock_list','stock_list.id','=','inventory.supply_id')
      ->where("inventory.supply_id","=",$stock)
      // ->whereBetween('inventory.date_created', [$fd, $td])
      ->where('inventory.date_created','>=',$fd)
      ->orwhere('inventory.date_created','<=',$td)
      ->get();
        }
        
      }else{
        if($stock=="all"){
          $item=DB::table("inventory")->select('inventory.*','stock_list.name')
      ->join('stock_list','stock_list.id','=','inventory.supply_id')
      // ->where('inventory.date_created','>=',$fd)
      // ->where('inventory.date_created','<=',$td)
      ->get();

        }else{
          $item=DB::table("inventory")->select('inventory.*','stock_list.name')
      ->join('stock_list','stock_list.id','=','inventory.supply_id')
      ->where("inventory.supply_id","=",$stock)
      // ->where('inventory.date_created','>=',$fd)
      // ->where('inventory.date_created','<=',$td)
      ->get();

        }
        
      }

      return view('stock.reportlist')->with('item',$item);
      
    }
}