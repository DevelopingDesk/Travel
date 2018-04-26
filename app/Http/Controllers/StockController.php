<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Check;
use App\Compnay;
use Session;
use App\Http\Requests\Tickvalidation;
class StockController extends Controller
{
	
   public function create($id){
    $date_check=null;
    	$default="pending";
$stk=Stock::where('company_id',$id)->get();
$compname=Stock::where('company_id',$id)->first();
//dd($compname->company->name);
//dd($compname);
if($compname!=null)
{
$default=$compname->company->name;
}
$total=Stock::where('company_id',$id)->sum('amount');
$Check=Check::where('company_id',$id)->sum('check_amount');
$balance=$total-$Check;

return view('ManageStock.create')->withstock($stk)->withcompanyid($id)->withtotal($balance)->withcompname($default)->withdeliverdcheck($Check)->withcheck($date_check);

    }
   
    public function store(Request $request){
$chek=Stock::where('ticket_number',$request->ticketnumber)->first();
if($chek){
     Session::flash('flash_message', 'Already have same ticket number!');

	return back();
}

$stk=new Stock();
$stk->company_id=$request->company_id;
$stk->date=$request->date;
$stk->pass_name=$request->passname;
$stk->sector=$request->sector;
$stk->number_shamar=$request->numbershamar;
$stk->amount=$request->amount;
//$stk->refund=$request->amount;
$stk->refund=0;
$stk->amount_type=$request->amount_type;
$stk->ticket_number=$request->ticketnumber;
$stk->save();
     Session::flash('flash_message', 'Saved Successfully!');

return back();



    }
   
    public function delete($id){
$stk=Stock::where('id',$id)->first();
$stk->delete();
return back();

    }
public function entry(){
$all=Compnay::all();
return view('Ticket.entry')->withcompany($all);

}
}
