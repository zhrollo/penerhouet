	<!-- début footer -->
	<footer id="footer-content" class="footer">
		<div class="container">
			
			<!-- lien haut de page -->
			<div id="zigouigoui"><a href="#"><i class="fas angle-up fa-2x"></i></a></div>
			<!-- / -->

			
			<div class="row">
				<div class="col-sm-3">
					<span style="font-family:'Poiret One'; font-weight:400; font-style:normal; font-size:40px" >Pen-er-Houët</span>
				<?= _FOOTER1_TITLE?><br/><br/>
				
				<p><div class="block-address"><i class="fa fa-map-marker"></i>&nbsp;<?= _FOOTER1_ADRESSE?></div></p>
				
				<p><i class="fa fa-phone"></i>&nbsp;<a href="tel:+33-6-78-71-34-66"><?= _FOOTER1_TELEPHONE?></a></p>
				
				<p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;<a href="mailto:<script>crypted_mail();</script>" target="_blank" title="Email Pen-er-Houët"><script>crypted_mail();</script></a></p>	
				
				<!-- BOUTON Réserver -->
				<a href="<?= _ROOT._LANG._URL_RESERVEZ ?>" class="btn btn-primary" ><?= _FOOTER1_BTN_RESERVEZ?></a><br/><br/>
				<!-- BOUTON Réserver -->
			</div>

			<!-- PLAN DU SITE -->
			<div class="col-sm-3">
				<h4><?= _FOOTER2_PLAN_DU_SITE?></h4>
				<ul class="list-nav">
					<li><a href="<?= _ROOT ?><?= _LANG ?>"><?= _MENU_BIENVENUE?></a></li>
					<?= _MENU_LA_MAISON?> :<br>
					<ul>

						<li><a href="<?= _ROOT._LANG._URL_LA_MAISON_EN_IMAGES ?>"><?= _MENU_LA_MAISON_EN_IMAGES?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_DESCRIPTIF ?>"><?= _MENU_DESCRIPTIF?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_SITUATION ?>"><?= _MENU_SITUATION?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_RESERVEZ ?>"><?= _MENU_TARIF?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_LIVRE_D_OR ?>"><?= _MENU_LIVRE_D_OR?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_QUESTION_FREQUENTES ?>"><?= _MENU_QUESTION_FREQUENTES?></a></li>
					</ul>
					<?= _MENU_DECOUVREZ_LE_GOLFE?> :<br>
					<ul>
						<li><a href="<?= _ROOT._LANG._URL_ALENTOURS ?>"><?= _MENU_ALENTOURS?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_LOCMARIAQUER ?>"><?= _MENU_LOCMARIAQUER?></a></li>
						<li><a href="<?= _ROOT._LANG._URL_ESCAPADES ?>"><?= _MENU_ESCAPADES?></a></li>
					</ul>
				<li><a href="<?= _ROOT._LANG._URL_CONTACTEZ_LE_PROPRIETAIRE ?>"><?= _MENU_CONTACTEZ_LE_PROPRIETAIRE?></a></li>
				<li><a href="<?= _ROOT._LANG._URL_RESERVEZ ?>"><?= _MENU_RESERVEZ?></a></li>
				<li><a href="<?= _ROOT._LANG._URL_DONNEZ_VOTRE_AVIS ?>"><?= _MENU_DONNEZ_VOTRE_AVIS?></a></li>
				<li><a href="<?= _ROOT._LANG._URL_MENTIONS_LEGALES ?>"><?= _MENU_MENTIONS_LEGALES?></a></li>
				<li><a href="<?= _ROOT._LANG._URL_CGV ?>"><?= _MENU_CGV?></a></li>
				<li><a href="<?= _ROOT._LANG._URL_RGPD ?>"><?= _MENU_RGPD?></a></li>
					</ul>
				</div>
				<!-- /PLAN DU SITE -->

				<div class="col-sm-3">
					<h4><?= _FOOTER3_RESEAUX_SOCIAUX?></h4>
					<ul class="list-nav">
						<li>
							<a href="https://www.facebook.com/penerhouet" target="_blank"><i class="fab fa-facebook fa-fw fa-lg" style="color:#fff"></i>&nbsp;facebook
						</a>
						</li>
						<li>
						<a href="https://www.instagram.com/pen_er_houet" target="_blank">
							<i class="fab fa-instagram fa-fw fa-lg" style="color:#fff"></i>&nbsp;instagram
						</a>
						</li>
						<li>
						<a href="https://twitter.com/penerhouet" target="_blank">
							<i class="fab fa-twitter fa-fw fa-lg" style="color:#fff"></i>&nbsp;twitter
						</a>
						</li>
						<li>
						<a href="https://www.pinterest.com/penerhouet" target="_blank">
							<i class="fab fa-pinterest fa-fw fa-lg" style="color:#fff"></i>&nbsp;pinterest
						</li>
						</a>
					</ul>
						<iframe src="http://www.facebook.com/plugins/like.php?href=http://www.penerhouet.com&layout=box_count&show_faces=true&width=65&action=like&font=arial&colorscheme=light&height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:65px; margin-top:3px;" allowTransparency="true"></iframe>

				</div>

				<div class="col-sm-3">
					<h4><?= _FOOTER4_NEWS?></h4>
					<p>
						<form id="mailForm">
							<input type="text" name="email" title="<?= _PLACEHOLDER_EMAIL?>" placeholder="<?= _PLACEHOLDER_EMAIL?>" class="input-text">
							<input type="hidden" name="langue" value="<?= $lg ?>" />
							<br/><br/>
							<input class="btn btn-primary" type="submit" id="submit" value="<?= _FOOTER4_BTN_LIB?>" />
							<div id="resultat_ok"></div>
							<div id="resultat_ko"></div>
						</form>		
					</p>
				</div>
			</div>
	
			<p class="text-center footer-credits">
				<i class="far fa-copyright"></i>
				<?= _FOOTER4_COPYRIGHT?><br class="visible-sm">
			</p>
			<!--
			<p class="text-center footer-classement">
				<img src="<?= _ROOT ?>peh/img/commun/3-etoiles.png"><br>
			</p>
			-->
		</div>
	</footer>
		
	<!-- YOUR CONTENT ENDS HERE -->
	<!-- ********************** -->


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	
	<!-- Début back to top -->
	<script type="text/javascript">
		var btn = $('#button');
		$(window).scroll(function() {
			if ($(window).scrollTop() > 300) {
				btn.addClass('show');
			} else {
				btn.removeClass('show');
			}
		});
	</script>
	<!-- Fin back to top -->
		
