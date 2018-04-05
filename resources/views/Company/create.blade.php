@extends('Dashboard/dashboard')

@section('content')
<div id="myModal" style="margin-top:30px"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" id="myform" action="">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Edit Compnay</h4>
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
<form method="post" action="{{route('store.compnay')}}">
	{{csrf_field()}}

<div class="col-md-12">
	
	<div class="col-md-6">
		<input type="text" name="name" required="true" class="form-control" placeholder="Enter New Compnay Name">
	</div>
	<div class="col-md-6">
		<button class="btn btn-primary">Save</button>
	</div>
</div>
</form>

<div class="row">
	<div class="col-md-12">
		

		  <div style="background-color: white">
    <br><br>
  
  <h2 style="text-align: center;color:  blue"> All Company</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>Id</th>
                <th>Name</th>
                        @if(Auth::User()->hasrole('admin'))

                <th>Action</th>
                @endif
                <th>Manage</th>
               
                
            </tr>
        </thead>
       
        <tbody>
          @foreach($company as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td>{{$cls->name}}</td>
                        @if(Auth::User()->hasrole('admin'))
               
                <td><a href="#"  class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit "></i> Edit</a>
                <a href="{{route('delete.compnay',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                
               </td>
               @endif
               <td>
               	<a href="{{route('create.stock',$cls->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Manage Stock</a>
                 <a href="{{route('create.check',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-plus"></i> Manage Check</a>
               <a href="{{route('refund.create',$cls->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Refund</a>
               </td>
             

             
            </tr>
           @endforeach
        </tbody>
    </table>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript" src="{{asset('js/Company/update.js')}}"></script>
<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('edit.compnay')}}';

</script> 
</div>
	</div>

</div>


@endsection