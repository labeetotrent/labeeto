$(document).ready(function(){
    $('.add-media i').click(function(){
        $('#post-photo').trigger('click');
    });
    $('.add-video i').click(function(){
        $('#post-video').trigger('click');
    });

    $("#post-photo").change(function(){
        readURL(this);
        $('.add-media i').addClass('has-file').removeClass('no-file');
    });
    $("#post-video").change(function(){
        $('.add-video i').addClass('has-file').removeClass('no-file');
    });
    //$('.img-container > img').fakecrop({wrapperWidth : 120, wrapperHeight : 120});
    projekktor('video.projekktor', {plugins: ['display', 'controlbar']});
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