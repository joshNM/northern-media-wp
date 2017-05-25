$(document).ready(function(){

    // NEWS MATCH HEIGHT
    $('#latest-news .latest-news-inner').matchHeight();


    // MAP JS
    $('.map-container').click(function(){
        $(this).find('iframe').addClass('clicked')}).mouseleave(function(){
        $(this).find('iframe').removeClass('clicked')
    });

    // SERVICE NAV
    $('.menu-item-86').click(function(event){
        console.log('Clicked');
        event.preventDefault();
        $('#services-nav').slideToggle();
    })

})