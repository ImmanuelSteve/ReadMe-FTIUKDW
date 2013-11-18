$(document).ready(function(){
    $("dd:not(:first)").hide();
    $("dt p").click(function() {
	$("dd:visible").slideUp("slow");
	$(this).parent().next().slideDown("slow");
	return false;
    });
    
    //komentar dan spesifikasi
    $("#isiTab div").hide(); // Initially hide all content
	//tab yg aktif punya id current yg dipake di css
	$("#tabs li:first").attr("id","current"); // Activate first tab
	$("#isiTab div:first").fadeIn(); // Show first tab content        
	$('#tabs a').click(function(e) {
		if ($(this).attr("id") == "current"){ //detection for current tab
			return       
		}
		else{             
			$("#isiTab div").hide(); //Hide all content
			$("#tabs li").attr("id",""); //Reset id's
			$(this).parent().attr("id","current"); // Activate this
			$('#' + $(this).attr('name')).fadeIn(); // Show content for current tab
		}
	}); 
});





