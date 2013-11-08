$(document).ready(function(){
    //$(".isikategori:not(:first)").hide();
    $(".judulkategori p a").click(function(){
	$(".isikategori").slideToggle("slow");
    });
    
    //komentar dan spesifikasi
    $("#isiTab div").hide(); // Initially hide all content
	//tab yg aktif punya id current yg dipake di css
	$("#tabs li:first").attr("id","current"); // Activate first tab
	$("#isiTab div:first").fadeIn(); // Show first tab content        
	$('#tabs a').click(function(e) {
		if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
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





