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
	[ "titre"=>_TXT_ESCP_ILE_D_HOUAT],
	[ "nom"=>"peh-2008-houat-5251-1920px.jpg", "data-size"=>"1440x1920"],
	[ "nom"=>"peh-2008-houat-5254-1920px.jpg", "data-size"=>"1920x889"],
	[ "nom"=>"peh-2008-houat-5263-pano-1920px.jpg", "data-size"=>"1917x325"],
	[ "nom"=>"peh-2011-houat-0768-1920px.jpg", "data-size"=>"1920x278", "dernier"=>true, "texte_droite"=>_TXT_ESCP_ILE_D_HOUAT],
	
	[ "titre"=>_TXT_ESCP_ST_PHILIBERT],
	[ "nom"=>"peh-2016-saint-philibert-0163-1920px.jpg", "data-size"=>"1920x943"],
	[ "nom"=>"peh-2016-saint-philibert-0174-1920px.jpg", "data-size"=>"1917x484"],
	[ "nom"=>"peh-2016-saint-philibert-0184-1920px.jpg", "data-size"=>"1920x623"],
	[ "nom"=>"peh-2016-saint-philibert-0190-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-saint-philibert-0195-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-saint-philibert-0232-1920px.jpg", "data-size"=>"1920x596"],
	[ "nom"=>"peh-2016-saint-philibert-0240-1920px.jpg", "data-size"=>"1920x544"],
	[ "nom"=>"peh-2016-saint-philibert-0242-1920px.jpg", "data-size"=>"1920x473"],
	[ "nom"=>"peh-2016-saint-philibert-0244-1920px.jpg", "data-size"=>"1920x331"],
	[ "nom"=>"peh-2016-saint-philibert-0247-1920px.jpg", "data-size"=>"1920x366"],
	[ "nom"=>"peh-2016-saint-philibert-0249-1920px.jpg", "data-size"=>"1920x520", "dernier"=>true,"texte_droite"=>_TXT_ESCP_ST_PHILIBERT_DROITE],
	
	[ "titre"=>_TXT_ESCP_LA_TRINITE],
	[ "nom"=>"peh-2016-la-trinite-ile-de-stuhan-0385-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-la-trinite-0409-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>true,"texte_droite"=>_TXT_ESCP_LA_TRINITE_DROITE],
					
	[ "titre"=>_TXT_ESCP_CARNAC],
	[ "nom"=>"peh-2016-carnac-alignements-0222-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-carnac-alignements-0316-1920px.jpg", "data-size"=>"1920x1001"],
	[ "nom"=>"peh-2016-carnac-alignements-0289-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2013-alignements-de-carnac-0433-pano-1920px.jpg", "data-size"=>"1918x616", "dernier"=>true,"texte_droite"=>_TXT_ESCP_CARNAC_DROITE],
					
	[ "titre"=>_TXT_ESCP_AURAY],
	[ "nom"=>"peh-2013-auray-0575-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2014-auray-0005-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2013-auray-0573-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true,"texte_droite"=>_TXT_ESCP_AURAY_DROITE],				

	[ "titre"=>_TXT_ESCP_LE_BONO],
	[ "nom"=>"peh-2017-le-bono-0619-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2017-le-bono-0664-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2016-le-bono-0009-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2016-le-bono-0014-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-le-bono-0018-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2016-le-bono-0022-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-le-bono-0044-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-le-bono-0049-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2016-le-bono-0054-1920px.jpg", "data-size"=>"1275x1920", "dernier"=>true,"texte_droite"=>_TXT_ESCP_LE_BONO_DROITE],				

	[ "titre"=>_TXT_ESCP_ERDEVEN],
	[ "nom"=>"", "data-size"=>"", "dernier"=>true,"texte_droite"=>_TXT_ESCP_ERDEVEN_DROITE],				

	[ "titre"=>_TXT_ESCP_ETEL],
	[ "nom"=>"peh-2014-etel-0130-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2014-etel-0129-1920px.jpg", "data-size"=>"1910x1133", "dernier"=>true, "texte_droite"=>_TXT_ESCP_ETEL_DROITE],				

			
	[ "titre"=>_TXT_ESCP_ST_CADO],
	[ "nom"=>"peh-2015-saint-cado-0698-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2011-saint-cado-0697-crop-1920px.jpg", "data-size"=>"1920x413"],
	[ "nom"=>"peh-2011-saint-cado-0698-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2011-saint-cado-0699-crop-1920px.jpg", "data-size"=>"1920x522"],
	[ "nom"=>"peh-2011-saint-cado-0700-crop-1920px.jpg", "data-size"=>"1920x587"],
	[ "nom"=>"peh-2011-saint-cado-0703-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2011-saint-cado-0709-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2011-saint-cado-0723-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2011-saint-cado-0725-1920px.jpg", "data-size"=>"1538x1920", "dernier"=>true,"texte_droite"=>_TXT_ESCP_ST_CADO_DROITE],				
	
	[ "titre"=>_TXT_ESCP_VANNES],
	[ "nom"=>"", "data-size"=>"", "dernier"=>true,"texte_droite"=>_TXT_ESCP_VANNES_DROITE],
					
	[ "titre"=>_TXT_ESCP_QUIBERON],
	[ "nom"=>"peh-2015-quiberon-cote-sauvage-0495-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0389-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0389b-1920px.jpg", "data-size"=>"1920x883"],
	[ "nom"=>"peh-2015-quiberon-0400-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0400b-1920px.jpg", "data-size"=>"1920x1053"],
	[ "nom"=>"peh-2015-quiberon-0409-1920px.jpg", "data-size"=>"1920x1080"],
	[ "nom"=>"peh-2015-quiberon-0409a-1920px.jpg", "data-size"=>"1920x850"],
	[ "nom"=>"peh-2015-quiberon-0411-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0412-1920px.jpg", "data-size"=>"1920x628"],
	[ "nom"=>"peh-2015-quiberon-0413-1920px.jpg", "data-size"=>"1920x1919"],
	[ "nom"=>"peh-2015-quiberon-0413a-1920px.jpg", "data-size"=>"1920x459"],
	[ "nom"=>"peh-2015-quiberon-0413b-1920px.jpg", "data-size"=>"1920x1071"],
	[ "nom"=>"peh-2015-quiberon-0413c-1920px.jpg", "data-size"=>"1920x730"],
	[ "nom"=>"peh-2015-quiberon-0415-1920px.jpg", "data-size"=>"1920x1137"],
	[ "nom"=>"peh-2015-quiberon-0415b-1920px.jpg", "data-size"=>"1920x1137"],
	[ "nom"=>"peh-2015-quiberon-0421-1920px.jpg", "data-size"=>"1920x654"],
	[ "nom"=>"peh-2015-quiberon-0432-1920px.jpg", "data-size"=>"1920x718"],
	[ "nom"=>"peh-2015-quiberon-0435bis-1920px.jpg", "data-size"=>"1513x1920"],
	[ "nom"=>"peh-2015-quiberon-0435-1920px.jpg", "data-size"=>"1920x823"],
	[ "nom"=>"peh-2015-quiberon-0448-1920px.jpg", "data-size"=>"1920x718"],
	[ "nom"=>"peh-2015-quiberon-0458-1920px.jpg", "data-size"=>"1920x761"],
	[ "nom"=>"peh-2015-quiberon-0491-1920px.jpg", "data-size"=>"1920x520"],
	[ "nom"=>"peh-2015-quiberon-0495-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0497-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0502-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0502b-1920px.jpg", "data-size"=>"1920x956"],
	[ "nom"=>"peh-2015-quiberon-0503-1920px.jpg", "data-size"=>"1920x1275"],
	[ "nom"=>"peh-2015-quiberon-0503b-1920px.jpg", "data-size"=>"1920x1052"],
	[ "nom"=>"peh-2015-quiberon-0510-1920px.jpg", "data-size"=>"1920x856", "dernier"=>true, "texte_droite"=>_TXT_ESCP_QUIBERON_DROITE],		

	[ "titre"=>_TXT_ESCP_BELLE_ILE_EN_MER],
	[ "nom"=>"peh-2015-belle-ile-palais-0108-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2013-belle-ile-0049-crop-1920px.jpg", "data-size"=>"1920x1051"],
	[ "nom"=>"peh-2013-belle-ile-0060-crop-1920px.jpg", "data-size"=>"1920x951"],
	[ "nom"=>"peh-2013-belle-ile-0062-crop-1920px.jpg", "data-size"=>"1917x786", "dernier"=>true, "texte_droite"=>_TXT_ESCP_BELLE_ILE_EN_MER_DROITE],	

	[ "titre"=>_TXT_ESCP_LORIENT],
	[ "nom"=>"", "data-size"=>"", "dernier"=>true,"texte_droite"=>_TXT_ESCP_LORIENT_DROITE],	
	
	[ "titre"=>_TXT_ESCP_QUISTINIC],
	[ "nom"=>"peh-2015-poul-fetan-0701-1920px.jpg", "data-size"=>"1275x1274"],
	[ "nom"=>"peh-2015-poul-fetan-0690-1920px.jpg", "data-size"=>"1275x1920"],
	[ "nom"=>"peh-2015-poul-fetan-0676-1920px.jpg", "data-size"=>"1171x1920", "dernier"=>true,"texte_droite"=>_TXT_ESCP_QUISTINIC_DROITE],
	
	[ "titre"=>_TXT_ESCP_PONT_AVEN],
	[ "nom"=>"", "data-size"=>"", "dernier"=>true,"texte_droite"=>_TXT_ESCP_PONT_AVEN_DROITE]	
];
?>
<?php
ob_start();
?>

	<div class="peh-gallery">
	<div class="row">
		<div class="col-md-8">
			<div class="peh-gallery2">

<?php
$nb = count($tab_img);
for($i=0;$i<$nb;$i++)
{
	$elt = $tab_img[$i];
	if (isset($elt["titre"]) && $elt["titre"]<>"") {
		echo "<h3>".$elt["titre"]."</h3>";
		?>
			<div class="row">
				<div class="col-md-8">
					<div class="peh-gallery2">		
		<?php
	}
	if (isset($elt["dernier"]) && $elt["dernier"]) {
		// $a_class=" class=\"newLine\"";
	} else {
		$a_class="";
	}
	if (isset($elt["nom"]) && $elt["nom"]!="") {
?>
	<a href="<?= _ROOT ?>peh/img/escapades/img/<?= $elt["nom"] ?>" data-title="" data-size="<?= $elt["data-size"] ?>"<?= $a_class?>><img class="peh-thumbnail" src="<?= _ROOT ?>peh/img/escapades/th/<?= $elt["nom"] ?>" alt=""/></a>
<?php
	}
	if (isset($elt["dernier"]) && $elt["dernier"]) {
		?>
					</div>	
				</div>
				
				<div class="col-md-4">
				<?php
					if (isset($elt["texte_droite"]) && $elt["texte_droite"]!="") {
						$elt["texte_droite"] = explode("|", $elt["texte_droite"]);
				?>
						<ul class=\"liste\">
				<?php
						foreach ($elt["texte_droite"] as $item) {
							echo "<li>$item</li>";
						}							
				?>
						</ul>
				<?php
					}
				?>
				</div>
			</div>
		<?php
	}
} 
?>
	
			</div>
		</div>

	</div>
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
	var tab_data_title = '<?php echo json_encode(unserialize(_TXT_ESCP_DATA_TITLE_ARRAY)); ?>';
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