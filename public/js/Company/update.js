var name=null;
var id=null;
var mn=null;

$(".edit").click(function (event) {

	
     name = $(this).closest("tr").find("td:eq(1)").text();
     mn = $(this).closest("tr").find("td:eq(1)");

     id = $(this).closest("tr").find("td:eq(0)").text();

    $('#myModal').modal();

$('#body').html(name);
$('#idsection').html(id);






});

$('#save').on('click',function(){
var body=$('#body').val();
  
mn.text(body);

$.ajax({
method:'POST',
url:add,

data:{id:id,name:body,_token:token},
success:function(data){
console.log(data);
$('#myModal').modal('hide');


}


});

});

   
