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
              <div class="mb-3" v-if="!errors.nomComplet">
                <label class="form-label" for="exampleInputEmail1">Nom & Prénoms (*)</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="nomComplet" v-model="data.nomComplet"  aria-describedby="emailHelp" placeholder="Nom & Prénoms*">
              </div>
              <div class="mb-3" v-else>
                <label class="form-label" for="exampleInputEmail1">Nom & Prénoms (*)</label>
                <input type="email" class="form-control is-invalid" id="exampleInputEmail1" name="nomComplet" v-model="data.nomComplet"  aria-describedby="emailHelp" placeholder="Nom & Prénoms*">
                <div  v-for="error_nomComplet in errors.nomComplet" :key="error_nomComplet" class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ error_nomComplet }}
                </div>
              </div>
              <!-- Email -->
              <div class="mb-3" v-if="!errors.email">
                <label class="form-label" for="exampleInputEmail1">Email (*)</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" v-model="data.email" aria-describedby="emailHelp" placeholder="Email*">
                <small id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
              </div>
               <div class="mb-3" v-else>
                <label class="form-label" for="exampleInputEmail1">Email (*)</label>
                <input type="email" class="form-control is-invalid" id="exampleInputEmail1" name="email" v-model="data.email" aria-describedby="emailHelp" placeholder="Email*">
                <small id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
                <div  v-for="error_email in errors.email" :key="error_email" class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ error_email }}
                </div>
              </div>
              <!-- Password -->
              <div class="mb-3" v-if="!errors.telephone">
                <label class="form-label" for="exampleInputEmail1">Téléphone</label>
                <input type="number" name="telephone" v-model="data.telephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Téléphone">
              </div>
               <div class="mb-3" v-else>
                <label class="form-label" for="exampleInputEmail1">Téléphone</label>
                <input type="number" name="telephone" v-model="data.telephone" class="form-control is-invalid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Téléphone">
                <div  v-for="error_telephone in errors.telephone" :key="error_telephone" class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ error_telephone }}
                </div>
              </div>
              <!-- Password -->
              <div class="mb-3" v-if="!errors.password">
                <label class="form-label" for="exampleInputPassword1">Mot de passe(*)</label>
                <input type="password" v-model="data.password" class="form-control" id="exampleInputPassword1" placeholder="*********">
              </div>
               <div class="mb-3" v-else>
                <label class="form-label" for="exampleInputPassword1">Mot de passe(*)</label>
                <input type="password" v-model="data.password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="*********">
                 <div  v-for="error_password in errors.password" :key="error_password" class="invalid-feedback" style="color: red; font-size: 0.9em">
                    {{ error_password }}
                </div>
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputPassword2">Confirmer le mot de passe(*)</label>
                <input type="password" v-model="data.password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="*********">
              </div>
              <!-- Checkbox -->
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">J'ai lu et j'accepte <router-link to="#"><u>les conditions d'utilisation.</u></router-link> </label>
              </div>
              <!-- Button -->
              <div class="row align-items-center">
                <div class="col-sm-4">
                  <button type="submit" v-if="loadingSave" class="btn btn-success">Enregistrement en cours...</button>
                   <button type="submit" v-else  @click.prevent="register" class="btn btn-success">S'enregistrer</button>
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
 	data(){
		return{
		data:{
      nomComplet : "",
      email:"",
      password:"",
      password_confirmation:"",
      telephone:"",
    },
    errors: {},
    errorcheck: true,
    loadingSave: false,
    loading: true,
		};
	},

	methods:{
        register(){
                this.loadingSave = true
                axios.post('/api/register', {
                nomComplet: this.data.nomComplet,
                email: this.data.email,
                password: this.data.password,
                password_confirmation: this.data.password_confirmation,
                telephone: String(this.data.telephone),
                })
                .then(response => {
                    if(response.status == 200){
                        this.loadingSave = false
                        if (response.data.success == true) {
                            	this.$toast.success("<h6 style=\"color: #fff \"><i class=\"fa fa-check-circle me-2\"></i>Votre compte a été créé avec succès.</h6>",{position:"top-right",duration:3527,queue:true,max: 3});
                              this.$router.push({name:"login"})
                        } else {
                            this.errorcheck = false
                            this.errors = response.data.errors
                            this.loadingSave = false
                        }
                    }
                }).catch(error => console.log(error))
        },

  }
}
</script>