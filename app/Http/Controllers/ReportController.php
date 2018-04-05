<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock; 
class ReportController extends Controller
{
    public function create(){
$stk=null;

    	return view('Report.dailyreport')->withstock($stk);
   
    }
    public function daily(Request $request){


    	$stk=Stock::where('date',$request->date)->get();
    	return view('Report.dailyreport')->withstock($stk);
    }
    public function ok(Request $request){
$id=$_POST['orderid'];
//return response($id);
$stk=Stock::where('id','=',$id)->first();
//if($stk->ok==Null){//
//$stk->ok=1;

//}
//if($stk->ok==1){

  //  $stk->ok=Null;
//}
//$stk->update();
return response($id);

    }
}
