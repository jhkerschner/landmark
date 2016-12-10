
$(function(){
  MainNav.init();
  $('.bxslider').bxSlider({
    nextSelector: '#bx-next',
    prevSelector: '#bx-prev',
    nextText: '',
    prevText: '',
    pager: false,
    auto: true,
    pause: 8000,
    onSliderLoad: function() {
      $('.bx-prev')[0].appendChild($('.slider-control-left svg')[0])
      $('.bx-next')[0].appendChild($('.slider-control-right svg')[0])
    }
  });
});

MainNav = {
  init: function() {
    $('#menu-top-nav').addClass('visible');
    $('.hamburger').on('click touch', function(e){
      e.preventDefault();
      $('.mega-nav').toggleClass('open');
      $('#menu-top-nav').toggleClass('visible');
    })
    $('.mega-nav-close').on('click touch', function(e){
      e.preventDefault();
      $('.mega-nav').removeClass('open');
      $('#menu-top-nav').addClass('visible');
    })
    $('#menu-top-nav a').on('click touch', function(e){
      e.preventDefault();
      var index = $('#menu-top-nav a').index(this);
      console.log(index);
      $('#menu-mega-nav > li').removeClass('focused');
      $($('#menu-mega-nav > li').get(index)).addClass('focused')
      $('.mega-nav').addClass('open');
      $('#menu-top-nav').removeClass('visible');
    })
  }
};

function initMap() {
  var center = {lat: 43.047249,lng: -76.152935}
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: center,
    scrollwheel: false,
    zoom: 15
  });

  var infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);

  service.getDetails({
    placeId: 'ChIJrwqvKrnz2YkRSG70_71i6Ic'
  }, function(place, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });
    }
  });

  google.maps.event.addDomListener(window, 'resize', function() {
    map.setCenter(center);
  });

}
