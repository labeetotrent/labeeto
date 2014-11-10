$(document).ready(function(){
    /*Feed page */
    $('.profile-nav').click(function(){
        if ($('.menu-profile').is(':hidden')) {
            $('.test-nav').css('background', '#232f37');
            $('.menu-profile').css('display','block');
            $('.username-nav').css('color', '#ffffff');
        } else {
            $('.test-nav').css('background', 'none');
            $('.menu-profile').css('display','none');
            $('.username-nav').css('color', '#ffffff');
        }

    });
    
    $("#toggle").click(function(){
        $(".menu-slide").toggle();
    });
    
    $("#toggle_message").click(function(){
        $(".menu_message").toggle();
    });
   
    $("#toggle-notification").click(function(){
        $(".menu-notification").toggle();
        $(".clicked-notification").hide();
    });


    $('#PhotoNomal').click(function(){
        $('.content-profile').hide();
        $('.content-video').hide();
        $('.line-green-video').hide();
        $('.line-green-photo-pravite').hide();
        $('.content-photo-private').hide();
        $('.content-photo').show();
        $('.line-green-photo').css('display','block');
        
    });

    $('.close-photo').click(function(){
        $('.content-profile').show();
        $('.content-video').hide();
        $('.line-green-video').hide();
        $('.line-green-photo-pravite').hide();
        $('.content-photo-private').hide();
        $('.content-photo').hide();
        $('.line-green-photo').css('display','none');

    });
    
    $('#VideosNormal').click(function(){
        $('.content-profile').hide();
        $('.content-photo').hide();
        $('.line-green-photo').hide();
        $('.content-photo-private').hide();
        $('.line-green-photo-pravite').hide();
        $('.content-video').show();
        $('.line-green-video').css('display','block');
    });
    
    $('#PhotoPrivate').click(function(){
        $('.content-profile').hide();
        $('.content-photo').hide();
        $('.content-video').hide();
        $('.line-green-photo').hide();
        $('.line-green-photo-pravite').hide();
        $('.line-green-video').hide();
        $('.content-photo-private').show();
        $('.line-green-photo-pravite').css('display','block');
    });
    
    /***Update Profile****/
    
    /*Education*/
    $('#id-education').click(function(){
        if ($('#form-education').is(':hidden')) {
            $('#form-education').show();
            $('#value-education').hide();
        }else{
            $('#form-education').hide();
            $('#value-education').show();
        }
    });
    
    $('#cancel-education').click(function(){
        $('#form-education').hide();
        $('#value-education').show();
    });
    
    /*Religion*/
    $('#id-religion').click(function(){
        if ($('#form-religion').is(':hidden')) {
            $('#form-religion').show();
            $('#value-religion').hide();
        }else{
            $('#form-religion').hide();
            $('#value-religion').show();
        }
    });
    
    $('#cancel-religion').click(function(){
        $('#form-religion').hide();
        $('#value-religion').show();
    });
    
    /*Ethnicity*/
    $('#id-ehtnicity').click(function(){
        if ($('#form-ehtnicity').is(':hidden')) {
            $('#form-ehtnicity').show();
            $('#value-ehtnicity').hide();
        }else{
            $('#form-ehtnicity').hide();
            $('#value-ehtnicity').show();
        }
    });
    
    $('#cancel-ehtnicity').click(function(){
        $('#form-ehtnicity').hide();
        $('#value-ehtnicity').show();
    });
    
    /*Height*/
    $('#id-height').click(function(){
        if ($('#form-height').is(':hidden')) {
            $('#form-height').show();
            $('#value-height').hide();
        }else{
            $('#form-height').hide();
            $('#value-height').show();
        }
    });
    
    $('#cancel-height').click(function(){
        $('#form-height').hide();
        $('#value-height').show();
    });
    
    /*Passion*/
    $('#id-passion').click(function(){
        if ($('#form-passion').is(':hidden')) {
            $('#form-passion').show();
            $('#value-passion').hide();
        }else{
            $('#form-passion').hide();
            $('#value-passion').show();
        }
    });
    
    $('#cancel-passion').click(function(){
        $('#form-passion').hide();
        $('#value-passion').show();
    });
    
    /*Goal*/
    $('#id-goal').click(function(){
        if ($('#form-goal').is(':hidden')) {
            $('#form-goal').show();
            $('#value-goal').hide();
        }else{
            $('#form-goal').hide();
            $('#value-goal').show();
        }
    });
    
    $('#cancel-goal').click(function(){
        $('#form-goal').hide();
        $('#value-goal').show();
    });
    
    /*Smoke*/
    $('#id-smoke').click(function(){
        if($('#form-smoke .rangeslider').css('opacity') == 0) {
            $('#form-smoke .rangeslider').css('opacity','1');
            $('.btn-ranges-sm').show();
            $('#value-smoke').hide();
        }else{
            $('#form-smoke .rangeslider').css('opacity','0');
            $('.btn-ranges-sm').hide();
            $('#value-smoke').show();
        }
    });
    
    $('#cancel-smoke').click(function(){
        $('#form-smoke .rangeslider').css('opacity','0');
        $('.btn-ranges-sm').hide();
        $('#value-smoke').show();
    });
    
    /*Drink*/
    $('#id-drink').click(function(){
        if($('#form-drink .rangeslider').css('opacity') == 0) {
            $('#form-drink .rangeslider').css('opacity','1');
            $('.btn-ranges-dr').show();
            $('#value-drink').hide();
        }else{
            $('#form-drink .rangeslider').css('opacity','0');
            $('.btn-ranges-dr').hide();
            $('#value-drink').show();
        }
    });
    
    $('#cancel-drink').click(function(){
        $('#form-drink .rangeslider').css('opacity','0');
        $('.btn-ranges-dr').hide();
        $('#value-drink').show();
    });
    /*Excercise*/
    $('#id-excercise').live('click',function(){
        if($('#form-excercise .rangeslider').css('opacity') == 0) {
            $('#form-excercise .rangeslider').css('opacity','1');
            $('.btn-ranges-ex').show();
            $('#value-excercise').hide();
        }else{
            $('#form-excercise .rangeslider').css('opacity','0');
            $('.btn-ranges-ex').hide();
            $('#value-excercise').show();
        }
    });
    
    $('#cancel-excercise').click(function(){
        $('#form-excercise .rangeslider').css('opacity','0');
        $('.btn-ranges-ex').hide();
        $('#value-excercise').show();
    });
    
    /*Children*/
    $('#id-children').click(function(){
        if ($('#form-children').is(':hidden')) {
            $('#form-children').show();
            $('#value-children').hide();
        }else{
            $('#form-children').hide();
            $('#value-children').show();
        }
    });
    
    $('#cancel-children').click(function(){
        $('#form-children').hide();
        $('#value-children').show();
    });
    
    /*about*/
    $('#id-about').click(function(){
        if ($('#form-about').is(':hidden')) {
            $('#form-about').show();
            $('#value-about').hide();
        }else{
            $('#form-about').hide();
            $('#value-about').show();
        }
    });
    
    $('#cancel-about').click(function(){
        $('#form-about').hide();
        $('#value-about').show(); 
    });
    
    /*diet*/
    $('#id-diet').click(function(){
        if ($('#form-diet').is(':hidden')) {
            $('#form-diet').show();
            $('#value-diet').hide();
        }else{
            $('#form-diet').hide();
            $('#value-diet').show();
        }
    });
    
    $('#cancel-diet').click(function(){
        $('#form-diet').hide();
        $('#value-diet').show(); 
    });
    
    /*Gym*/
    $('#id-gym').click(function(){
        if ($('#form-gym').is(':hidden')) {
            $('#form-gym').show();
            $('#value-gym').hide();
        }else{
            $('#form-gym').hide();
            $('#value-gym').show();
        }
    });
    
    $('#cancel-gym').click(function(){
        $('#form-gym').hide();
        $('#value-gym').show(); 
    });
    
    /*All header*/
    $('#id-gender').click(function(){
        if ($('#form-gender').is(':hidden')) {
            $('#form-gender').show();
            $('#value-gender').hide();
        }else{
            $('#form-gender').hide();
            $('#value-gender').show();
        }
    });
    
    $('#cancel-gender').click(function(){
        $('#form-gender').hide();
        $('#value-gender').show();
    });

    setInterval(function(){
        $.get('/index/checkTimeout', function(result) {
            if (result == lastest_visit) {
                 /*$('#messLogout').modal('show');
                 $('#messLogout').modal();*/
                setTimeout(function(){window.location.href="/user/logout"},10000);
            }
            else
                lastest_visit = result;
        });
    },600000);
    /* Post custom questions */
    $('.post-question').click(function(){

        var answer = $('#answer').val();
        var question = $('#question').val();
        if(answer =='' || question ==''){
            alert('Please ensure the question and answer is filled out.');
        }else if(answer.length > 35){
            alert('Please ensure the length answer smaller than 35 character.!');
        }else if(question.length > 35){
            alert('Please ensure the length question smaller than 35 character.!');
        }else{
            $('#question-custom-form').hide();
            $.get('/user/addQuestions?question='+question+'&answer='+answer,function(data){
                /**Reset Form Add New**/
                $('#question').attr('value', '');
                $('#answer').attr('value', '');
                /**Appen html**/
                var html = '<div class="content-bit" id="content-question-default_' + data + '">';
                    html+= '    <span class="what" id="sentence_question_'+ data +'">'+ question +'</span>';
                    html+= '    <span class="note-span note_default_question" data-id="'+ data +'"></span>';
                    html+= '    <span class="godfather answer_'+ data +'" data-id="'+ data +'" >'+ answer +'</span>';
                    html+= '    <div id="question_'+ data +'" style="display: none;">';
                    html+= '    <input type="text" value="'+ question +'" class="form-control" id="user_question_'+ data +'"/>';
                    html+= '    <br>';
                    html+= '    <textarea class="form-control" id="user_answer_'+ data +'" name="answer"> '+ answer +' </textarea>';
                    html+= '    <span class="my-btn">';
                    html+= '    <input type="submit" value="Save" class="saveAnswer" data-id="'+ data +'" />';
                    html+= '    <span class="text-cancel q_default_delete deleteAnswer" data-id="'+ data +'">Delete</span>';
                    html+= '    <span class="text-cancel q_default_cancel" data-id="'+ data +'">Cancel</span>';
                    html+= '    </span></div></div>';
                
                $('.all-question').append(html);
            });
        }
    });

    /*Upload public photo*/
    $('.public-photo').click(function(){
       $('#public_photo').modal('show');
    })
    /*Upload Private photo*/
    $('.private-photo').click(function(){
        $('#private_photo').modal('show');
    })

    /**Report user**/
    $('.report-user').live('click' ,function(){
        var result = $(this).attr("data-id");
        var substr = result.split("_");
        var id = substr[0];
        var achievements_id = substr[1];
        var avatar = $('#avatar_hidien_'+id).val();
        var username = $('#name_hidien_'+id).val();
        console.log(achievements_id);
        $('#IdOfUser').val(id);
        $('#my_username').text(username);
        $('#ReportUser .agreed input').addClass('checked_'+id);
        $('#ReportUser textarea').val('');
        $('#achievements_id').val(achievements_id);     
        showImageReport(avatar);
    })
    
    /** Chat System **/
    $('.chat-system').live('click', function(){
        var infor = $(this).attr("data-id");
        var infor_common   = infor.split('--');
        $('.my-report').attr('data-id',infor_common[1]);
        $('.username-chat-system').text(infor_common[1]);
        showImageChatSystem(infor_common[2]);
    });

    function showImageChatSystem(name_image){
        if (name_image == '' || name_image == 'undefined' ){
            $('#WantToChat img').attr('src', '/themes/default/images/no-avatar.png');
        }else{
            $('#WantToChat img').attr('src', '');
            $('#WantToChat img').attr('src', '/uploads/avatar/'+ name_image);
        }
    }

    /**Send Message**/
    $('.message').live('click' ,function(){
        var id = $(this).attr("data-id");
        var avatar = $('#avatar_hidien_'+id).val();
        var username = $('#name_hidien_'+id).val();
        $('#SendaMessage').val(id);
        $('.user-kaka').text(username);
        $('#SendaMessage .agreed input').addClass('checked_'+id);
        $('#SendaMessage textarea').val('');
        showImageSendMessage(avatar);
    })
    
    function showImageReport(name_image){
        if ( name_image == '' || name_image == 'undefined' ){
                $('#ReportUser img').attr('src', '/themes/default/images/no-avatar.png');
        }else{
            $('#ReportUser img').attr('src', '');
            $('#ReportUser img').attr('src', '/uploads/avatar/'+ name_image);
        }
     }
     
     function showImageSendMessage(name_image){
        if ( name_image == '' || name_image == 'undefined' ){
                $('#SendaMessage img').attr('src', '/themes/default/images/no-avatar.png');
        }else{
            $('#SendaMessage img').attr('src', '');
            $('#SendaMessage img').attr('src', '/uploads/avatar/'+ name_image);
        }
     }
     
     $('#ReportedUser').live('click',function(){
        var type_report = $('#type_report').val();
        var user = $('#IdOfUser').val();
        var checked = $('.checked_'+user).attr('checked');
        var comment_report = $('#comment_report').val();
        var achievements_id = $("#achievements_id").val();      
        
        if(type_report =='' || comment_report =='' || checked != 'checked' ){
            alert('Please ensure the comment, type report and checkbox is filled out.');
        }else if(type_report.length == null){
            alert('Please ensure the type report is selected.');
        }else if(comment_report.length > 25){
            alert('Please ensure the comment is sorter 25 character.');
        }else {
            $('#ReportUser').modal('hide');
            $.get('/user/reportUser?type='+type_report+'&comment='+comment_report+'&user='+user+'&achievements_id='+achievements_id ,function(data){
                /**Reset Form Add New**/
                $('#type_report').attr('value', '');
                $('#comment_report').attr('value', '');
                $('#IdOfUser').attr('value', '');
                location.reload();
            });
        }
     })
     
     $('.UnlockUser').live('click', function(){
        var id = $(this).attr("data-id");
        $.get('/user/unlockUser?id='+id ,function(data){
            $('#unlock_'+id).hide();
        });
     });
     
     $('.setting-detail .btn-block-list').live('click', function(){
        var text = $('.ui-autocomplete-input').val();
        if(text == ''){
            alert('Please ensure the user name is filled out.');
        }else{
            $.get('/user/addBlocked?user='+text, function(data){
                var text = $('.ui-autocomplete-input').val('');
                $('.locklist ul').append(data);
            });
        }
     });
     
     
     $('.rate_user_profile').live('click', function(){
        var id = $(this).attr("data-id");
        var avatar = $('#other_photo_'+id).val();
        var username = $('#other_name_'+id).val();
        $('#RateUser .user-kaka').text(username);
        showImageRate(avatar);
    })
    
    function showImageRate(name_image){
        if ($('#RateUser .dis_img').attr('src') == ''){
                $('#RateUser .dis_img').attr('src', '/uploads/avatar/'+ name_image);
        }else{
            $('#RateUser .dis_img').attr('src', '');
            $('#RateUser .dis_img').attr('src', '/uploads/avatar/'+ name_image);
        }
     }
     
     $('#close_rate').live('click', function(){
        $('#RateUser').modal('hide');
     });

    $('.save-search-func').live('click', function(){
            var username        = $('.username').val();
            var gender          = $('#gender').val();
            var age_start       = $('.age_start').val();
            var age_end         = $('.age_end').val();
            var within_start    = $('.within_start').val();
            var within_end      = $('.within_end').val();
        if( username !='' || gender != -1 || age_start != '' || age_end != '' || within_start != '' || within_end != '' ){
            $.get('/user/saveSearch?username='+username+'&gender='+gender+'&age_start='+age_start+'&age_end='+age_end+'&within_start='+within_start+'&within_end='+within_end ,function(data){
                $('#save_search_modal').modal('show');
            });
        }
    });

    $('.save-search-advance-new').live('click', function(){
            var username         = $('.username').val();
            var gender           = $('#gender').val();
            var age_start        = $('.age_start').val();
            var age_end          = $('.age_end').val();
            var within_start     = $('.within_start').val();
            var miles            = $('.miles').val();
            var height_start     = $('.height_start').val();
            var height_end       = $('.height_end').val();
            var education        = $('.ss_education').val();
            var race             = $('.race').val();
            var faith            = $('.faith').val();
            var kids             = $('.kids').val();
            var exercise_level   = $('.exercise_level').val();
            var drinking_level   = $('.drinking_level').val();
            var smoking_level    = $('.smoking_level').val();
            var ss_online        = $('.ss_online').val();
            var ss_verified      = $('.ss_verified').val();
        if( username !='' || gender != -1 || age_start != '' || age_end != '' || within_start != '' || miles != '' || height_start != '' || height_end != '' || education != '' || race != '' || faith != '' || kids != '' || exercise_level != '' || drinking_level != '' || smoking_level != '' || ss_online != '' || ss_verified != '' ){
            $.get('/user/saveSearchAdvanced?username='+username+'&gender='+gender+'&age_start='+age_start+'&age_end='+age_end+'&within_start='+within_start+'&miles='+miles+'&height_start='+height_start+'&height_start='+height_start+'&height_end='+height_end+'&education='+education+'&race='+race+'&faith='+faith+'&kids='+kids+'&exercise_level='+exercise_level+'&drinking_level='+drinking_level+'&smoking_level='+smoking_level+'&ss_online='+ss_online+'&ss_verified='+ss_verified ,function(data){
                $('#save_search_modal').modal('show');
            });
        }
    });
     
     $('.upvote').click(function(){
        var id = $(this).attr('data-id');
        $.get('/user/checkVote?id='+id+'&type=1' ,function(data){
            console.log(data);
            if(data == 'true'){
                $.get('/user/updateVote?id='+id+'&type=1' ,function(txt){
                    $('.change_vote_'+id).text(txt);
                    //$(this).css('background-image', 'none');
                    $('#downvote_'+id).css('background-image','url(/themes/default/images/downvote.png)');
                    $('#upvote_'+id).css('background-image', 'url(/themes/default/images/upvote.png)')
                });
            }
        });
     });
     
     $('.downvote').click(function(){
        var id = $(this).attr('data-id');
        $.get('/user/checkVote?id='+id+'&type=0' ,function(data){
            console.log(data);
            if(data == 'true'){
                $.get('/user/updateVote?id='+id+'&type=0' ,function(txt){
                    $('.change_vote_'+id).text(txt);
                    $('#upvote_'+id).css('background-image', 'url(/themes/default/images/grey_arrows.png)');
                    $('#downvote_'+id).css('background-image', 'url(/themes/default/images/red_arrows.png)')
                });
            }
        });
        
     });
});
