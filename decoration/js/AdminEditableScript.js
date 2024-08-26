
$(document).ready(function(){
    /* Dropdown click event*/
$('.has-sub').click(function() {
                $(this).toggleClass('tap');
            });
            /* for Toggle menu events*/
             $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("menuDisplayed");
            });

});