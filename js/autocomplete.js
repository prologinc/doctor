
//google.load("jquery", "1.3.1");
google.setOnLoadCallback(function()
{
	// Safely inject CSS3 and give the search results a shadow
	var cssObj = { 'box-shadow' : '#888 5px 10px 10px', // Added when CSS3 is standard
		'-webkit-box-shadow' : '#888 5px 10px 10px', // Safari
		'-moz-box-shadow' : '#888 5px 10px 10px'}; // Firefox 3.5+
	$(".leave").css(cssObj);
	
	// Fade out the d_suggestions box when not active
	 $("input").blur(function(){
	 	$('.leave').fadeOut();
	 });
});
function autocomplete(dataString) {

	$('.bus').val(dataString);
	$('.leave').fadeOut();
	$('.leave').hide();
}
function lookup(inputString) {
	$('.leave').live('click',function(){
		var value=$('.searchheading').val();
                //$('#inputString').val(value);
		$('.leave').fadeOut();
	});
	if(inputString.length == 0) {
		$('.leave').fadeOut(); 
	} else {
		var inStr = inputString.split('[');
                if(inputString=="Add New Drugs"){
                  var go= $('.myModal').attr('id');
                        $.post("helper.php", {queryString: go}, function(data) { // Do an AJAX call
			$('.myModal').html(data); 
		});
                }else{
                   
		$.post("rpc1.php", {name:inStr[0],str:inStr[1]}, function(data) {
                        $('.bus').val('Choose Brand Name');
			$('.leave').fadeIn(); 
			$('.leave').html(data); 
		});
                }
	}
}

//$(function() {

//);
