<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;

class BaseModel extends Model
{
    protected $rules =[];
    public $errors=[];
    public $timestamps = false;
    
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }
    
    //this function changes nepali number to english and english no to nepali
    public static function toggleNumber($n) {
        $langMap = ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९"];
        $num = '';
        $nArray = preg_split('/(.{0})/us', $n, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        foreach ($nArray as $sn) {
            if (isset($langMap[$sn])) {
                $num .=$langMap[$sn];
            } elseif (in_array($sn, $langMap)) {
                $num .= array_search($sn, $langMap);
            }
            else{
                $num .=$sn;
            }
        }
        return $num;
    }

    public function getAstrik(){
        $astrik = [];
        $rules = $this->rules;
        foreach($rules as $k=>$r){
            if($r == 'nullable'){
                continue;
            }elseif(strpos($r, '|') !== false){
                $rarr = explode('|',$r);
                if(in_array('nullable', $rarr)){
                   continue;
                }
            }
            $astrik[]=$k;
        }
        return $astrik;
    }

    public static function mMaxDay($year,$month){
        $qry = DB::table('date_meta')->select(['maxday'])
                ->where('years','=',$year)
                ->where('months','=',$month)->first();
        return $qry->maxday;
    }
    
    public static function nepDate($date){
       
        $q = DB::select(DB::raw("select nepdate('".$date."') as nepdate"));
        // dd($q);
        return $q[0]->nepdate;
    }
    public static function engDate($date){
        $q = DB::select(DB::raw("select stdengdate('".$date."') as engdate"));
        return $q[0]->engdate;
    }
    
    public static function splitDate($date,$eng=true){
        if($eng==true){
            $d = explode('/',$date);
            $e[0] =$d[2];
            $e[1]= $d[0];
            $e[2]= $d[1];
            return $e;
        }
        else{
            return explode('/',$date);
        }
        
    }
    
    public static function getFiscalYear($nepDate = null){
        if($nepDate == null){
            $nepDate = self::nepDate(date('Y-m-d'));
        }
        $dateParts = self::splitDate($nepDate,false);
        if($dateParts[1] >= 4){
            return $dateParts[0];
        }else{
            return ($dateParts[0]-1);
        }
    }

    

}
