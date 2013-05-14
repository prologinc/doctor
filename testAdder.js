$(document).ready(function()
{

  $(".test_adder").live('click',function()
{
    var id = $(this).attr('id');
    var cat=$("#test_a1").val();
    var sub=$("#test_a2").val();
    var test=$("#test_a3").val();
    var dataString = 'id='+id+'&cat='+cat+'&sub='+sub+'&query='+5+'&test='+test;
    	$.ajax({
type: "POST",
url: "drug_query.php",
data: dataString,
cache: false,
success: function(e)
{
    if(e=='done'){

$("#test_a1").val('');
$("#test_a2").val('');
$("#test_a3").val('');
    }else alert(e);
}
		   
});
                   
});


})



