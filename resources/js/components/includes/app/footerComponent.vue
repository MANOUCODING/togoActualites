<template>
<!-- =======================
Footer START -->
<footer class="bg-dark pt-5" style="background-color: #006633 !important">
	<div class="container">
		<!-- About and Newsletter START -->
		<div class="row pt-1 pb-4">
			<div class="col-md-3">
				<a class="navbar-brand" href="/">
					<img class="navbar-brand-item light-mode-item" src="assets/images/blanc.png" style="width: 200px; height: 65px; " alt="logo">
				</a>
			</div>
			<div class="col-md-3">

			</div>
			<div class="col-md-6">
				<!-- Form -->
				<form class="row row-cols-lg-auto g-2  justify-content-end">
					<h6 style="color: #fff">Abonnez vous pour etre informé de nos prochains articles</h6>
					<div class="col-12">
						<input type="email" name="email" class="form-control" v-model="data.email" placeholder="Entrez votre email ">
					</div>
					<div class="col-12">
						<button type="submit" v-if="loading" class="btn btn-danger m-0">Abonnement en cours ...</button>
						<button type="submit" v-else @click.prevent="saveNewsLetter" class="btn btn-danger m-0">S' abonner</button>
					</div>
				</form>
			</div>
		</div>
		<!-- About and Newsletter END -->

		<!-- Divider -->



        <!-- Divider -->
        <hr style="border: 1px solid #fff">


		<!-- Hot topics START -->
		<!-- Hot topics END -->
	</div>

    <div class="container">
        <div class="row pt-5">
			<!-- Footer Widget -->
			<div class="col-md-6 col-lg-6 mb-4">
				<h5 class="mb-4 text-white">Nos Objectifs</h5>
				<!-- Item -->
				<!-- Item -->
				<div class="mb-4 position-relative">
						<p class="text-white">Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.
					Les raisons de la création du site togoactualite sont plusieurs :</p>
					<p class="text-white">
					-Fournir les informations fiables sans déformation via notre site internet. <br>
					-Permettre à la diaspora togolaise d’être informée de ce qui se passe dans notre cher pays. <br>
					-Nouer des partenariats avec d’autres sites d’information. <br>
					-Faire mieux connaître notre Togo à travers des débats, vidéos, nos cultures, etc… <br>
					-Permettre à nos abonnés de nous suivre et d’animer des débats dans le respect. <br>
					</p>
				</div>
			</div>

			<!-- Footer Widget -->
			<div class="col-md-6 col-lg-6 mb-4">
				<div class="row ">

					<div class="col-4" >
						<ul class="nav flex-column ">
							<li class="nav-item "><a class="nav-link pt-0 text-white" href="#">A Ne Pas Rater Togo</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Actualités</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">AFRIQUE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">CAN</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">CHRONIQUES</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Communiqué</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">COOPÉRATION</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">CULTURE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">DIASPORA</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Diplomatie</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">ECONOMIE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Editorial</a></li>
						</ul>
					</div>
 					<div class="col-4">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">EDUCATION</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">FAITS DIVERS</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">FENETRE SUR L'AFRIQUE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">HIGH TECH</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">IMPORTANT</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">INTERNATIONAL</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Interview</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">JUSTICE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">MEDIA</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">MONDE</a></li>
						</ul>
					</div>
					<div class="col-4">
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">NÉCROLOGIE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">OPINION</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">POLITIQUE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Rubriques+</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">SANTE</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">SOCIÉTÉ</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">SPORT</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">TOGO</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">TOGO ACTUALITÉ</a></li>
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">Vidéos</a></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Footer Widget -->

			<!-- Footer Widget -->
		</div>
		<!-- Widgets END -->

        <!-- Divider -->
        <hr style="border: 1px solid #fff">

        <div class="row">
			<div class="col-md-12 col-lg-12 col-sm-6  mb-4">
				<div class="row ">

					<div class="col-2" >
						<ul class="nav flex-column ">
							<li class="nav-item "><a class="nav-link pt-0 text-white" href="#">-Mentions légales</a></li>
						</ul>
					</div>
					<div class="col-3">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">-Politique de confidentialité</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">-Gestion des cookies</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">-Conditions générales</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link pt-0 text-white" href="#">-Aide (FAQ)</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <!-- Divider -->
        <hr style="border: 1px solid #fff">
        <div class="row">
			<div class="col-md-12 col-lg-12 col-sm-6  mb-4">
				<div class="row ">

					<div class="col-2" >
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link text-white pt-0" href="https://wa.link/x3ae2z" target="_blank"><i class="fab fa-whatsapp fa-fw me-2"></i>WhatsApp</a></li>
						</ul>
					</div>
					<div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link text-white" href="https://wa.link/x3ae2z" target="_blank"><i class="fab fa-youtube fa-fw me-2"></i>YouTube</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link text-white" href="https://wa.link/x3ae2z" target="_blank"><i class="fab fa-facebook fa-fw me-2"></i>FaceBook</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link text-white" href="https://wa.link/x3ae2z" target="_blank"><i class="fab fa-twitter fa-fw me-2"></i>Twitter</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link text-white" href="https://wa.link/x3ae2z" target="_blank"><i class="far fa-envelope fa-fw me-2"></i>Newsletters</a></li>
						</ul>
					</div>
                    <div class="col-2">
						<ul class="nav flex-column ">
							<li class="nav-item"><a class="nav-link text-white" href="https://wa.link/x3ae2z" target="_blank"><i class="far fa-bell fa-fw me-2"></i>Notifications</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>


	<!-- Footer copyright START -->
	<div class="bg-dark-overlay-3 mt-5">
		<div class="container">
			<div class="row align-items-center justify-content-md-between py-4">
				<div class="col-md-6">
					<!-- Copyright -->
					<div class="text-center text-md-start text-primary-hover text-muted">©2022 <a href="/" class="text-reset btn-link" target="_blank">TOGO ACTUALITES</a>.Tous droits réservés
					</div>
				</div>
				<div class="col-md-6 d-sm-flex align-items-center justify-content-center justify-content-md-end">
					<ul class="nav">
                        <li class="nav-item">
                            <router-link class="nav-link text-white ps-0" to="/about">Qui sommes nous ?</router-link>
                        </li>

                        <li class="nav-item">
                            <router-link class="nav-link text-white" to="#">Publicités</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-white" to="/contact">Contactez Nous</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-white" to="/login">Se connectez</router-link>
                        </li>
                    </ul>
				</div>
			</div>
		</div>
	</div>



	<!-- Footer copyright END -->
