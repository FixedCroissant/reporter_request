/**
 * Created by jjwill10 on 6/26/2017.
 */
//Prevent submission
$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});