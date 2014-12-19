/**
 * Created by slashman on 19.12.14.
 */
var disableScreenScrolling = false;
$(document).ready(function(){
    $(document).on({
        mouseenter: function () {
            $(this).addClass('hovered', 500);
        },
        mouseleave: function () {
            $(this).removeClass('hovered', 500);
        }
    }, '.dialog');



    /*

    $(document).on({
        mouseenter: function () {
            disableScreenScrolling = true;
        },
        mouseleave: function () {
            disableScreenScrolling = false;
        }
    }, '.dialogs, .messages');
    $(window).on({
        'mousewheel' : function(e){
            if(disableScreenScrolling)
            {
                e.preventDefault();
                e.stopPropagation();
            }
        }
    });*/
});