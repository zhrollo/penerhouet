<?php
ob_start();
?>
	<link rel="stylesheet" href="/peh/css/peh-situation.css">
<?php
$bloc_head=ob_get_contents();
ob_end_clean();

ob_start();
?>
			<h3><i class="fa fa-car"></i> <?= _TXT_STTN_H3_VOITURE?></h3>

			<div id="bloc01" >
				<h4><?= _TXT_STTN_H4_COORD_GPS ?></h4>
				<p><?= _TXT_STTN_P_GPS ?></p>

				<h4><?= _TXT_STTN_H4_ADRESSE ?></h4>
				<p><?= _TXT_STTN_P_ADRESSE ?></p>

				<h4><?= _TXT_STTN_H4_ITINERAIRE ?></h4>
				<p><?= _TXT_STTN_UL_ITINERAIRE_BIS ?></p>
				
				<h4><?= _TXT_STTN_H4_CARTE_GOOGLE ?></h4>
				<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
				<div class="map_container2">
					<div id="map_canvas2" class="map_canvas2">
						<!-- width="700" height="440" -->
						<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="100%" src="https://maps.google.com/maps?hl=<?= $lg?>&q=pen er houet, locmariaquer&ie=UTF8&t=p&z=16&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">google maps carte
						</a></small></div></iframe>						
					</div>
				</div>

				<h4><?= _TXT_STTN_H4_ITINERAIRE_GOOGLE ?></h4>
				<?= _TXT_STTN_P_ITINERAIRE_GOOGLE ?><a href="https://maps.google.com/maps?q=Pen+er+houet&amp;layer=c&amp;cbll=47.590241,-2.965547&amp;cbp=11,270,0,0,0&amp;zoom=14&amp;daddr=47.590241,-2.965547" target="google_maps">Google Maps</a>

				<h4><?= _TXT_STTN_H4_CARTE_WAZE ?></h4>
				<div class="map_container2">
					<div id="map_canvas2b" class="map_canvas2">
						<iframe src="https://embed.waze.com/<?= $lg ?>/iframe?zoom=16&lat=47.59062&lon=-2.96563&pin=1&desc=Pen%20Er%20Houet"
  width="100%" height="100%"></iframe>
					</div>
				</div>
				
				<h4><?= _TXT_STTN_H4_APPLI_WAZE ?></h4>
				<a href="https://www.waze.com/ul?q=Pen%er%houet%Locmariaquer"><?= _TXT_STTN_P_APPLI_WAZE ?></a>
			</div>
			
			<div id="bloc03" >
				<h3><i class="fa fa-train"></i> <?= _TXT_STTN_H3_TRAIN ?></h3>
				<p><?= _TXT_STTN_P_TRAIN ?></p>
				
				<h3><i class="fa fa-plane"></i> <?= _TXT_STTN_H3_AVION ?></h3>
				<p><?= _TXT_STTN_P_AVION ?></p>
			</div>			  
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>