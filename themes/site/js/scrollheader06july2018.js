$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});

$(document).ready(function(){
  $(".main_logo").show();
  $(".logo-hide").hide();
  $(".nav_search").hide();
  $("span.icon-bar.non-trans").hide();
  $('.non-trans').hide();
  $('.trans').show();
  $('.nav_search').hide();

});

$(window).scroll(function() {
    
    if ($(this).scrollTop()>90)
     {
        $('.trans').hide();
        $('.non-trans').show();
        $('.main_logo').hide();
      $(".logo-hide").show();
      $('.nav_search').show();
      // $('.index_search').hide();
     }
    else
     {
      $('.non-trans').hide();
      $('.trans').show();
    $(".logo-hide").hide();
    $('.main_logo').show();
    $('.index_search').show();
    $('.nav_search').hide();
     }
 }); 