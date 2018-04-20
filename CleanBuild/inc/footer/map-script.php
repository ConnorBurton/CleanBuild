<script type="text/javascript">

var map;
function initialize() {
	var mapOptions = {
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoom: 10,
    panControl:false,
    mapTypeControl:false,
    scaleControl:false,
    streetViewControl:false,
    overviewMapControl:false,
    rotateControl:false,
    scrollwheel: false,
		fullscreenControl: false,
    disableDoubleClickZoom: true,
    disableDefaultUI: true,
    draggable: false,
		center: new google.maps.LatLng(51.5285582,-0.2416798)
	};

	map = new google.maps.Map(document.getElementById('map'),
		mapOptions);

		var mapStyles = [{"featureType":"all","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":"-46"},{"color":"#95a0a7"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e7ebef"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#e7ebef"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#e7ebef"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e7ebef"},{"lightness":"4"}]}];

	map.setOptions({styles: mapStyles});


	google.maps.event.addDomListener(window, 'resize', function() {
		map.setCenter(new google.maps.LatLng(51.5285582,-0.2416798));
	});

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>