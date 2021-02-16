<?php
ob_start();
?>
	<!-- lightbox -->
		<!-- Core CSS file -->
		<link rel="stylesheet" href="<?= _ROOT ?>photoswipe/photoswipe.css"> 

		<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
			 In the folder of skin CSS file there are also:
			 - .png and .svg icons sprite, 
			 - preloader.gif (for browsers that do not support CSS animations) -->
		<link rel="stylesheet" href="<?= _ROOT ?>photoswipe/default-skin/default-skin.css"> 

		<!-- Core JS file -->
		<script src="<?= _ROOT ?>photoswipe/photoswipe.min.js"></script> 

		<!-- UI JS file -->
		<script src="<?= _ROOT ?>photoswipe/photoswipe-ui-default.min.js"></script> 
	<!-- /lightbox -->
<?php
$bloc_head=ob_get_contents();
ob_end_clean();

$tab_img = [
	[ "titre"=>_TXT_PHEI_H3_FACADE, "nom"=>"peh-2018-facade-0068-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-jardin-devant-vue-facade-palmier-0428-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_JARDIN_1, "nom"=>"peh-2015-jardin-devant-hortensias-172605-1920px.jpg", "data-size"=>"1920x1440", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-jardin-devant-vue-golfe-0421-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_VESTIBULE, "nom"=>"peh-2018-vestibule-vue-entree-0243-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-vestibule-vue-escalier-0240-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_ESCALIER_HAUT, "nom"=>"peh-2012-couloir-vue-escalier-0113-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_CHAMBRE_1, "nom"=>"peh-2018-chambre-1-vue-depuis-porte-0287-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-1-miroir-0292-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-chambre-1-vue-jardin-0336-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-1-vue-0295-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-1-vue-0296-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_CHAMBRE_2, "nom"=>"peh-2018-chambre-2-vue-depuis-porte-0275-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-2-tableau-0282-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-2-porte-0286-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-2-lavabo-0279-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-chambre-2-vue-golfe-0381-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-chambre-2-vue-golfe-174201-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_CHAMBRE_3, "nom"=>"peh-2014-chambre-3-0344-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-3-deux-lits-0297-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-3-porte-0303-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-chambre-3-troisieme-lit-0300-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-jardin-derriere-tilleuil-0304-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_SALLE_TV, "nom"=>"peh-2018-salle-tv-vue-depuis-porte-0269-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-tv-0270-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-tv-0274-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_SDB, "nom"=>"peh-2018-salle-de-bain-vue-depuis-porte-0248-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-de-bain-rangement-0264-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-de-bain-lavabo-0250-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-de-bain-douche-0253-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-de-bain-vue-depuis-fenetre-0245-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_ESCALIER_BAS, "nom"=>"peh-2018-pallier-vue-escalier-bas-0267-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_SALON, "nom"=>"peh-2018-salon-canape-fauteuils-0222-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salon-canape-fauteuils-0084-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salon-porte-bibliotheque-0210-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salon-canape-bibliotheque-0086-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salon-fauteuil-cheminee-0215-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_SALLE_A_MANGER, "nom"=>"peh-2018-salle-vue-depuis-la-porte-0148-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-salle-vase-miroir-170449-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-salle-vue-cuisine-0174-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_CUISINE, "nom"=>"peh-2018-cuisine-equipement-0196-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-cuisine-tableau-noir-0002-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-cuisine-tableau-noir-0011-1920px.jpg", "data-size"=>"837x1920", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_VERANDA, "nom"=>"peh-2018-veranda-fauteuils-0305-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-veranda-aquarium-bougie-171331-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2018-veranda-bbq-0309-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true ],
	[ "titre"=>_TXT_PHEI_H3_JARDIN_2, "nom"=>"peh-2018-facade-arriere-0079-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-jardin-devant-hortensias-184612-1920px.jpg", "data-size"=>"1920x1440", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2014-jardin-derriere-glycine-0410-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-jardin-derriere-glycine-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2013-jardin-derriere-0461-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2013-jardin-derriere-0460-1920px-pano.jpg", "data-size"=>"1917x761", "dernier"=>true ]
];
?>
<?php
ob_start();
?>
			<div class="peh-gallery">
			
<?php
$nb = count($tab_img);
for($i=0;$i<$nb;$i++)
{
	$elt = $tab_img[$i];
	if ($elt["titre"]<>"") {
		echo "				<h3>".$elt["titre"]."</h3>";
	}
?>
				<a href="<?= _ROOT ?>peh/img/en-images/img/<?= $elt["nom"] ?>" data-title="" data-size="<?= $elt["data-size"] ?>"><img class="peh-thumbnail" src="<?= _ROOT ?>peh/img/en-images/th/<?= $elt["nom"] ?>" alt=""/></a>
<?php
} 
?>
			</div>
	
		<!-- Root element of PhotoSwipe. Must have class pswp. -->
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
			<!-- Background of PhotoSwipe. 
				 It's a separate element as animating opacity is faster than rgba(). -->
			<div class="pswp__bg"></div>

			<!-- Slides wrapper with overflow:hidden. -->
			<div class="pswp__scroll-wrap">

				<!-- Container that holds slides. 
					PhotoSwipe keeps only 3 of them in the DOM to save memory.
					Don't modify these 3 pswp__item elements, data is added later on. -->
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>

				<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
				<div class="pswp__ui pswp__ui--hidden">

					<div class="pswp__top-bar">
						<!--  Controls are self-explanatory. Order can be changed. -->
						<div class="pswp__counter"></div>
						<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
						<button class="pswp__button pswp__button--share" title="Share"></button>
						<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
						<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

						<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
						<!-- element will get class pswp__preloader--active when preloader is running -->
						<div class="pswp__preloader">
							<div class="pswp__preloader__icn">
							  <div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							  </div>
							</div>
						</div>
					</div>

					<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
						<div class="pswp__share-tooltip"></div> 
					</div>

					<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
					</button>

					<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
					</button>

					<div class="pswp__caption">
						<div class="pswp__caption__center"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Root element of PhotoSwipe. Must have class pswp. -->
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>
<?php
ob_start();
?>
	<!-- bloc_js_set_data_title -->
	<script>
	var tab_data_title = '<?php echo json_encode(unserialize(_TXT_PHEI_DATA_TITLE_ARRAY)); ?>';
	var tab_data_title = JSON.parse(tab_data_title);
	$('.peh-gallery').each( function() {
		var $pic     = $(this),
			getItems = function() {
				var items = [];
				var $cpt = 0;
				$pic.find('a').each(function() {
					$(this).attr('data-title', tab_data_title[$cpt] + " ("+ $cpt + ")");
					$(this).find('img').prop("alt", tab_data_title[$cpt]);
					$(this).find('img').prop("title", tab_data_title[$cpt]);
					$cpt = $cpt + 1;
				});
				return items;
			}

		var items = getItems();
	});
	</script>
	<!-- bloc_js_set_data_title -->
	
	<!-- bloc_js_photoswipe -->
	<script>
	$('.peh-gallery').each( function() {
        var $pic     = $(this),
            getItems = function() {
                var items = [];
				var $cpt = 0;
                $pic.find('a').each(function() {
					/* On stocke le numéro de l'image dans l'attribut data-index */
					$(this).attr("data-index", $cpt);
					$cpt = $cpt + 1;
					/* - */
					
                    var $href   = $(this).attr('href'),
                        $size   = $(this).data('size').split('x'),
                        $width  = $size[0],
                        $height = $size[1];

                    var item = {
                        src : $href,
                        w   : $width,
                        h   : $height,
						title : $(this).attr('data-title')
                    }

                    items.push(item);
                });
                return items;
            }

        var items = getItems();
        var $pswp = $('.pswp')[0];
        $pic.on('click','a',function(event) {
            event.preventDefault();

            var $index = $(this).index();
			
			/* On récupère le numéro de l'image depuis l'attribut data-index */
			var $newIndex = parseInt($(this).attr("data-index"));
			/* - */

            var thumbnail = $(this)[0]
            var options = {
                index: $newIndex,
                bgOpacity: 0.7,
                showHideOpacity: true,
                getThumbBoundsFn: function(index) {

                    // get window scroll Y
                    var pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
                    // optionally get horizontal scroll

                    // get position of element relative to viewport
                    var rect = thumbnail.getBoundingClientRect();

                    // w = width
                    return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};

                }
            }

            // Initialize PhotoSwipe
            var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        })
    })
	</script>
	<!-- /bloc_js_photoswipe -->
<?php
$bloc_foot=ob_get_contents();
ob_end_clean();
?>	