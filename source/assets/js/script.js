
$(function(){
  MainNav.init();
  $('.bxslider').bxSlider({
    nextSelector: '#bx-next',
    prevSelector: '#bx-prev',
    nextText: '',
    prevText: '',
    pager: false,
    onSliderLoad: function() {
      $('.bx-prev')[0].appendChild($('.slider-control-left svg')[0])
      $('.bx-next')[0].appendChild($('.slider-control-right svg')[0])
    }
  });
});

MainNav = {
  init: function() {
    $('.hamburger, .main-nav-link, .mega-nav-close').on('click touch', function(e){
      e.preventDefault();
      $('.mega-nav').toggleClass('open');
      $('.main-nav').toggleClass('visible');
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
