$(document).ready(function()
{
        $(".sym_done").live('click',function()
{
    var name=$('.sym_name').val()
var dataString = 'id='+ name+'&query='+3;

	$.ajax({
type: "POST",
url: "drug_query.php",
data: dataString,
cache: false,
success: function(e)
{
    if(e=='ok'){
        $('.sym_name').val('');
    }else{
        alert('Something Went Wrong,try Again')
    }

}
});
    
});
});


