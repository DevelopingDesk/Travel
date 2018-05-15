<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Check;
use App\Refund;

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
$stk=Stock::where('id',$id)->first();
if($stk->ok==null){
$stk->ok=1;

}
else{

   $stk->ok=null;
}
$stk->update();
return response($stk);

    }

    public function dateWise(Request $request){
        $default="pending";
//dd($request->companyid);
$compname=Stock::where('company_id',$request->companyid)->first();
//dd($compname->company->name);
//dd($compname);
if($compname!=null)
{
$default=$compname->company->name;
}


$total=Stock::where('company_id','=',$request->companyid)->
whereBetween('date', [$request->first, $request->second])->sum('amount');
//dd($total);
//total refunded data to keep full ammount
$totalrefunded=Refund::where('company_id','=',$request->companyid)->sum('refund_amount');
$between_date_refunded=Refund::where('company_id','=',$request->companyid)->
whereBetween('date', [$request->first, $request->second])->sum('refund_amount');

//dd($totalrefunded);
$totaltoal=$total+$totalrefunded-$between_date_refunded;


$Check=Check::where('company_id',$request->companyid)
->whereBetween('date', [$request->first, $request->second])->sum('check_amount');
$check_between_date=Check::where('company_id',$request->companyid)
->whereBetween('date', [$request->first, $request->second])->get();

//dd($Check);
//data to show in page of refund
$refund_between_date=Refund::where('company_id',$request->companyid)
->whereBetween('date', [$request->first, $request->second])->get();


$balance=$totaltoal-$Check;
        $stk=Stock::where('company_id','=',$request->companyid)->whereBetween('date', [$request->first, $request->second])->get();
      //refund total and between date refunded data



        return view('ManageStock.create')->withstock($stk)->withcompanyid($request->companyid)->withcompname($default)->withtotal($balance)->withdeliverdcheck($Check)->withcheck($check_between_date)->withrefund($refund_between_date)->withrefundamount($between_date_refunded);


    }
}
