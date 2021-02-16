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
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-locquidy-182757-1920px.jpg", "data-size"=>"1920x776", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-locquidy-182809-1920px.jpg", "data-size"=>"1920x735", "dernier"=>true ],
	[ "titre"=>"", "nom"=>"peh-2017-locmariaquer-locquidy-0451_pano-1920px.jpg", "data-size"=>"1920x495", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-0777-1920px.jpg", "data-size"=>"1920x764", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-0779-1920px.jpg", "data-size"=>"1522x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-0780-1920px.jpg", "data-size"=>"1920x553", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-0781-1920px.jpg", "data-size"=>"1920x719", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-locquidy-0786-1920px.jpg", "data-size"=>"1275x1392", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-vue-aube-0194-pano-1920px.jpg", "data-size"=>"1920x544", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-8891-1920px.jpg", "data-size"=>"1440x1439", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2009-locmariaquer-1093-1920px.jpg", "data-size"=>"1920x492", "dernier"=>true ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0189-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0195-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2016-locmariaquer-1354-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0212-1920px.jpg", "data-size"=>"1012x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0216-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2015-locmariaquer-pont-a-maree-0377-1920px.jpg", "data-size"=>"1920x1275", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2009-locmariaquer-6917-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0220-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0204-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0192-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ],
	[ "titre"=>"", "nom"=>"peh-2010-locmariaquer-0200-1920px.jpg", "data-size"=>"1440x1920", "dernier"=>false ]
];
?>
<?php
ob_start();
?>

	<?= _TXT_ALNT_P_TEXTE_HAUT ?><br/><br/>
	
	<div class="row">
		<div class="col-md-8">
			<div class="peh-gallery">

<?php
$nb = count($tab_img);
for ($i=0;$i<$nb;$i++) {
	$elt = $tab_img[$i];
	if ($elt["titre"]<>"") {
		echo "<h3>".$elt["titre"]."</h3>";
	}
	if ($elt["dernier"]) {
		$a_class=" class=\"newLine\"";
	} else {
		$a_class="";
	}
?>
	<a href="/peh/img/alentours/img/<?= $elt["nom"] ?>" data-title="" data-size="<?= $elt["data-size"] ?>"<?= $a_class?>><img class="peh-thumbnail" src="/peh/img/alentours/th/<?= $elt["nom"] ?>" alt=""/></a>
<?php
} 
?>
				
			</div>
		</div>
		
		<div class="col-md-4">
			<ul class="liste">
				<?= _TXT_ALNT_UL_TEXTE_DROITE ?>
			</ul>
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
	var tab_data_title = '<?php echo json_encode(unserialize(_TXT_ALNT_DATA_TITLE_ARRAY)); ?>';
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