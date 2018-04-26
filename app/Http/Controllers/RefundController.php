<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refund;
use App\Stock;
class RefundController extends Controller
{
    
    public function create($id){
$all=Refund::all();
return view('Refund.create')->withrefund($all);

    }
     public function store(Request $request){

$stk=Stock::where('ticket_number',$request->ticketnumber)->first();
//dd($stk);

$before=$stk->amount;
$stk->refund=$request->amount;
//$stk->refund=$before;
$balc=$before-$request->amount;
$stk->amount=$balc;
$stk->update();

$ref=new Refund();
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
