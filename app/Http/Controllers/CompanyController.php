<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compnay;
class CompanyController extends Controller
{
   
public function create(){

$cm=Compnay::all();
	return view('Company.create')->withcompany($cm);
}

public function store(Request $request){
$cm=new Compnay();
$cm->name=$request->name;
$cm->save();
return back();

}
public function delete($id){
$cm=Compnay::where('id',$id)->first();
$cm->delete();
return back();

}
public function update(){

$rec=Compnay::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
