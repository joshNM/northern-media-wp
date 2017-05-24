$(document).ready(function(){

    // NEWS MATCH HEIGHT
    $('#latest-news .latest-news-inner').matchHeight();


    // MAP JS
    $('.map-container').click(function(){
        $(this).find('iframe').addClass('clicked')}).mouseleave(function(){
        $(this).find('iframe').removeClass('clicked')
    });

})