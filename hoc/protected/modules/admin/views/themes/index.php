  <div class="span3 left_customize_theme"> 
             <form id="form-sitetemplates" action="/admin/siteTemplates/update?id=<?php echo $site_theme->id; ?>" method="post" enctype="multipart/form-data">
                 <div class="span12 button_left_customize"> 
                        <div class="row-fluid">
                            <div class="span1"></div>
                            <div class="span4">
                                <button class="btn_close" type="button"> <?php echo Yii::t('global','Close'); ?>  </button> 
                            </div>
                            <div class="span2"></div>
                            <div class="span5">
                                <input class="btn btn-primary" type="submit" value="<?php echo Yii::t('global','Save & Publish'); ?>"/>
                            </div>
                        </div>       
        </div>
<div class="span12 full-overlay-sidebar">
<div class="row-fluid">
 <div class="panel-group" id="accordion">
 
  <div class="panel panel-default">
    <div class="panel-heading-fix">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <div class="you_are_previewing"> <?php echo Yii::t('global','You are previewing'); ?> </div>
            <div class="name_theme_customize"> <?php echo $site_theme->name; ?> </div>
        </a>
      </h4>
    </div>
    <?php 
        $customizes_array                       = unserialize($site_theme->settings);
        Yii::app()->session['data_customize']   = $customizes_array;
    ?>
    <input type="hidden" name="SiteTemplates[setttings]" value=""/>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
            <img src="/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $site_theme->screenshot; ?>" width="95%" class="screenshot-img">
            <div class="you_are_previewing"> <?php echo $site_theme->name.' '.Yii::t('global','themes'); ?> </div>
            
            <div > <input type="file" name="SiteTemplates[screenshot]" value="" /> </div>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading-fix">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_Color">
            <?php echo Yii::t('global','Background Color'); ?> 
        </a>
      </h4>
    </div>
    <div id="collapse_Color" class="panel-collapse collapse in">
      <div class="panel-body">
        <?php 
            $this->widget('ext.SMiniColors.SColorPicker', array(
                    'id'            => 'bg-color-body',
                    'defaultValue'  => $site_theme->bg_color,
                    'hidden'        => false, 
                ));
        ?>
      </div>
    </div>
  </div>
  <?php
        foreach ( $customizes_array as $key=>$val ){
  ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $key; ?>" class="click_<?php echo $key; ?>">
                        <?php echo $val['title']; ?>
                    </a>
                  </h4>
                </div>
                <div id="collapse_<?php echo $key; ?>" class="panel-collapse collapse">
                  <div class="panel-body">
                         <div class="value-themes-default">
                         <img src="/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $val['value']; ?>">
                         </div>
                         <div class="value-description-themes"> <?php echo $val['description']; ?>  </div>
                         <div class="upload_file">
                         <?php Utils::getTypeCustomizeTheme( $val['type'], $key ); ?></div>
                  </div>
                </div>
              </div>
     <?php } ?>

</div>
</div>


                 </div> 
                </form> 
              </div>
             <div class="span9 right_customize_theme" style="margin: 0 !important; padding: 0 !important;"> <iframe id="myIframe" src="../../index.php" width="100%" style="border: none;"></iframe>  </div>

<script type="text/javascript">
        $('.btn_close').click(function(){
            window.location.href='/admin/appearance/admin';    
        });  
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
            
              $('.collapse').collapse('hide');
   $(function () {
    var active = true;
    $('#accordion').on('show.bs.collapse', function () {
        if (active){ 
            $('#accordion .in').collapse('hide');
        }
    });

    });
//   $( "#bg-color-body" ).bind('change', function(){
//         var bg = $( this ).val();
//        $("#myIframe").contents().find(".ctl_index").css("background", bg );
//    });
   
   $('#myIframe').load(function(){
        $("#myIframe").contents().find(".currency").css('background-image', "url('/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $customizes_array['bg_currency']['value'] ?>')");
        $("#myIframe").contents().find(".byname").css('background-image', "url('/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $customizes_array['bg_search']['value'] ?>')");
        $("#myIframe").contents().find(".img-logo").attr('src', "/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $customizes_array['call24h']['value'] ?>");
        $("#myIframe").contents().find(".menu").css('background-image', "url('/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $customizes_array['bg_menu']['value'] ?>')");
        $("#myIframe").contents().find(".main-banner").css('background-image', "url('/templates/<?php echo Utils::slugify_new( $site_theme->name );  ?>/<?php echo $customizes_array['main_banner']['value'] ?>')");
        $("#myIframe").contents().find(".ctl_index").css("background", "<?php echo $site_theme->bg_color ?>" );
    });
   
   $('.click_bg_currency').click(function(){
            $("#myIframe").contents().find(".currency").css("border", "1px solid blue");
            $("#myIframe").contents().find(".byname").css("border",'none');
            $("#myIframe").contents().find(".logo").css("border",'none');
            $("#myIframe").contents().find(".menu").css("border",'none');
            $("#myIframe").contents().find(".main-banner").css("border",'none');
   });
   $('.click_bg_search').click(function(){
            $("#myIframe").contents().find(".byname").css("border", "1px solid blue");
            $("#myIframe").contents().find(".currency").css("border",'none');
            $("#myIframe").contents().find(".logo").css("border",'none');
            $("#myIframe").contents().find(".menu").css("border",'none');
            $("#myIframe").contents().find(".main-banner").css("border",'none');
   });
   $('.click_call24h').click(function(){
            $("#myIframe").contents().find(".logo").css("border", "1px solid blue");
            $("#myIframe").contents().find(".currency").css("border",'none');
            $("#myIframe").contents().find(".byname").css("border",'none');
            $("#myIframe").contents().find(".menu").css("border",'none');
            $("#myIframe").contents().find(".main-banner").css("border",'none');
   });
   $('.click_bg_menu').click(function(){
            $("#myIframe").contents().find(".menu").css("border", "1px solid blue");
            $("#myIframe").contents().find(".currency").css("border",'none');
            $("#myIframe").contents().find(".byname").css("border",'none');
            $("#myIframe").contents().find(".logo").css("border",'none');
            $("#myIframe").contents().find(".main-banner").css("border",'none');
   });
   $('.click_main_banner').click(function(){
            $("#myIframe").contents().find(".main-banner").css("border", "1px solid blue");
            $("#myIframe").contents().find(".currency").css("border",'none');
            $("#myIframe").contents().find(".byname").css("border",'none');
            $("#myIframe").contents().find(".logo").css("border",'none');
            $("#myIframe").contents().find(".menu").css("border",'none');
   });       
            
</script>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/iframeResizer.min.js' ); ?>
<script type="text/javascript">
			iFrameResize({
			});
            
            
</script>