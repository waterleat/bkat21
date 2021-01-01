// document.addEventListener('DOMContentLoaded', (e) => {


// const mapLat = document.querySelector('#mapLat'),
// 	mapLng = document.querySelector('#mapLng');
// let zoom = 12;
// var map, initialLocation, marker;
// initddMap();

// });


function initukMap() {
	let initialLocation = new google.maps.LatLng( 54, -1 );
	let mapOptions = {
		zoom: 7,
		center: initialLocation

		// mapTypeId: 'roadmap',
		// center: {lat: 51.397, lng: 0.644}
		// styles: mapStyle
	};

	// Create the map.
	const map = new google.maps.Map( document.getElementById( 'ukmap' ), mapOptions );
	let jsonSrc = new URL( window.location.protocol + window.location.host + '/dojo.json' );

	// Load the dojo GeoJSON onto the map.
	map.data.loadGeoJson( jsonSrc );

	// Define the custom marker icons, using the store's "category".
	map.data.setStyle( feature => {
		return {
			icon: {
				url: `/wp-content/themes/bka2021/assets/dist/images/map/icon_${feature.getProperty( 'category' )}.png`,
				scaledSize: new google.maps.Size( 32, 32 ),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(16, 16)
        }
      };
    });

    const apiKey = 'AIzaSyDXwSOa64GQfK5_EaP9mslaQCyR6haJJsY';
    const infoWindow = new google.maps.InfoWindow();

    // Show the information for a store when its marker is clicked.
    map.data.addListener('click', event => {

      let category = event.feature.getProperty('category');
      let number = event.feature.getProperty('Dojono');
      let name = event.feature.getProperty('DojoName');
      let address1 = event.feature.getProperty('address1');
      let address2 = event.feature.getProperty('address2');
      let address3 = event.feature.getProperty('address3');
      let address4 = event.feature.getProperty('address4');
      let address5 = event.feature.getProperty('address5');
      let postcode = event.feature.getProperty('postcode');
      let hours = event.feature.getProperty('hours');
      let contact = event.feature.getProperty('contact');
      let phone = event.feature.getProperty('phone');
      let email = event.feature.getProperty('email');
      let website = event.feature.getProperty('website');
      let dojopage = event.feature.getProperty('DojoPage');
      let position = event.feature.getGeometry().get();
      // <img style="float:left; width:200px; margin-top:30px" src="img/logo_${category}.png">
      // <div style="margin-left:220px; margin-bottom:20px;">
      let content = `
        <div class="p-1 xs:p-2 sm:p-4">
          <div class="flex flex-col sm:flex-row sm:justify-between">
            <h2 class="mt-0">${name} <span class="hidden md:inline font-normal text-sm"> ${number}</span></h2>
            <p class="w-24 sm:text-right"><a target="_blank" rel="noopener noreferrer" href="${dojopage}" class="btn btn-small btn-gray">Dojo Details</a></p>
          </div>
          <p>${address1}, ${address2}, ${address3}, ${address4}, ${address5}, ${postcode}</p>
          <p><span class="font-medium">Open:</span> ${hours}<br/>
            <span class="font-medium">Contact:</span> ${contact}<br/>
            <span class="font-medium">Phone:</span> ${phone}<br/>
            <span class="font-medium">Email:</span> <a href="mailto:${email}">${email}</a><br/>
            <span class="font-medium">Website:</span> <a href="https://${website}">${website}</a>
          </p>
          <p><img src="https://maps.googleapis.com/maps/api/streetview?size=350x120&location=${position.lat()},${position.lng()}&key=${apiKey}"></p>
        </div>
      `;

      infoWindow.setContent(content);
      infoWindow.setPosition(position);
      infoWindow.setOptions({pixelOffset: new google.maps.Size(0, -30)});
      infoWindow.open(map);
    });
}
