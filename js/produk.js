$(document).ready(function(){
	$("dd").hide();
	$("dt a").click(function(){
	$("dd:visible").slideUp("slow");
	if($("dt:not(:visible)"))$(this).parent().next().slideDown("slow");
	return false;
	    });
});