<template>

    <headerbar> </headerbar>
    <!-- =======================Trending END -->
    <main>
<!-- **************** MAIN CONTENT START **************** -->
<!-- =======================
Inner intro START -->
<section>
	<div class="container">
		<div class="row">
      <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
        <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
					<h2>Créez votre compte gratuit </h2>
					<!-- Form START -->
            <form class="mt-4">
               <!-- Email -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Nom & Prénoms (*)</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom & Prénoms*">
              </div>
              <!-- Email -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Email (*)</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email*">
                <small id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
              </div>
              <!-- Password -->
               <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Téléphone</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Téléphone">
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputPassword1">Mot de passe(*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*********">
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputPassword2">Confirmer le mot de passe(*)</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="*********">
              </div>
              <!-- Checkbox -->
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">J'ai lu et j'accepte <router-link to="#"><u>les conditions d'utilisation.</u></router-link> </label>
              </div>
              <!-- Button -->
              <div class="row align-items-center">
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-success">S'enregistrer</button>
                </div>
                <div class="col-sm-8 text-sm-end">
                  <span> <router-link to="/login"><u>Se connecter</u></router-link></span>
                </div>
              </div>
            </form>
            <!-- Form END -->
					<hr>
					<!-- Social-media btn -->
					<div class="text-center">
						<p>Connectez-vous avec un compte pour un accès rapide</p>
						<ul class="list-unstyled d-sm-flex mt-3 justify-content-center">
							<li class="mx-2">
								<a href="#" class="btn bg-facebook d-inline-block"><i class="fab fa-facebook-f me-2"></i>  Facebook</a>
							</li>
							<li class="mx-2">
								<a href="#" class="btn bg-google d-inline-block"><i class="fab fa-google me-2"></i> Google</a>
							</li>
						</ul>
					</div>
        </div>
      </div>
    </div>
	</div>
</section>
<!-- =======================
Inner intro END -->
 </main>
       <!--==================== MAIN ====================-->
    <footerbar> </footerbar>

</template>

<script>
export default {
 
}
</script>