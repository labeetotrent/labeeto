
// Initialize the plugin with no custom options
$(document).ready(function() {
    $("#mixedContent").smoothDivScroll({
        autoScrollingMode: "onStart",
        autoScrollingStep: 1,
        manualContinuousScrolling: true,
        hiddenOnStart: false
    });
    $("#mixedContent .contentBox").on('hover', function(){
        $("#mixedContent").smoothDivScroll("stopAutoScrolling");
    });
});