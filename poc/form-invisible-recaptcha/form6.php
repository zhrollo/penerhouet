<?php
// Recup $cfg_recaptcha_site_key2 & $cfg_recaptcha_secret2
require("../../config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<h1>POC invisible recaptcha + Bootstrap 4.3.1</h1>

<li>BOOTSTRAP 4.3.1</li>
<li>Validation intégrée à bootstrap 4.3.1 (pas de lib additionnelle)</li>
<li>Invisible recaptcha</li>
<pre>
Basé sur le form5.php qui fonctionne...
</pre>


<form id="demo-form" class="needs-validation" action="action6.php"  method="POST" novalidate>
  
	<div class="form-group">
		<label for="periode" class="control-label">Période choisie *</label>
		<input type="text" class="form-control" name="periode" id="periode" placeholder="Précisez la période de votre choix (ex: du 1er au 8 juillet 2017)" value="Du 18/05/2019 au 25/05/2019, 1 semaine" required/>
        <div class="valid-feedback">OK</div>
	</div>

	<div class="form-group">
		<label for="prenom" class="control-label">Prénom *</label>
		<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Donnez votre prénom" required/>
        <div class="valid-feedback">OK</div>
	</div>

	<div class="form-group">
		<label for="nom" class="control-label">Nom *</label>
		<input type="text" class="form-control" name="nom" id="nom" placeholder="Donnez votre nom" required/>
        <div class="valid-feedback">OK</div>
	</div>
	
	<div class="form-group">
		<div class="error-icon">
			<label for="person_email" class="control-label">Email *</label>
			<input class="form-control" id="person_email" name="person_email" placeholder="Donnez votre email" type="email" required />
		</div>
  </div>						

	<div class="form-group">
		<label for="telephone" class="control-label">Téléphone</label>
		<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Donnez votre téléphone" />
	</div>

	<div class="form-group">
		<label for="nb_personnes" class="control-label">Nombre d'adultes</label>
		<input type="text" class="form-control" name="nb_personnes" id="nb_personnes" placeholder="Précisez le nombre d'adultes" />
	</div>
	
	<div class="form-group">
		<label for="nb_enfants" class="control-label">Nombre d'enfants</label>
		<input type="text" class="form-control" name="nb_enfants" id="nb_enfants" placeholder="Précisez le nombre d'enfants (- de 13 ans)" />
	</div>
	
	<div class="form-group">
		<label for="monmessage" class="control-label">Message au propriétaire *</label>
		<textarea class="form-control" name="monmessage" id="monmessage" placeholder="Rédigez votre message au propriétaire" rows="6" required></textarea>
	</div>

	<div id='recaptcha' class="g-recaptcha"
		  data-sitekey="<?php echo $cfg_recaptcha_site_key2; ?>"
		  data-callback="onSubmit"
		  data-size="invisible"></div>
						  
  <button class="btn btn-block btn-primary" type="submit">Envoyer votre demande de réservation au propriétaire</button>
</form>




	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	
    <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
	
	<!-- JS Validation Form -->	
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {

	  if (form.checkValidity() === false) {
		  // Erreur
          event.preventDefault();
          event.stopPropagation();
		} else {
			// C'est bon
			event.preventDefault();
			grecaptcha.execute();
		}
		
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// Callback pour poster
function onSubmit(token){
	document.getElementById("demo-form").submit();
};
	
	
    </script>
	
  </body>
</html>