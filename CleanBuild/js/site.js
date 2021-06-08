$(document).ready(function(){

  // Run fancybox if it is added to the site
  if ( $.isFunction($.fn.fancybox) ) {
    $("a.fancybox").fancybox();

    $(".fancybox-video").fancybox({
      type: "iframe",
      fitToView	: true,
      autoSize	: false,
      maxWidth	: 900,
      maxHeight	: 700,
      width		  : '70%',
      height		: '70%',
    });
  }

  // Mobile menu toggle code
  $('#mob-toggle, .darkness').click(function(){
    $('.darkness, .mobile-menu').toggleClass('active');
    $('#mob-toggle .far').toggleClass('fa-bars').toggleClass('fa-times');
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

  // Run lazy load on all elements with the class of 'lazy'
  var siteLazyLoad = new LazyLoad({
    elements_selector: ".lazy"
  });

  // Updates the lazy load when a tab is clicked
  $('.tab-list li').click(function(){
    siteLazyLoad.update();
  });

});

$(window).on('load scroll resize', function(){

  // Get the distance the window has scrolled
  var wScroll = $(window).scrollTop();

  // Parallax scrolling for the banner slider
  $('.slider.parallax').css({'transform': 'translate3d(0,' + wScroll * +0.5 + 'px,0)'});

});


// Smooth scrolling anchor links
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          };
        });
      }
    }
  });