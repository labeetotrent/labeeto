$(document).ready(function(){
    /*var mySwiper = new Swiper('.swiper-container',{
        pagination: '.pagination',
        loop:true,
        grabCursor: true,
        paginationClickable: true
    })
    */
    var mySwiper = new Swiper('.swiper-container',{
        pagination: false,
        paginationClickable: true,
        centeredSlides: true,
        /*onSwiperCreated: function(){
            console.log('huh');
            $('.swiper-slide.swiper-slide-active').css('width','875px');
        }*/
    })

    $('.actionYes').on('click', function(e){
        e.preventDefault()
        mySwiper.swipeNext()
    })
    $('.actionNo').on('click', function(e){
        e.preventDefault()
        mySwiper.swipeNext()
    });
})

