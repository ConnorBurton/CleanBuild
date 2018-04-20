$(document).ready(function(){

  // Run fancybox if it is added to the site
  if ( $.isFunction($.fn.fancybox) ) {
    $("a.fancybox").fancybox();
  }

  // Mobile menu toggle code
  $('#mob-toggle, .darkness').click(function(){
    $('.darkness, .mobile-menu').toggleClass('active');
    $('#mob-toggle .fa').toggleClass('fa-bars').toggleClass('fa-times');
  });

  // Mobile menu sub menu toggle
  $('.mobile-menu .sub-menu').click(function(){
    $(this).toggleClass('active').children('li').slideToggle();
  });

  // Stops sub menu items from toggling the menu
  $('.mobile-menu li').click(function(e){
    e.stopPropagation();
  });

  // Lets you click on the entire menu item to toggle
  // a submenu if it has no href
  $('.mobile-menu li a:not([href])').click(function(){
    $(this).siblings('.sub-menu').toggleClass('active').children('li').slideToggle();
  });

  // Tab list toggle
  $('.tab-list li').click(function(){
    var tab_id = $(this).attr('data-tab');
    $('.tab-list li, .tab-content, p.toggle-tab').removeClass('current');
    $('.'+tab_id).addClass('current');
    $("#"+tab_id).addClass('current');
  });

  // Tab P toggle 
  $('p.toggle-tab').click(function(){
    var tab_id = $(this).attr('data-tab');
    if($(this).hasClass('current')) {
      $('.tab-list li, .tab-content, p.toggle-tab').removeClass('current');
      $('.tab-content').removeClass('current').slideUp();
    } else {
      $('.tab-list li, .tab-content, p.toggle-tab').removeClass('current');
      $('.tab-content').slideUp();
      $('.'+tab_id).addClass('current');
      $("#"+tab_id).addClass('current');
      $('html, body').animate({
        scrollTop: $("#"+tab_id).offset().top - 160
      }, 250);
    }
  });

});
