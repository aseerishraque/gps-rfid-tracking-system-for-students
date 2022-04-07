<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYpYr9fw5AqhfSV1zRGXnVEHV3_f2n4SA&callback=initMap"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>

    let map;


    // const axios = require('axios').default;

    getCurrentLocation();

        function getCurrentLocation(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                    };
                    setInterval(() => {
                        axios.post("{{ URL::to('/api/v1/store-gps/'.auth()->user()->id) }}", {
                            "lat": position.coords.latitude,
                            "lng": position.coords.longitude
                        })
                        .then(() => {
                            // console.log(response.data);
                        })
                        .catch(e => console.log(e))
                    }, 10000);

                    // console.log("current location: ", pos.lat);

                    console.log(pos);
                    return pos;
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
      }

      // console.log(getCurrentLocation());
  </script>
