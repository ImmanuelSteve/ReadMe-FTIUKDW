$(document).ready(function(){
    $(".tambahadmin").hide();
    $(".tambahadmin").slideUp();
    $(".buttonadmin").click(function(){
        $(".tambahadmin").toggle("slow");
    })
});