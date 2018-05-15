<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refund;
use App\Stock;
class RefundController extends Controller
{
	 public function approve(){

    	$id=$_POST['orderid'];
//return response($id);
$stk=Refund::where('id',$id)->first();
if($stk->approve==Null){
$stk->approve=1;

}
else{

   $stk->approve=Null;
}
$stk->update();
return response('ok');
    }
    
    public function create($id){
$all=Refund::where('company_id',$id)->get();

return view('Refund.create')->withrefund($all)->withcompanyid($id);


    }
     public function store(Request $request){

$stk=Stock::where('ticket_number',$request->ticketnumber)->first();


$before=$stk->amount;

$previousrefund=$stk->refund;


$stk->refund=$request->amount+$previousrefund;

//$stk->refund=$before;
$balc=$before-$request->amount;
$stk->amount=$balc;
$stk->update();

$ref=new Refund();

$ref->date=$request->datepicker;
$ref->company_id=$request->companyid;

$ref->ticket_number=$request->ticketnumber;
$ref->pass_name=$stk->pass_name;
$ref->refund_amount=$request->amount;
$ref->save();

return back();





    }
    public function delete($id){

$del=Refund::where('id',$id)->first();
$del->delete();
return back();

    }
}
