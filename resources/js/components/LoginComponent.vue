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
					<h2>Connectez-vous à votre compte</h2>
					<!-- Form START -->
					<form class="mt-4">
						<div class="alert alert-danger" v-if="errorType" role="alert">
								{{ errorMessage  }}
						</div>
						<!-- Email -->
						<div class="mb-3" v-if="!errors.username">
							<label class="form-label" for="exampleInputEmail1">Email ou Numero de téléphone</label>
							<input type="text" class="form-control" name="username" v-model="data.username" id="exampleInputEmail1" placeholder="Email ou Numero de téléphone">
						</div>
						<div class="mb-3" v-else>
							<label class="form-label" for="exampleInputEmail1">Email ou Numero de téléphone</label>
							<input type="text" class="form-control is-invalid" name="username" v-model="data.username" id="exampleInputEmail1" placeholder="Email ou Numero de téléphone">
							<div  v-for="error_username in errors.username" :key="error_username" class="invalid-feedback" style="color: red; font-size: 0.9em">
										{{ error_username }}
								</div>
						</div>
						<!-- Password -->
						<div class="mb-3" v-if="!errors.password">
							<label class="form-label" for="exampleInputPassword1">Mot de passe</label>
							<input type="password" name="password" class="form-control" v-model="data.password" id="exampleInputPassword1" placeholder="*********">
						</div>
						<div class="mb-3" v-else>
							<label class="form-label" for="exampleInputPassword1">Mot de passe</label>
							<input type="password" name="password" class="form-control is-invalid"  v-model="data.password" id="exampleInputPassword1" placeholder="*********">
							<div  v-for="error_password in errors.password" :key="error_password" class="invalid-feedback" style="color: red; font-size: 0.9em">
										{{ error_password }}
								</div>
						</div>
						<!-- Checkbox -->
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Se Souvenir de moi</label>
						</div>
						<!-- Button -->
						<div class="row align-items-center">
							<div class="col-sm-4" v-if="loading">
								<button type="submit" class="btn btn-success">Connexion en cours ....</button>
							</div>
							<div class="col-sm-4" v-else>
								<button type="submit" class="btn btn-success" @click.prevent="login">Se Connecter</button>
							</div>
							<div class="col-sm-8 text-sm-end">
								<span><router-link to="/register"><u>S'inscrire</u></router-link></span>
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
 	data(){
		return{
			data:{
				username: "",
				password: "",
			},
			loading: false,
			errorType: false,
			errorMessage : "",
			errors: {},
		};
	},

	methods:{
			login(){
				this.loading = true
				axios.post('/api/login', this.data)
				.then(response =>{
						if(response.status == 200){
							this.errors = {}
							this.loading = false
							this.errorType = false
							this.errorMessage  = ""
							if(response.data.success == false){
								if (response.data.message == "Erreur de validation") {
									this.loading = false
              		this.errors = response.data.errors
								} else if(response.data.message == "Aucun utilisateur trouvé avec ce numéro.") {
									this.errorType = true
									this.errorMessage = response.data.message
									this.loading = false
								}else if(response.data.message == "Aucun utilisateur trouvé avec cet email.") {
									this.errorType = true
									this.errorMessage = response.data.message
									this.loading = false
								}else if(response.data.message == "Ooops Désolé,votre compte est suspendu.") {
									this.errorType = true
									this.errorMessage = response.data.message
									this.loading = false
								}else if(response.data.message == "Les identifiants fournis sont invalides(pas autoris(é)e).") {
									this.errorType = true
									this.errorMessage = response.data.message
									this.loading = false
								}else if(response.data.message == "Veuillez activer votre compte.") {
									this.errorType = true
									this.errorMessage = response.data.message
									this.loading = false
								}
							}else{
								if (response.data.message == "ESPACE SUPER ADMINISTRATION") {
									this.loading = false
									this.$toast.success("<p><i class=\"fab fa-check-circle me-2\"></i> Vous êtes maintenant connectés</p>",{position:"top-right",duration:3527,queue:true,max: 3});

									this.$router.push({name:"dashboard"})
								} else if(response.data.message == "ESPACE PUBLICATEUR ARTICLE") {
									this.loading = false
									this.$toast.success("<p><i class=\"fa fa-check-circle me-2\"></i> Vous êtes maintenant connectés</p>",{position:"top-right",duration:3527,queue:true,max: 3});

									this.$router.push({name:"dashboard"})
								}else if(response.data.message == "ESPACE UTILISATEUR") {
									this.loading = false
									this.$toast.success("<p><i class=\"fab fa-check-circle me-2\"></i> Vous êtes maintenant connectés</p>",{position:"top-right",duration:3527,queue:true,max: 3});

									this.$router.push({name:"dashboard"})
								}
							}
						}
					}
				).catch(error =>{
					console.dir(error)
				})
			}
		}
}
</script>