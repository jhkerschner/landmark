$(function(){
  MainNav.init();
});

MainNav = {
  init: function() {
    console.log("MainNav.init()")
    $($('.mega-nav .page_item')[0]).addClass('focused')
  }
}