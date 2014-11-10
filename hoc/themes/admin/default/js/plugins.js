
$(document).ready(function(){
		
	// SELECT2       
	jQuery("#s2_1").select2();
	jQuery("#s2_2").select2();

	//FANCYBOX
	jQuery('.fancybox').fancybox();

    // CHECKBOXES AND RADIO
    jQuery(".control-group").find("input:checkbox, input:radio, input:file, select").uniform()    

    //check cattegory uniform-multiselect validate
    jQuery(".btncheckcat").click(function(){
		jQuery(".cat-require ul.select2-choices").not("li.select2-search-choice").addClass( "validateitem" );	
	});
	jQuery('.cat-require ul.select2-choices').bind("DOMNodeInserted DOMNodeRemoved",function(){
	  jQuery(".cat-require ul.select2-choices").has("li.select2-search-choice").removeClass( "validateitem" );	
	});

	jQuery("#Videos_video").change(function(){
		jQuery("#uniform-Videos_video .parsley-error-list").hide();
	});

});