</footer>
      <!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>
</template>

<script>
export default {
  data(){
		return {
			infos: {},
			loading: false,
			data: {
				id: null,
				email: null,
				status: 1,
			},
		}
	},
    methods: {
			saveNewsLetter(){
				this.loading = true
				axios.post('/api/newslatters/store',{
					email : this.data.email,
					status: this.data.status ? 1 : 0
				})
				.then(response =>{
						if(response.status == 200){
						
							if(response.data.success == false){
								if (response.data.message == "Erreur de validation") {
									this.loading = false
									this.$toast.error("<h6 style=\"color: #fff \"><i class=\"fa fa-times-circle me-2\"></i>Veuillez bien verifier votre email</h6>",{position:"top-right",duration:5527,queue:true,max: 3});
								}
							}else{
								if (response.data.message == "Votre email a bien été enregistré.Vous serez tenus informés de nos prochains articles") {
									this.loading = false
									this.$toast.success("<h6 style=\"color: #fff \"><i class=\"fa fa-check-circle me-2\"></i>Votre email a bien été enregistré.</br>Vous serez tenus informés de nos prochains articles.</h6>",{position:"top-right",duration:3527,queue:true,max: 3});
								}
								this.data.email = null
								this.data.status = 1
							}
						}
					}
				).catch(error =>{
					console.dir(error)
				})
    	},
    },
    mounted() {
        // this.getResults();
    }
}
</script>
