<?php

function g_map( $atts, $content = null ) {
    // wp_enqueue_script( 'g_maps' );
    $id = 'g_map_' . get_the_ID();
    $html = "<div id='" . $id . "' class='g_map'></div>";
    $g_map = new g_maps_builder( $atts['loc'], $id );
    return $html;
}
add_shortcode( 'g_map', 'g_map' );

function g_map_all_location( $atts, $content = null ) {

}

class g_maps_builder {
    protected $coords;
    protected $id;
    public function __construct( $coords, $id, $all_loc = false ) {
    	// dd($coords);
        $this->coords = $coords;
        $this->id = $id;
        if( $all_loc ) {
        	add_action( 'wp_footer', array ( $this, 'g_maps_all_loc' ) );
        } else {
        	add_action( 'wp_footer', array ( $this, 'g_maps_init' ) );
        }
    }

    public function g_maps_all_loc() {
    	$icon = get_template_directory_uri() . "/dist/images/icon.png";
    	$data = get_template_directory_uri() . "/data/locations.json";
    	ob_start();
    	?> 
    	<script type="text/javascript">
    		function loadScript() {
				  var script = document.createElement('script');
				  script.type = 'text/javascript';
				  script.src = 'https://maps.googleapis.com/maps/api/js?signed_in=false&callback=initialize&key=AIzaSyCXd_lHiRSvFbXlDEpDyBDyYOR8zRPfDsM';
				  document.body.appendChild(script);
				}

			function buildContent(val) {
			    var campusAddress = "<table style=\"font-size:16px; font-weight:800; text-align:left; text-transform:normal; width:175px; color:#430098;\"><tr><td><strong>";
				    campusAddress += (val.title);
				    campusAddress += ("</strong></td></tr><tr><td style=\"font-size:10px;\">");
				    campusAddress += (val.address.street_address);
				    campusAddress += ("<br/>");
				    campusAddress += (val.address.city);
				    campusAddress += (", ");
				    campusAddress += (val.address.state);
				    campusAddress += ("&nbsp;");
				    campusAddress += (val.address.zipcode);
				    campusAddress += ("</td></tr><tr><td style=\"font-size:10px;\">");
				    campusAddress += (val.phone);
				    // campusAddress += ("</td></tr><tr><td style=\"font-weight:600;\">");
				    // campusAddress += (val.Notes);
				    campusAddress += ("</td></tr><tr><td style=\"font-size:10px;\">");
				    campusAddress += (infoWindowLink(val.external_url));
				    campusAddress += ("</td></tr></table>");

			    return campusAddress;
			}

			function infoWindowLink(url) {
			    var link = "";
			    if (url != undefined && url.length > 0) {
			        var prefix = 'http://';
			        if (url.substr(0, prefix.length) !== prefix) {
			            url = prefix + url;
			        }

			        link = "<a href=\"" + url + "\" target=\"_blank\"><u>Order Online</u></a>&nbsp;";
			    }

			    return link;
			}
		    function initialize() {

		        var map = new google.maps.Map(document.getElementById("menu-map"));

		        var bounds = new google.maps.LatLngBounds();

		        var image = {
		            url: '<?= $icon; ?>',
		            // This marker is 25 pixels wide by 33 pixels tall.
		            size: new google.maps.Size(25, 33),
		            // The origin for this image is 0,0.
		            origin: new google.maps.Point(0, 0),
		            // The anchor for this image is the base of the flagpole at 13,33.
		            anchor: new google.maps.Point(13, 33)
		        };

		        // Place markers on map
		        $.getJSON('<?= $data; ?>',
		            function (data) {
		                $.each(data.locations, function (key, val) {
		                	// console.log( val );
		                    if (val.Latitude != 0, val.Longitude != 0) {
		                        var latLng = new google.maps.LatLng(val.Latitude, val.Longitude);

		                        if (latLng != null) {
		                            var infowindow = new google.maps.InfoWindow({
		                                content: buildContent(val)
		                            });

		                            var marker = new google.maps.Marker({
		                                position: latLng,
		                                map: map,
		                                icon: image
		                                //shadow: shadow
		                            });


		                            google.maps.event.addListener(marker, 'click', function () {
		                                infowindow.open(map, marker);
		                            });

		                            bounds.extend(latLng);
		                        }
		                    }

		                });
		                if (data.locations.length > 0) {
		                    map.fitBounds(bounds);
		                }
		            });


		    }
		    //google.maps.event.addDomListener(window, 'load', initialize);
		    window.onload = loadScript;

    	</script>
    	<?php
    	$html = ob_get_clean();

    	echo $html;
    }

    public function g_maps_init() {
    	$icon = get_template_directory_uri() . "/dist/images/icon.png";
    	ob_start();
    	?>
    	<script type="text/javascript">
    		function loadScript() {
				  var script = document.createElement('script');
				  script.type = 'text/javascript';
				  script.src = 'https://maps.googleapis.com/maps/api/js?signed_in=false&callback=initialize&key=AIzaSyCXd_lHiRSvFbXlDEpDyBDyYOR8zRPfDsM';
				  document.body.appendChild(script);
				}
    		function initialize() {
		        
		        var latLng = new google.maps.LatLng(<?= $this->coords; ?>);

		        var mapOptions = {
		            center: latLng,
		            zoom: 16
		        };
		        var map = new google.maps.Map(document.getElementById("<?= $this->id; ?>"),
		            mapOptions);

		        var bounds = new google.maps.LatLngBounds();

		        var image = {
		            url: '<?= $icon ?>',
		            // This marker is 25 pixels wide by 33 pixels tall.
		            size: new google.maps.Size(25, 33),
		            // The origin for this image is 0,0.
		            origin: new google.maps.Point(0, 0),
		            // The anchor for this image is the base of the flagpole at 13,33.
		            anchor: new google.maps.Point(13, 33)
		        };

		        var marker = new google.maps.Marker({
		            position: latLng,
		            map: map,
		            icon: image
		        });


		    }
		    //google.maps.event.addDomListener(window, 'load', initialize);
		    window.onload = loadScript;
    	</script>
    	<?php
    	$html = ob_get_clean();

    	echo $html;
    }
}