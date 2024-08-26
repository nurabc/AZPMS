$(document).ready(function(){
   $('#menu-toggle').click(function(e){
        e.preventDefault();
        $('#wrapper').toggleClass('menuDisplayed');
    });
    $('.has-sub').click(function(){
        $(this).toggleClass('tap');
    });

});
   



