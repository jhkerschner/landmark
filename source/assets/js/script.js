
$(function(){
  MainNav.init();
  $('.bxslider').bxSlider({
    nextSelector: '#bx-next',
    prevSelector: '#bx-prev',
    nextText: '>',
    prevText: '<',
    pager: false,
  });
});

MainNav = {
  init: function() {
    $($('.mega-nav .page_item')[0]).addClass('focused');
  }
};

