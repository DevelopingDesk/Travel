@extends('Dashboard/dashboard')

@section('content')


<div id="myModal" style="margin-top:30px"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" id="myform" action="">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Edit Check</h4>
      </div>
      <div class="modal-body" width="30px" >
       <textarea id="body" name="body" class="form-control" placeholder="your report must be solid"></textarea>
          <textarea id="idclass" name="idclass" style="display: none" class="form-control" placeholder="your report must be solid"></textarea>
     
       <input type="hidden" name="_token" value="{{Session::token()}}">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     <button id="save" type="button" class="btn btn-primary" >Save</button> 
      </div>
      </form>

    </div>

  </div>
</div>
<h3 style="text-align: center; color: blue;text-shadow: green">Data Entry</h3>

<form method="post" action="{{route('store.check')}}">
	
{{csrf_field()}}
<div class="col-md-12">
	<div class="col-md-2">
		<input type="date" name="date" class="form-control">
	</div>
	
	<input type="hidden" name="company_id" value="{{$companyid}}">
	<div class="col-md-2">
		<input type="number" name="check_amount" class="form-control" placeholder="Enter Amount">
	</div>
  <div class="col-md-2">
    <input type="text" name="checknumber" class="form-control" placeholder=" Check Number">
  </div>
  <div class="col-md-2">
    <input type="text" name="voturenumber" class="form-control" placeholder="Enter Voture">
  </div>
  <div class="col-md-2">
    <input type="text" name="bankname" class="form-control" placeholder="Bank Name">
  </div>
	<div class="col-md-2">
		<select class="form-control" name="check_type">
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
<div class="row">
  <div class="col-md-12 right ">
    <button class="btn btn-primary pull-right">Add</button>
    
  </div>
</div>
	

</div>
</form>
<br>
 
  <h2 style="text-align: center;color: lightgreen"> All Checks Detail</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Serial Number</th>
               <th>Date</th>
                <th>Company Name</th>
                <th>Check Number</th>
                <th>Voture Number</th>
                <th>Bank Name</th>
               
                <th>Check Amount</th>
                <th>Check Type</th>
                
                        @if(Auth::User()->hasrole('admin'))
              
               <th>Action</th>
                @endif
                        @if(Auth::User()->hasrole('admin'))

                <th>Approve</th>
                @endif
            </tr>
        </thead>
       
        <tbody>
          @foreach($checks as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->date}}</td>

                <td>{{$cls->company->name}}</td>
                <td>{{$cls->check_number}}</td>
                <td>{{$cls->voture_number}}</td>
                <td>{{$cls->bank_name}}</td>
                @if($cls->check_amount==0)

                <td>Refunded</td>
                @else
                <td>{{$cls->check_amount}}</td>

                @endif
               
                <td>{{$cls->check_type}}</td>
                        @if(Auth::User()->hasrole('admin'))
              
             <td>
                  <a href="#"  class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit "></i> Edit</a>
                <a href="{{route('delete.check',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                
               </td>
               @if(Auth::User()->hasrole('admin'))
@if($cls->approve!=Null)
<td> <input type="checkbox"  value="{{$cls->id}}" id="status" name="status" checked="true"></td>
@else

                <td><input type="checkbox" value="{{$cls->id}}" id="status" name="status"  ></td>
                @endif
                @endif
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
<script type="text/javascript" src="{{asset('js/Check/update.js')}}"></script>
<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('edit.check')}}';

</script> 
<script type="text/javascript" src="{{asset('js/Stock/update.js')}}"></script>

<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('approve.check')}}';


</script> 
</div>


@endsection