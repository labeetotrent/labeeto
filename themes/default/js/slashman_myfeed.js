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
        trigger: 'hover',
        placement:'top',
        content:function(){
            return $($(this).data('contentwrapper')).html();
        }
    });

    $(document).on('click', '.upvote, .downvote', function(){

        var vote = 0;

        if($(this).hasClass('upvote'))
            vote = 1;

        var id = $(this).attr('data-id');
        var ul = $(this).parent().parent();

        $.post( Yii.app.createUrl('ajax/vote'),
            {
                id: id,
                vote: vote
            }).done(function(response){
                response = JSON.parse(response);

                if(response.result == 'VOTED')
                {
                    if(response.direction == 'UP')
                    {
                        $(ul).find('.upvote').addClass('active');
                        $(ul).find('.upvote').removeClass('notactive');
                        $(ul).find('.downvote').removeClass('active');
                        $(ul).find('.downvote').addClass('notactive');
                        $(ul).find('span.vote_amount').addClass('active');
                    }
                    else if (response.direction == 'DOWN')
                    {
                        $(ul).find('.upvote').removeClass('active');
                        $(ul).find('.downvote').addClass('notactive');
                        $(ul).find('.downvote').removeClass('notactive');
                        $(ul).find('.downvote').addClass('active');
                        $(ul).find('span.vote_amount').addClass('active');
                    }
                    $(ul).find('span.vote_amount').text(response.amount);
                }
            });
    });

    $(document).on('focus', '.comment_post_txt', function(){
        $(this).parent().parent().find('.add-comment-container').animate({
            height: '40px',
            opacity: '1'
        });
    });
    $(document).on('focusout', '.comment_post_txt', function(){
        $(this).parent().parent().find('.add-comment-container').animate({
            height: '0',
            opacity: '0'
        });
    });
    $(document).on('click', '.add-comment-btn', function(){
        postComment($(this));
    });
    $(document).on('keypress', '.comment_post_txt', function(e){
        var code = e.keyCode || e.which;
        if(code == 13)
            postComment($(this));
    });
    $(document).on('click','.comment_txt', function(){
        if($(this).parent().parent().find('ul').length > 0)
        {
            if($(this).parent().parent().find('ul').css('display') == 'none')
            {

                $(this).parent().parent().find('ul').slideDown(300, function(){
                    $(this).parent().parent().parent().find('.my_comment').slideDown(300);
                });
            }
            else
            {
                $(this).parent().parent().parent().find('.my_comment').slideUp(300, function(){
                    $(this).parent().parent().find('ul').slideUp(300);
                });
            }
        }
        else
        {
            if($(this).parent().parent().parent().find('.my_comment').css('display') == 'none')
                $(this).parent().parent().parent().find('.my_comment').slideDown(300);
            else
                $(this).parent().parent().parent().find('.my_comment').slideUp(300);
        }
    });
});

function postComment(obj)
{
    var ulHidden = false;
    if($(obj).parent().parent().parent().find('.comment-post-home ul:first').length == 0)
    {
        $(obj).parent().parent().parent().find('.comment-post-home').append('<ul></ul>');
        ulHidden = true;
    }

    var ul = $(obj).parent().parent().parent().find('.comment-post-home ul:first');

    var postId = $(obj).parent().parent().attr('post-id');
    var comment = $(obj).parent().parent().find('.comment_post_txt').val();
    $(obj).parent().parent().find('.comment_post_txt').val('');
    $.post( Yii.app.createUrl('ajax/addComment'),
        {
            postId: postId,
            comment: comment
        }).done(function(response){
            if(ulHidden)
                ul.show('fast');

            var $newLi = $(response);
            $(ul).append($newLi);
            $newLi.show('slow');
        });
}
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