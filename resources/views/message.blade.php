@if(Session::has('flash_message'))
<div class="alert {{ (Session::has('flash_message_status'))?'alert-error':'alert-success'}}">
    <button class="close" data-dismiss="alert" ></button>
    {!! Session::get('flash_message') !!}
</div>
@endif