<!-- newsletter -->
	<script>
		$(document).ready(function(){
			$('#mailForm').on('submit', function (e) {
				e.preventDefault();
				$('#resultat_ko').html("");
				$('#resultat_ok').html("");
				$.ajax({
					type: 'post',
					url: '<?=_ROOT?>page/action-register.php',
					data: $('form').serialize(),
					success: function(data) {
						if (data=="OK") {
							$('#resultat_ok').html("<?=_FOOTER4_FEEDBACK_OK?>");
						}
						if (data=="ALREADY") {
							$('#resultat_ok').html("<?=_FOOTER4_FEEDBACK_ALREADY?>");
						}
						if (data=="INVALID_EMAIL") {
							$('#resultat_ko').html("<?=_FOOTER4_FEEDBACK_INVALID_EMAIL?>");
						}
						if (data=="MYSQL_ERROR") {
							$('#resultat_ko').html("<?=_FOOTER4_FEEDBACK_MYSQL_ERROR?>");
						}
					},
					error: function() {
						$('#resultat_ko').html("<?=_FOOTER4_FEEDBACK_AJAX_ERROR?>");
					}
				});
			});
		});		  
	</script>
	<!-- /newsletter -->
	
	<!-- bloc_foot -->
	<?= $bloc_foot ?>
	<!-- /bloc_foot -->
	
	<?= $bloc_js_google_stat ?>
</body>
</html>