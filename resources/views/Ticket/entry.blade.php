@extends('Dashboard/dashboard')

@section('content')
@include('message')
<div class="col-md-12">
<form method="post" action="{{route('store.stock')}}">
<h3 style="text-align: center; color: blue;text-shadow: green">Ticket Entry</h3>
	
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
	<div class="col-md-2">
		<select class="form-control" name="company_id">
		
@foreach($company as $cmp)
			<option value="{{$cmp->id}}">
				{{$cmp->name}}
			</option>
@endforeach

			
			
			
					</select>
	</div>
  <div class="col-md-3">
    <button class="btn btn-primary">Save</button>
  </div>
</div>
	


</form>
</div>
@endsection