<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use yajra\Datatables\Datatables;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $extra=null;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
$user=User::where('id',$id)->first();
$user->delete();
return back();


    }
    public function index()
    {
        

        return view('Dashboard.dashboard')->withextra($this->extra);
    }
    public function data(){

$users=User::select('id','name','email','created_at','updated_at');
//dd($users);
 return Datatables::of($users)
 ->addColumn('names',' $users->name')
            ->addColumn('action', function ($user) {
                return '<a href="'.route('datatables.delete',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>

                ';
            })
           
            ->make(true);

    }
}
