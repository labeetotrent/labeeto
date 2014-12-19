/**
 * Created by slashman on 19.12.14.
 */
$(document).ready(function(){
    $(document).on({
        mouseenter: function () {
            $(this).addClass('hovered', 500);
        },
        mouseleave: function () {
            $(this).removeClass('hovered', 500);
        }
    }, '.dialog');
});