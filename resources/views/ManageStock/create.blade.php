@extends('Dashboard/dashboard')

@section('content')
@include('message')
<div class="col-md-12">
<form method="post" action="{{route('store.stock')}}">
<h3 style="text-align: center; color: blue;text-shadow: green">Data Entry</h3>
	
{{csrf_field()}}

	<div class="col-md-3">
		<input type="date" name="date" class="form-control" required="true">
	</div>
  <div class="col-md-3">
    <input type="text" name="numbershamar" placeholder="number shamar" class="form-control" required="true">
  </div>
    <div class="col-md-3">
    <input type="text" name="passname" placeholder="Passenger Name" class="form-control" required="true">
  </div>
   <div class="col-md-3">
    <input type="text" name="sector" placeholder="Enter Sector" class="form-control" required="true">
  </div>
  <br>
  <br>
  <br><br>
  <div class="col-md-12">
    
  
	<div class="col-md-3">
		<input type="text" name="ticketnumber" class="form-control" placeholder="Enter Ticket Number" required="true">
	</div>
	<input type="hidden" name="company_id" value="{{$companyid}}">
	<div class="col-md-2">
		<input type="number" name="amount" class="form-control" placeholder="Enter Amount" required="true">
	</div>
	<div class="col-md-2">
		<select class="form-control" name="amount_type">
			<option>
				Cash
			</option>

<option>
				Check
			</option><option>
				Credit Card
			</option>
			<option>
				Debit Card
			</option>
			<option>
				Paypal
			</option>
			
			
			
					</select>
	</div>
  <div class="col-md-3">
    <button class="btn btn-primary">Add</button>
  </div>
</div>
	


</form>
</div>


<button class="btn btn-primary pull-right" onclick="printContent('divide')">print</button>
<div class="col-md-12" >
  

  <div style="background-color: white" id="divide">
    <br><br>
  
  <h2 style="text-align: center;color: blue"> {{$compname}}: <strong style="color: red"> {{$total}} Rs</strong> </h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Serial Number</th>
                <th>Number Shamar</th>
                
                <th>Date</th>
                <th>Passenger Name</th>
                <th>Ticket Number</th>
                <th>Sector </th>
                <th>Amount</th>
                <th> Amount Type</th>
                <th>Confirmation</th>
                <th>Original Amount</th>
                        @if(Auth::User()->hasrole('admin'))
                
                <th>Delete</th>
               @endif
                

               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($stock as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->number_shamar}}</td>
             
                
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
@if(Auth::User()->hasrole('admin'))
@if($cls->ok==Null)
<td>


<input type="checkbox" value="{{$cls->id}}">
  

</td>
@else
<td><input type="checkbox" checked="true" value="{{$cls->id}}"></td>

                
                @endif

@else

@if($cls->ok==Null)
<td style="color: red">Not confirmed So Far</td>
@else

                <td style="color: green">Confirmed By Admin</td>
                @endif

@endif
                <td>{{$cls->refund}}</td>
                        @if(Auth::User()->hasrole('admin'))

                <td>

                <a href="{{route('delete.stock',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
             
               </td>
               @endif
            </tr>
           @endforeach
        </tbody>

    </table>
  
   
   
    
    
       
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
</div>

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
$('#saveOffer').click(function () {
  window.history.pushState('forward', null, '/');
  setTimeout(function () {
    window.location.reload();
},1000);
});

</script>

@endsection