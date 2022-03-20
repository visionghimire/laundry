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
       

      return view('stock.report');

    }

    public function getReport(Request $request){
      $fd=$request->input("fd");
      $td=$request->input("td");
      // dd($td);
      if($fd!=null && $td!=null){
        $item=DB::table("inventory")->select('inventory.*','stock_list.name')
      ->join('stock_list','stock_list.id','=','inventory.supply_id')
      ->whereBetween('inventory.date_created', [$fd, $td])
      // ->where('inventory.date_created','>=',$fd)
      // ->where('inventory.date_created','<=',$td)
      ->get();
      }else{
        $item=DB::table("inventory")->select('inventory.*','stock_list.name')
      ->join('stock_list','stock_list.id','=','inventory.supply_id')
      // ->where('inventory.date_created','>=',$fd)
      // ->where('inventory.date_created','<=',$td)
      ->get();

      }

      return view('stock.reportlist')->with('item',$item);
      
    }
}