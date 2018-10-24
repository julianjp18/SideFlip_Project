
// Wait for window load
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
});
$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.tabs').tabs();
    $('select').formSelect();
    $('select').isMultiple();
    ;
}); 