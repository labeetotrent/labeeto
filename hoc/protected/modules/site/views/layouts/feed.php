<!DOCTYPE html>
<html>
<head>
    <title>Labeeto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <!-- Bootstrap -->
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/feed.css" rel="stylesheet">


    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/validationEngine.jquery.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/rangejs/rangeslider.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/blue/jplayer.blue.monday.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jwplayer.js"></script>
    
    
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/jPlayer/jquery.jplayer.min.js">
    <script type="text/javascript">jwplayer.key="YLh0EpQST8/bQUTi3GDUFWxfaIaeKorWSL5ihzmIxDSdoJDoz9fLSJZrt9g=";</script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <script type="text/javascript">
    function ratings( score, id){    
         $.get('/user/saveRating?score='+score+'&id='+id, function(html) {
            console.log(html);
        });
     }
    function ratings_post( score, id){    
         $.get('/user/saveVoting?score='+score+'&id='+id, function(html) {
            console.log(html);
        });
     }
     
    </script>
    
     
</head>
<body>
<div id="wrapper">
    <header class="clearfix ">
        <?php $this->renderPartial('../elements/header-feed'); ?>

    </header>
    <div class="container" id="content-feed">
        <?php echo $content ?>

    </div>



    <footer class="clearfix">
        <?php echo $this->renderPartial('../elements/footer-feed') ?>
    </footer>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.session.js' ?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/feed.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/profile.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine.js' ?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine-en.js' ?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/bootstrap.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/rangejs/rangeslider.min.js' ?>"></script>

<script type="text/javascript">
    $(".avartar").click(function(){
        $('#PopupImg').modal('show');
    });
</script>
    <script type="text/javascript">
        $(function() {

            var $document   = $(document),
                selector    = '[data-rangeslider]',
                $element    = $(selector);

            // Example functionality to demonstrate a value feedback
            function valueOutput(element) {
                var value = element.value,
                    output = element.parentNode.getElementsByTagName('output')[0];
                output.innerHTML = value;
            }
            for (var i = $element.length - 1; i >= 0; i--) {
                valueOutput($element[i]);
            };
            $document.on('change', 'input[type="range"]', function(e) {
                valueOutput(e.target);
            });

            // Example functionality to demonstrate disabled functionality
            $document .on('click', '#js-example-disabled button[data-behaviour="toggle"]', function(e) {
                var $inputRange = $('input[type="range"]', e.target.parentNode);

                if ($inputRange[0].disabled) {
                    $inputRange.prop("disabled", false);
                }
                else {
                    $inputRange.prop("disabled", true);
                }
                $inputRange.rangeslider('update');
            });

            // Example functionality to demonstrate programmatic value changes
            $document.on('click', '#js-example-change-value button', function(e) {
                var $inputRange = $('input[type="range"]', e.target.parentNode),
                    value = $('input[type="number"]', e.target.parentNode)[0].value;

                $inputRange.val(value).change();
            });

            // Example functionality to demonstrate destroy functionality
            $document
                .on('click', '#js-example-destroy button[data-behaviour="destroy"]', function(e) {
                    $('input[type="range"]', e.target.parentNode).rangeslider('destroy');
                })
                .on('click', '#js-example-destroy button[data-behaviour="initialize"]', function(e) {
                    $('input[type="range"]', e.target.parentNode).rangeslider({ polyfill: false });
                });

            // Basic rangeslider initialization
            $element.rangeslider({

                // Deactivate the feature detection
                polyfill: false,

                // Callback function
                onInit: function() {},

                // Callback function
                onSlide: function(position, value) {
                    console.log('onSlide');
                    console.log('position: ' + position, 'value: ' + value);
                },

                // Callback function
                onSlideEnd: function(position, value) {
                    console.log('onSlideEnd');
                    console.log('position: ' + position, 'value: ' + value);
                }
            });

        });

        function updateCheckStatus()
        {
            $.get('/user/checkStatusOnline', function() {

            });
        }
        setInterval("updateCheckStatus()", 10000);

        $('textarea').placeholder();
        <?php if(!Yii::app()->user->isGuest){ ?>
        var lastest_visit = '<?php echo Yii::app()->session['lastest_visit']; ?>'
        <?php } ?>

        function initialize() {
            $.session.clear();
            var options = {
                types: ['(cities)']
            };
            var map = new google.maps.Map(document.getElementById('maps-test-location'));
            var input = /** @type {HTMLInputElement} */(
                document.getElementById('address'));
            var autocomplete = new google.maps.places.Autocomplete(input,options);
            autocomplete.bindTo('bounds',map);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }
                // If the place has a geometry, then present it on a map.
                $.session.set('address',place.formatted_address);
                $.session.set('latitude',place.geometry.location.k);
                $.session.set('longitude',place.geometry.location.B);

            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</body>

</html>