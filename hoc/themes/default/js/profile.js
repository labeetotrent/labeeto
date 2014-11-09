$(document).ready(function(){
    /*Education*/
    $('#form-education').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveEducation',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-education').hide();
                $('#value-education').html(data);
                $('#value-education').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Religion*/
    $('#form-religion').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveReligion',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-religion').hide();
                $('#value-religion').html(data);
                $('#value-religion').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    
    /*Ethnicity*/
    $('#form-ehtnicity').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveEthnicity',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-ehtnicity').hide();
                $('#value-ehtnicity').html(data);
                $('#value-ehtnicity').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    
    /*Passion*/
    $('#form-passion').submit(function(e) {
        var passion = $('#passion').val().trim();
        if(passion.length > 35){
            alert('Please ensure the length fitness passion smaller than 35 character.!');
            return false;
        }
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SavePassion',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-passion').hide();
                $('#value-passion').html(data);
                $('#value-passion').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Goals*/
    $('#form-goal').submit(function(e) {
        var goals = $('#goals').val().trim();
        if(goals.length > 35){
            alert('Please ensure the length goals smaller than 35 character.!');
            return false;
        }
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveGoal',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-goal').hide();
                $('#value-goal').html(data);
                $('#value-goal').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Children*/
    $('#form-children').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveChildren',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-children').hide();
                $('#value-children').html(data);
                $('#value-children').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Height*/
    $('#form-height').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveHeight',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-height').hide();
                $('#value-height').html(data);
                $('#value-height').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Diet*/
    $('#form-diet').submit(function(e) {
        var diet = $('#diet').val().trim();
        if(diet.length > 35){
            alert('Please ensure the length diet smaller than 35 character.!');
            return false;
        }
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveDiet',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-diet').hide();
                $('#value-diet').html(data);
                $('#value-diet').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*About*/
    $('#form-about').submit(function(e) {
        var about = $('#about').val().trim();
        if(about.length > 50){
            alert('Please ensure the length about smaller than 50 character.!');
            return false;
        }
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveAbout',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-about').hide();
                $('#value-about').html(data);
                $('#value-about').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
     /*Excercise*/
    $('#form-excercise').submit(function(e) {
        $('.ajaxloader').show();
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveExcercise',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-excercise .rangeslider').css('opacity','0');
                $('.btn-ranges-ex').hide();
                $('.ajaxloader').hide();
                $('#value-excercise').html(data);
                $('#value-excercise').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
     /*Drink*/
    $('#form-drink').submit(function(e) {
        $('.ajaxloader').show();
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveDrink',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-drink .rangeslider').css('opacity','0');
                $('.btn-ranges-dr').hide();
                $('.ajaxloader').hide();
                $('#value-drink').html(data);
                $('#value-drink').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Smoke*/
    $('#form-smoke').submit(function(e) {
        $('.ajaxloader').show();
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveSmoke',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-smoke .rangeslider').css('opacity','0');
                $('.btn-ranges-sm').hide();
                $('.ajaxloader').hide();
                $('#value-smoke').html(data);
                $('#value-smoke').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /*Gym*/
    $('#form-gym').submit(function(e) {
        var gym = $('#gym').val().trim();
        if(gym.length > 35){
            alert('Please ensure the length gym membership smaller than 35 character.!');
            return false;
        }
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveGym',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-gym').hide();
                $('#value-gym').html(data);
                $('#value-gym').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    
    /*All header*/
    $('#form-gender').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/user/SaveGender',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#form-gender').hide();
                $('#value-gender').html(data);
                $('#value-gender').show();
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    /***********************************************************************/
                    /*******Menu Setting*******/
    $('.link-GeneralSettings').click(function(){
        $('.li-GeneralSettings a').css('border-bottom', '3px solid #5dc1ea');
        $('.li-SearchReferences a').css('border-bottom', 'none');
        $('.li-Notifications a').css('border-bottom', 'none');
        $('.li-Blocklist a').css('border-bottom', 'none');
        $('#SearchReferences').hide();
        $('#Notifications').hide();
        $('#Blocklist').hide();
        $('#GeneralSettings').show();
        
    });
    
    $('.link-SearchReferences').click(function(){
        $('.li-SearchReferences a').css('border-bottom', '3px solid #5dc1ea');
        $('.li-GeneralSettings a').css('border-bottom', 'none');
        $('.li-Notifications a').css('border-bottom', 'none');
        $('.li-Blocklist a').css('border-bottom', 'none');
        $('#GeneralSettings').hide();
        $('#Notifications').hide();
        $('#Blocklist').hide();
        $('#SearchReferences').show();
        
    });
    
    $('.link-Notifications').click(function(){
        $('.li-Notifications a').css('border-bottom', '3px solid #5dc1ea');
        $('.li-SearchReferences a').css('border-bottom', 'none');
        $('.li-GeneralSettings a').css('border-bottom', 'none');
        $('.li-Blocklist a').css('border-bottom', 'none');
        $('#SearchReferences').hide();
        $('#GeneralSettings').hide();
        $('#Blocklist').hide();
        $('#Notifications').show();
        
    });
    
    $('.link-Blocklist').click(function(){
        $('.li-Blocklist a').css('border-bottom', '3px solid #5dc1ea');
        $('.li-SearchReferences a').css('border-bottom', 'none');
        $('.li-GeneralSettings a').css('border-bottom', 'none');
        $('.li-Notifications a').css('border-bottom', 'none');
        $('#SearchReferences').hide();
        $('#Notifications').hide();
        $('#GeneralSettings').hide();
        $('#Blocklist').show();
        
    });
    /***********************************************************************/
    
    
    /*******************************Question custom****************************************/
    $('#question-custom').click(function(){
        if ($('#question-custom-form').is(':hidden')) {
            $('#question-custom-form').show();
        }else{
            $('#question-custom-form').hide();
        }
    });
    
    $('#cancel-question-custom').click(function(){
        $('#question-custom-form').hide();
    });
    
    /***********************************************************************/
    
    $('.note_default_question').live("click", function(){
        var id = $(this).attr("data-id");
        console.log(id);
        if ($('#question_'+ id).is(':hidden')) {
            $('.answer_'+ id).hide();
            $('#sentence_question_'+ id).hide();
            $('#question_'+ id).show();
        }else{
            $('#sentence_question_'+ id).show();
            $('.answer_'+ id).show();
            $('#question_'+ id).hide();
        }
        
    });
    
    $('.submit_answer_question').click(function(e){
        var id = $(this).attr("data-id");
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/answer/SaveAnswer/'+ id,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });
    
    
    $('.q_default_cancel').live("click",function(){
        var id = $(this).attr("data-id");
        $('.answer_'+ id).show();
        $('#sentence_question_'+ id).show();
        $('#question_'+ id).hide();
    });
    
    $('.double-spans').mouseover(function(){
        if ($('.popup_avavtar').is(':hidden')) {
            $('.popup_avavtar').css('display', 'block');
        }else{
            $('.popup_avavtar').hide();
        }
    })
    $('.double-spans').hover(function(){
        $('.popup_avavtar').css('display', 'block');
    });
    
    $('.double-spans').mouseout(function(){
        $('.popup_avavtar').hide();
    });
    $('.popup_avavtar').hover(function(){
        $(this).css('display', 'block');
    });
    
    $('#photo-new').change(function(e){
        $('#form-change-avatar').submit();
    });
    
    $('#form-change-avatar').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
        $('.avatar-up').addClass('loading');
        $('.avatar-up').html('');
            $.ajax({
                type:'POST',
                url: '/user/ChangeAvatar',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    console.log(data);
                    $('#ChangeAvatar').modal('hide');
                    if(data == 1){
                        alert('Invalid image format.');
                    }else{
                        location.assign('/profile');
                    }
                },
                error: function(data){
                    console.log("error");
                }
            });
        return false;
    });
    $('#photos').change(function(e){
        $('#form-photo').submit();
    });

    $('#form-photo').submit(function(e){

        e.preventDefault();
        var formData = new FormData(this);
        $('.photo-up').addClass('loading');
        $('.photo-up').html('');
        
        $.ajax({
            type:'POST',
            url: '/user/UploadPhoto',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#public_photo').modal('hide');
                if(data == 1){
                    alert('Invalid image format.');
                }else{
                    location.assign('/profile?type=photos');
                }
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });

    $('#private').change(function(e){
        $('#form-private').submit();
    });

    $('#form-private').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $('.private-up').addClass('loading');
        $('.private-up').html('');
        $.ajax({
            type:'POST',
            url: '/user/UploadPrivate',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
                $('#private_photo').modal('hide');
                if(data == 1){
                     alert('Invalid image format.');
                }else{
                    location.assign('/profile?type=private');
                }
            },
            error: function(data){
                console.log("error");
            }
        });
        return false;
    });

    /* Start Update question answer */
        $('.saveAnswer').click(function(){
            var result = $(this).attr('data-id');
            var substr = result.split("_");
            var check = substr[1];
            var id_question = substr[0];
            var question = $('#user_question_'+id_question).val().trim();
            var answer = $('#user_answer_'+id_question).val().trim();
            if(answer =='' || question ==''){
                alert('Please ensure the question and answer is filled out.');
            }else if(answer.length > 35){
                alert('Please ensure the length answer smaller than 35 character.!');
            }else if(question.length > 35){
                if(check == 0){
                    alert('Please ensure the length question smaller than 35 character.!');
                }else{
                    $.get('/user/updateQuestions?question='+question+'&answer='+answer+'&id='+id_question,function(data){
                        if(data!=0){
                            $('#question_' + id_question).hide();
                            $('.answer_'+ id_question).html(answer);
                            $('#sentence_question_'+id_question).html(question);
                            $('.answer_'+ id_question).show();
                            $('#sentence_question_'+id_question).show();
                        } else {
                            alert('Can not save answer. Please try again later');
                        }
    
                    });
                }
            }else {
                $.get('/user/updateQuestions?question='+question+'&answer='+answer+'&id='+id_question,function(data){
                    if(data!=0){
                        $('#question_' + id_question).hide();
                        $('.answer_'+ id_question).html(answer);
                        $('#sentence_question_'+id_question).html(question);
                        $('.answer_'+ id_question).show();
                        $('#sentence_question_'+id_question).show();
                    } else {
                        alert('Can not save answer. Please try again later');
                    }

                });
            }
        });

    /* End Update question answer */
    
    /* Start Delete question answer */
        $('.deleteAnswer').live("click",function(){
            var id_question = $(this).attr('data-id');
            $.get('/user/deleteQuestions?id='+id_question,function(data){
                if(data!=0){
                    $('#content-question-default_' + id_question).hide();
                } else {
                    alert('Delete question not successful. Please try again later');
                }

            });
        });

    /* End Delete question answer */
    
    $('.del-photo').live('click',function(){
        var photoID = $(this).attr('href');
        var type = $(this).attr('data-items');
        if (confirm('Are you sure you want to delete this photo?')){
            $.get('user/deletePhoto?id='+photoID,function(){
                location.assign('/profile?type='+type);
            })
        }
        return false;
    });
    function showModalTemp(name_image){
        if ($('.avartar img').attr('src') == ''){
                $('.avartar img').attr('src', '/uploads/avatar/'+ name_image);
        }else{
            $('.avartar img').attr('src', '');
            $('.avartar img').attr('src', '/uploads/avatar/'+ name_image);
        }
     }
     
     $('#video-new').change(function(e){
        $('#form-upload-video').submit();
     });
     $('#form-upload-video').submit(function(e){
         e.preventDefault();
            var formData = new FormData(this);
            $('.video-up').addClass('loading');
            $('.video-up').html('');
            $.ajax({
                type:'POST',
                url: '/user/UploadVideo',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#UploadVideo').modal('hide');
                    console.log(data);
                    if(data == 1){
                        alert('Invalid video format.');
                    }else{
                        location.assign('/profile?type=video');
                    }
                },
                error: function(data){
                    console.log("error");
                }
            });
            return false;
    });
    
    $('.favorite_user').click(function(){
        var user_id = $(this).attr('data-id');
        $.get('/user/saveFavorite?id='+user_id,function(data){
            if(data == 'exit'){
                alert("This user was in list your favorited");
            }else{
                alert("This user added to list your favorited");
                window.location.reload(true);
            }
        });
    });
    
    /*$('#InputEmail').blur(function(){
        var email = $(this).val();
        $.get('/user/checkEmailSetting?email='+email,function(data){
            if(data == 1){
                $('#error_InputEmail').css('display', 'block');
                $('#ok_InputEmail').css('display', 'none');
            }else{
                $('#ok_InputEmail').css('display', 'block');
                $('#error_InputEmail').css('display', 'none');
            }
        });
    });*/
    
    /*$('#InputPassword_2').blur(function(){
        var pass_1 = $(this).val();
        if(pass_1.length > 0){
            var re=/^[^\dA-Z]{1}[^A-Z]*(?=[^A-Z]{7,})(?=[^A-Z]*[a-z])(?=[^A-Z]*[\d])[^A-Z]*$/
            //var re=/^[^\d]{1}.*(?=.{8,})(?=.*[A-Za-z])(?=.*[\d]).*$/
            //var re = /^[a-z][a-z0-9]{7}$/i;
            var red=/^.*(?=.{4,20})(?=.*[A-Za-z]).*$/;
    
            var pw = re.exec(pass_1);
            if (!pw) {
                $('#error_InputPassword_2').css('display', 'block');
                $('#ok_InputPassword_2').css('display', 'none');
            }else{
                $('#ok_InputPassword_2').css('display', 'block');
                $('#error_InputPassword_2').css('display', 'none');
            }
        }
    })*/
    
    /*$('#InputPassword_3').blur(function(){
        var pass_3 = $(this).val();
        var pass_2 = $('#InputPassword_2').val();
        if((pass_3.length > 0) && (pass_2.length > 0)){
            if(pass_3 != pass_2){
                $('#error_InputPassword_3').css('display', 'block');
                $('#ok_InputPassword_3').css('display', 'none');
            }else{
                $('#ok_InputPassword_3').css('display', 'block');
                $('#error_InputPassword_3').css('display', 'none');
            }
        }
    });*/
    
    $('#save_general_settings').click(function(){
        
        var days = $('#days').val();
        var months = $('#months').val();
        var years = $('#years').val();
        var birthday = '';
        var change_pass = 0;
        var check_all = 0;
        
        if((days == $('#ss_days').val()) && (months == $('#ss_months').val()) && (years == $('#ss_years').val())){
            birthday = '';
        }else{
            birthday = years + '-' + months + '-' + days;    
        }   
    
        var email = $('#InputEmail').val().trim();
        var pass_1 = $('#InputPassword_1').val();
        var pass_2 = $('#InputPassword_2').val();
        var pass_3 = $('#InputPassword_3').val();
        
        if(email == $('#ss_email').val().trim()){
            email = '';
        }else{
            $.get('/user/checkEmailSetting?email='+email,function(data){
                if(data == 1){
                    $('#error_InputEmail').css('display', 'block');
                    $('#ok_InputEmail').css('display', 'none');
                    check_all = 1;
                    console.log(check_all);
                }else{
                    $('#ok_InputEmail').css('display', 'block');
                    $('#error_InputEmail').css('display', 'none');
                }
                console.log(check_all);
            });
        }
        return false;    
        if(pass_1.length > 0){
            $.get('/user/checkOldPass?pass='+pass_1,function(data){
                if(data == 1){
                    $('#error_InputPassword_1').css('display', 'block');
                    $('#ok_InputPassword_1').css('display', 'none');
                    $('#error_InputPassword_2').css('display', 'block');
                    $('#ok_InputPassword_2').css('display', 'none');
                    $('#error_InputPassword_3').css('display', 'block');
                    $('#ok_InputPassword_3').css('display', 'none');
                    check_all = 1;
                }else{
                    $('#ok_InputPassword_1').css('display', 'block');
                    $('#error_InputPassword_1').css('display', 'none');
                    
                    /** Check pass new **/
                    if(pass_2.length > 0){
                        var re=/^[^\dA-Z]{1}[^A-Z]*(?=[^A-Z]{7,})(?=[^A-Z]*[a-z])(?=[^A-Z]*[\d])[^A-Z]*$/;
                        var red=/^.*(?=.{4,20})(?=.*[A-Za-z]).*$/;
                
                        var pw = re.exec(pass_2);
                        if (!pw) {
                            $('#error_InputPassword_2').css('display', 'block');
                            $('#ok_InputPassword_2').css('display', 'none');
                            $('#error_InputPassword_3').css('display', 'block');
                            $('#ok_InputPassword_3').css('display', 'none');
                            check_all = 1;
                        }else{
                            $('#ok_InputPassword_2').css('display', 'block');
                            $('#error_InputPassword_2').css('display', 'none');
                            
                            /** Check pass confirm **/
                            if(pass_3.length > 0){
                                if(pass_3 != pass_2){
                                    $('#error_InputPassword_3').css('display', 'block');
                                    $('#ok_InputPassword_3').css('display', 'none');
                                    check_all = 1;
                                }else{
                                    $('#ok_InputPassword_3').css('display', 'block');
                                    $('#error_InputPassword_3').css('display', 'none');
                                    change_pass = 1;
                                }
                            }else{
                                check_all = 1;
                            }
                        }
                    }else{
                        check_all = 1;
                    }
                }
            });
        }
        
        if(change_pass == 0)
            pass_3 = '';
        
        var zipcode = $('#Zipcode').val();
        if(zipcode == $('#ss_zipcode').val().trim()){
            zipcode = '';
        }else{
            var intRegex = /^\d+$/;
            var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
            if(zipcode.length > 0){
                if(intRegex.test(zipcode) || floatRegex.test(zipcode)){
                    $('#ok_Zipcode').css('display', 'block');
                    $('#error_Zipcode').css('display', 'none');
                }else{
                    $('#error_Zipcode').css('display', 'block');
                    $('#ok_Zipcode').css('display', 'none');
                    check_all = 1;
                }
                
            }
        }
        
        
        var CitySuburb = $('#address_setting').val().trim();
        if(CitySuburb != $('#ss_address').val().trim())
            CitySuburb = '';
        
        if(check_all == 0){
            $.get('/user/settingGeneral?birthday='+birthday+'&email='+email+'&pass='+pass_3+'&zipcode='+zipcode+'&address='+CitySuburb,function(data){
                
           });
        }
        
       //location.reload(true);
    })
    
    $("#question").on('input', function(){
        var question_lenght = $("#question").val().trim().length;
        if(question_lenght < 36)
            $('#question-count').html('You have ' + (35 - question_lenght) + ' characters remaining');
        else
            alert('Please ensure the length question smaller than 35 character.!');
    })
    
    $('#answer').on('input', function(){
        var answer_lenght = $('#answer').val().trim().length;
        if(answer_lenght < 36)
            $('#answer-count').html('You have ' + (35 - answer_lenght) + ' characters remaining');
        else
            alert('Please ensure the length answer smaller than 35 character.!');
    })
    
    $('#passion').on('input', function(){
        var passion_lenght = $('#passion').val().trim().length;
        if(passion_lenght < 36)
            $('#passion-count').html('You have ' + (35 - passion_lenght) + ' characters remaining');
        else
            alert('Please ensure the length answer smaller than 35 character.!');
    })
    
    $('#gym').on('input', function(){
        var diet = $('#gym').val().trim().length;
        if(gym_lenght < 36)
            $('#gym-count').html('You have ' + (35 - gym_lenght) + ' characters remaining');
        else
            alert('Please ensure the length answer smaller than 35 character.!');
    })
    
    $('#diet').on('input', function(){
        var diet_lenght = $('#diet').val().trim().length;
        if(diet_lenght < 36)
            $('#diet-count').html('You have ' + (35 - diet_lenght) + ' characters remaining');
        else
            alert('Please ensure the length answer smaller than 35 character.!');
    })
    
    $('#goals').on('input', function(){
        var about = $('#goals').val().trim().length;
        if(goal_lenght < 36)
            $('#goals-count').html('You have ' + (35 - goal_lenght) + ' characters remaining');
        else
            alert('Please ensure the length answer smaller than 35 character.!');
    })
    
    $('#about').on('input', function(){
        var about_lenght = $('#about').val().trim().length;
        if(about_lenght < 51)
            $('#about-count').html('You have ' + (50 - about_lenght) + ' characters remaining');
        else
            alert('Please ensure the length answer smaller than 50 character.!');
    })
});