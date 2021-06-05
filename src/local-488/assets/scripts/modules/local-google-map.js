//=================================\\
// Google Map Settings \\
//=================================\\
let acf_map = $('.acf-map');
export default function googleMaps() {
	if (acf_map.length) {

		(function ($) {

			/**
			 * initMap
			 *
			 * Renders a Google Map onto the selected jQuery element
			 *
			 * @date    22/10/19
			 * @since   5.8.6
			 *
			 * @param   jQuery $el The jQuery element.
			 * @return  object The map instance.
			 */
			function initMap($el) {

				// Find marker elements within map.
				let $markers = $el.find('.marker');

				// Create gerenic map.
				let mapArgs = {
					zoom: $el.data('zoom') || 13,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					disableDefaultUI: true,
				};
				let map = new google.maps.Map($el[0], mapArgs);

				// Add markers.
				map.markers = [];
				$markers.each(function () {
					initMarker($(this), map);
				});

				// Center map based on markers.
				centerMap(map);

				// Return map instance.
				return map;
			}

			/**
			 * initMarker
			 *
			 * Creates a marker for the given jQuery element and map.
			 *
			 * @date    22/10/19
			 * @since   5.8.6
			 *
			 * @param   jQuery $el The jQuery element.
			 * @param   object The map instance.
			 * @return  object The marker instance.
			 */
			function initMarker($marker, map) {

				// Get position from marker.
				let lat = $marker.data('lat');
				let lng = $marker.data('lng');
				let latLng = {
					lat: parseFloat(lat),
					lng: parseFloat(lng),
				};

				const icon1 = $marker.data('marker');
				const icon2 = $marker.data('marker2');

				// Create marker instance.
				let marker = new google.maps.Marker({
					position: latLng,
					icon: icon1,
					url: 'https://www.google.com/maps/search/?api=1&query=' + lat + ',' + lng,
					map: map,
				});

				google.maps.event.addListener(marker, 'mouseover', function () {
					marker.setIcon(icon2);
				});

				google.maps.event.addListener(marker, 'mouseout', function () {
					marker.setIcon(icon1);
				});

				// Append to reference for later use.
				map.markers.push(marker);


				// Open Google Maps in a new tab when marker is clicked.
				google.maps.event.addListener(marker, 'click', function () {
					window.open(this.url, '_blank');
				});
			}

			/**
			 * centerMap
			 *
			 * Centers the map showing all markers in view.
			 *
			 * @date    22/10/19
			 * @since   5.8.6
			 *
			 * @param   object The map instance.
			 * @return  void
			 */
			function centerMap(map) {

				// Create map boundaries from all map markers.
				let bounds = new google.maps.LatLngBounds();
				map.markers.forEach(function (marker) {
					bounds.extend({
						lat: marker.position.lat(),
						lng: marker.position.lng(),
					});
				});

				// Case: Single marker.
				if (map.markers.length == 1) {
					map.setCenter(bounds.getCenter());

					// Case: Multiple markers.
				} else {
					map.fitBounds(bounds);
				}
			}

			// Render maps on page load.
			$(document).ready(function () {
				$('.acf-map').each(function () {
					initMap($(this));
				});
			});

		})(jQuery);
	}
}

