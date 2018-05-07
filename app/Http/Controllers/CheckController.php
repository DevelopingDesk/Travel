<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;
class CheckController extends Controller
{
    public function create($id){


$check=Check::where('company_id',$id)->get();
//dd($check);
return view('Check.create')->withcompanyid($id)->withchecks($check);


    }
    public function approve(){

    	$id=$_POST['orderid'];
//return response($id);
$stk=Check::where('id',$id)->first();
if($stk->approve==null){
$stk->approve=1;

}
else{

   $stk->approve=null;
}
$stk->update();
return response($stk);
    }
    public function refund($id){

$check=Check::where('id',$id)->first();
$check->check_amount=0;
$check->update();
return back();

    }
    public function store(Request $request){

$chek=new Check();
$chek->date=$request->date;
$chek->voture_number=$request->voturenumber;
$chek->bank_name=$request->bankname;

$chek->check_number=$request->checknumber;
$chek->check_amount=$request->check_amount;
$chek->check_type=$request->check_type;
$chek->company_id=$request->company_id;
$chek->save();
return back();

    }
    public function update(){

$rec=Check::where('id',$_POST['id'])->first();

$rec->check_amount=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
public function delete($id){
$chk=Check::where('id',$id)->first();
$chk->delete();
return back();



}
}
