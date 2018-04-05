@extends('Dashboard/dashboard')

@section('content')
@include('message')


<div class="col-md-12">
<form action="{{route('daily.reportview')}}" method="post">
	{{csrf_field()}}
	<div class="col-md-6">
		<input type="date" name="date" class="form-control">

	</div>
	<div class="col-md-6">
		<button class="btn btn-warning">Daily Record</button>
	</div>
</form>	
</div>
<br><br>

<div class="col-md-12">
	<div class="col-md-12" id="divide">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Serial Number</th>
                <th>Number Shamar</th>
                <td>Company</td>
                <th>Date</th>
                <th>Passenger Name</th>
                <th>Ticket Number</th>
                <th>Sector </th>
                <th>Amount</th>
                <th> Amount Type</th>
                <th>Confirmation</th>
                <th>Original Amount</th>
        
               
                

               
                
            </tr>
        </thead>
       
        <tbody>
        	@if($stock!=null)
          @foreach($stock as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->number_shamar}}</td>
             <td>{{$cls->company->name}}</td>
                
                <td>{{$cls->date}}</td>
                <td>{{$cls->pass_name}}</td>
              <td>{{$cls->ticket_number}}</td>
               <td>{{$cls->sector}}</td>
                @if($cls->amount==0)
                <td>Refunded All</td>
                @else
                <td>{{$cls->amount}}</td>
                
                @endif

                <td>{{$cls->amount_type}}</td>
@if($cls->ok!=Null)
<td> <input type="checkbox"  value="{{$cls->id}}" id="status" name="status" checked="true"></td>
@else

                <td><input type="checkbox" type="checkbox" value="{{$cls->id}}" id="status" name="status"  ></td>
                @endif
                <td>{{$cls->refund}}</td>

               
            </tr>
           @endforeach
           @endif
        </tbody>

    </table>

	</div>
<button class="btn btn-success pull-right" onclick="printContent('divide')">print</button>

</div>
<script type="text/javascript">

function printContent(el){

var restorpage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;

document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorpage;
window.close();
}


</script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript" src="{{asset('js/Stock/update.js')}}"></script>

<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('ok.done')}}';


</script> 
@endsection