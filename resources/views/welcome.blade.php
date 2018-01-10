@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<div class="container">
    <div class="row">
        <div id="googleMap" style="width:100%;height:500px;"></div>
        <button id="test" name="test" value="test" class="btn-danger btn">Show Nearby Hospitals</button>
    </div>
</div>
<script>
    var map, infoWindow, location, curLocation;
    var directionsService, directionsDisplay, stepDisplay;
    var markers = [];
    function myMap() {
         markerArray = [];
        // Instantiate a directions service.
         directionsService = new google.maps.DirectionsService;
         directionsDisplay = new google.maps.DirectionsRenderer({map: map});
        // Instantiate an info window to hold step text.
         stepDisplay = new google.maps.InfoWindow;

        var location = {lat: -34.397, lng: 150.644};
        curLocation = location;
        map = new google.maps.Map(document.getElementById('googleMap'), {
            center: location,
            zoom: 15
        });

        infoWindow = new google.maps.InfoWindow;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                infoWindow.setPosition(pos);
                curLocation = pos;

                map.setCenter(pos);

            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    $('#test').click(function(){
        directionsDisplay.setMap(null);
        map.setCenter(curLocation);
        var pyrmont = curLocation;
        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: pyrmont,
            radius: 5000,
            type: ['hospital']
        }, callback);

    });

    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                createMarker(results[i]);
            }
        }
    }

    function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location
        });

        markers.push(marker);

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                'Address: ' + place.vicinity + '<br>' +
                '</div>');

            calculateAndDisplayRoute(
                directionsDisplay, directionsService, marker);
            infowindow.open(map, this);
        });
    }

    function calculateAndDisplayRoute(directionsDisplay, directionsService, marker) {
        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
            origin: curLocation,
            destination: marker.getPosition(),
            travelMode: 'DRIVING'
        }, function(response, status) {
            // Route the directions and pass the response to a function to create
            // markers for each step.
            if (status === 'OK') {
                deleteMarkers();
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4lp3N4XN1fPNnLz3AlJtB5MIMDQobDDE&libraries=places&callback=myMap"></script>

@endsection
