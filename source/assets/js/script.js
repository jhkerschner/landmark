
$(function(){
  MainNav.init();
  $('.bxslider').bxSlider({
    nextSelector: '#bx-next',
    prevSelector: '#bx-prev',
    nextText: '',
    prevText: '',
    pager: false,
  });
});

MainNav = {
  init: function() {
    // $($('.mega-nav .page_item')[0]).addClass('focused');
    $('.main-nav-link, .mega-nav-close').on('click touch', function(e){
      e.preventDefault();
      $('.mega-nav').toggleClass('open');
      $('.main-nav').toggleClass('visible');
    })
  }
};

