		<script type="text/javascript">
			//MDN PolyFil for IE8 (This is not needed if you use the jQuery version)
			if (!Array.prototype.forEach){
				Array.prototype.forEach = function(fun /*, thisArg */){
				"use strict";
				if (this === void 0 || this === null || typeof fun !== "function") throw new TypeError();
				
				var
				t = Object(this),
				len = t.length >>> 0,
				thisArg = arguments.length >= 2 ? arguments[1] : void 0;

				for (var i = 0; i < len; i++)
				if (i in t)
					fun.call(thisArg, t[i], i, t);
				};
			}
		</script>
<?php /*
<div class="row-fluid"><div class="span12">
	<div class="row-form clearfix">
		<div class="span3"><?php echo Yii::t('global', "Change image"); ?> </div>
        <div class="span9"> 
            <?php $type_images = array('1'=>'Header Currency', '2'=>'Header Search', '3'=>'Header Menu', '4'=>'Main banner' ); ?>
            <select name="type_image" id="change_image">
                <?php 
                foreach ( $type_images as $key=>$val ) {  
                ?>    
                    <option value="<?php echo $key; ?>" > <?php echo $val; ?> </option>
                <?php } ?>   
            </select> 
        </div>
   </div>
   <div class="row-form clearfix">
        <div class="span3"></div>
        <div class="span9" id="view_image"></div>
   </div>
              
<div class="head clearfix">
    <div class="isw-grid"></div>
    <h1><?php echo Yii::t('global', 'Preview'); ?></h1>                           
</div>  

 */ ?>
    <iframe id="myIframe" src="../../index.php" width="100%" style="border: none;">
</iframe>


<?php /* </div></div> */ ?> 
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/iframeResizer.min.js' ); ?>
		<script type="text/javascript">

			iFrameResize({
				log                     : true,                  // Enable console logging
				enablePublicMethods     : true,                  // Enable methods within iframe hosted page
				resizedCallback         : function(messageData){ // Callback fn when message is received
					$('p#callback').html(
						'<b>Frame ID:</b> '    + messageData.iframe.id +
						' <b>Height:</b> '     + messageData.height +
						' <b>Width:</b> '      + messageData.width + 
						' <b>Event type:</b> ' + messageData.type
					);
				}
			});

            //$('#change_image').change(function(){
//                $.get('/admin/themes/load?id=' + this.value, function(reponse){
//                    $('#view_image').html('<img src="/themes/default/images/'+reponse+'" style="border: 1px solid #000;">')
//                })
//            });
//
		</script>
  <?php  
array(   
  'bg_currency' => 
    array(
        'title' => 'Background Currency',
        'type'  => 'image',
          'value' => 'top-head.png',
          'description' => 'w: 1000px - h: 32px',
      ),
  'bg_search' => 
    array(
      'title'   => 'Background Search',
      'type'    => 'image',
      'value'   => 'midle-header.png',
      'description' => 'w: 1000px - h: 51px',
      ),
  'call24h' => 
    array(
      'title' => 'Support header image',
      'type' => 'image',
      'value' => 'logo.png',
      'description' => 'w: 116px - h: 38px',
    ),
  'bg_menu' => 
    array(
      'title' => 'Background Menu',
      'type' =>  'image',
      'value' => 'bottom-header.png',
      'description' => 'w: 1000px - h: 74px',
      ),
  'main_banner' => 
    array(
      'title' => 'Header Image',
      'type' =>  'image',
      'value' =>  'mainbanner.jpg',
      'description' => 'w: 1000px - h: 238px',
      ),
  );
  
  ?>