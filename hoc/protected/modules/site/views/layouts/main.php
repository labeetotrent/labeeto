<!DOCTYPE html>
<html>
<head>
    <title>Labeeto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <!-- css3-mediaqueries.js for IE less than 9 -->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- Bootstrap -->
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/reset.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/style.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/validationEngine.jquery.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/rangejs/rangeslider.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.placeholder.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

</head>
<body >
<div id="dvLoading"></div>
<div id="wrapper" style="-ms-behavior: url('http://hoc.labeeto.com/backgroundsize.min.htc');">
    <header class="clearfix">
        <?php $this->renderPartial('../elements/header'); ?>
    </header>
    <main class="container" id="content">
        <?php echo $content ?>

    </main>



    <footer class="clearfix">
        <?php echo $this->renderPartial('../elements/footer') ?>
    </footer>


<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/modernizr-latest.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/app.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine-en.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.session.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/oauthpopup.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/rangejs/rangeslider.min.js' ?>"></script>
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
        $(window).load(function(){
            $('#dvLoading').fadeOut(2000);
        });
        $('input').placeholder();

        function initialize() {
            $.session.clear();
            var options = {
                types: ['(cities)']
            };
            var map = new google.maps.Map(document.getElementById('maps-test'));
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