$(document).ready(function(){
    $('.add-media i').click(function(){
        $('#post-photo').trigger('click');
    });
    $('.add-video i').click(function(){
        $('#post-video').trigger('click');
    });
    $('.add-location i').click(function(){
        $('.geo-tag-container').removeClass('hidden');
    });

    $("#post-photo").change(function(){
        readURL(this);
        $('.add-media i').addClass('has-file').removeClass('no-file');
    });
    $("#post-video").change(function(){
        $('.add-video i').addClass('has-file').removeClass('no-file');
    });

    //GeoLocation
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(function(position) {
                $('#place-name').fs_suggest({
                    'll' : position.coords.latitude +',' + position.coords.longitude,
                    'limit' : 10
                });
        },
        function (error) {
            if (error.code == error.PERMISSION_DENIED)
                alert("DEBUG: Geolocation was denied.");
            //@todo Get ip via another stuff
        });
    } else {
        alert("Geolocation is not supported by this browser.");
        //@todo Get ip via another stuff
    }

    //$('.img-container > img').fakecrop({wrapperWidth : 120, wrapperHeight : 120});
    projekktor('video.projekktor', {plugins: ['display', 'controlbar']});
    $(document).on('click', '.geo-place', function(e){
        e.preventDefault();
        $('#place-name').val($(this).find('span.geo-name').text());
        $('#set-geo').html('<i class="fa fa-map-marker"></i>&nbsp;' + $(this).find('span.geo-name:first').text() + '<i class="fa fa-close"></i>').removeClass('hidden');
        $('#fs_search_results').html('');
        $('input#geo-lon').val($(this).attr('lon'));
        $('input#geo-lat').val($(this).attr('lat'));
        $('input#geo-name').val($(this).find('span.geo-name').text());
        $('input#geo-address').val($(this).find('span.geo-address').text());

        $('.find-place').addClass('hidden');
    });
    $(document).on('click', '.set-geo .fa-close', function(e){
        $('input#geo-lon').val('');
        $('input#geo-lat').val('');
        $('#set-geo').addClass('hidden');
        $('.find-place').removeClass('hidden');
    });
    //@todo Изменить все, тут очень костыльно, доработать AJAX
    $('[rel=popover]').popover({
        html:true,
        placement:'top',
        content:function(){
            return $($(this).data('contentwrapper')).html();
        }
    });
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