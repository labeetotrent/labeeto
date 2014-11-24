$(document).ready(function(){
    $('.add-media i').click(function(){
        $('#post-photo').trigger('click');
    });

    $("#post-photo").change(function(){
        readURL(this);
    });
    //$('.img-container > img').fakecrop({wrapperWidth : 120, wrapperHeight : 120});
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#media-post-thumb').attr('src', e.target.result).removeClass('hidden');
            $('#media-post-thumb').parent().removeClass('hidden');
        };

        reader.readAsDataURL(input.files[0]);
        $('.thumb-container > img').fakecrop({wrapperWidth : 50, wrapperHeight : 50});
    }
}