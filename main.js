$(document).ready(function(){

    // NEWS MATCH HEIGHT
    $('#latest-news .latest-news-inner').matchHeight();
    $('#employee-news .col-md-4').matchHeight();
    $('.Faq').matchHeight();

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

    // FAQ Click
    $('.Faq').click(function(){
      console.log('click')
      $(this).find('.Faq__answer').slideToggle();
    })

    // PROJECTS FILTER ============================================================================================== //
    $('#case-nav li').click(function(){
      var placeToAddCase = $('#projects-grid');
      // Get type clicked
      var caseType = $(this).attr('class');

      var casedata = {
        action: 'filterProj',
        type: caseType,
      }

       $.ajax({
            url: ajax_url.ajax_url,
            data: casedata,
            beforeSend: function() {
              placeToAddCase.empty();
              $('#projects-grid').append('<div class="loader">Loading...</div>');
            },
            success: function(response) {
                console.log(response);
                $('.loader').remove();
                placeToAddCase.empty();
                for (var i = 0; i < response.length; i++) {
                  html = "<a href='" + response[i].permalink +"' class='C-project' style='background: url("+ response[i].feat_image +")'>";
                  html += "<div class='overlay'>";
                  html += "<h2>"+ response[i].title +"</h2>";
                  html += "<div><img class='svg' style='height: 50px; width: 50px;' src='"+ response[i].icon +"'></div>"
                  html += "</div></a><div style='clear: both;></div>'";
                  placeToAddCase.append(html);
                }
                
            }
        });
    });
});