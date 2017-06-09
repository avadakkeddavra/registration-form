var map;
function initMap()
{
       var uluru = {lat: 34.101183,  lng: -118.343713};
       var map = new google.maps.Map(document.getElementById('map'), {
            center: uluru,
            zoom: 18,

        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            title: '7060 Hollywood Blvd, Hollywood, CA 90028',
        });
}