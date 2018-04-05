@extends('Dashboard/dashboard')

@section('content')
<form method="post" action="{{route('refund.store')}}">
	{{csrf_field()}}
<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
		<input type="text" name="ticketnumber" class="form-control" placeholder="Enter Ticket Number" required="true">
	</div>

		<div class="col-md-3">
		<input type="number" name="amount" class="form-control" placeholder="Enter Amount" required="true">
	</div>
		<div class="col-md-3">
	<button class="btn btn-primary">Refund Amount</button>
	</div>

	
	</div>
</div>

</form>
<div class="row">
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue"> Refunded Data</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Serial Number</th>
              <th>Ticket Number</th>
                <th>Passeger Name</th>
                <th>Refund Amount</th>
                        @if(Auth::User()->hasrole('admin'))
                
                <th>Delete</th>
               
                @endif
            </tr>
        </thead>
       
        <tbody>
          @foreach($refund as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->ticket_number}}</td>
                <td>{{$cls->pass_name}}</td>
                <td>{{$cls->refund_amount}}</td>
                        @if(Auth::User()->hasrole('admin'))
               
               <td><a href="{{route('refund.delete',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>
              
             
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

</div>
	</div>

</div>
@endsection