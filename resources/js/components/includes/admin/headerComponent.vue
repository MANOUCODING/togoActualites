<template>


<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container-fluid">
			<!-- Logo START -->
			<a class="navbar-brand me-3" href="/">
				<img class="navbar-brand-item light-mode-item" src="/assets/images/LOGO PNG.png" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="text-body h6 d-none d-sm-inline-block">MENU</span>
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll mx-auto">

					<!-- Nav item 1 Demos -->
					<li class="nav-item"><router-link class="nav-link" to="/admin/dashboard"><i class="bi bi-house-door me-1"></i>Tableau de bord</router-link></li>

					<!-- Nav item 2 Post -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil me-1"></i>Articles</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <router-link class="dropdown-item" to="/admin/articles">Tous les articles</router-link></li>
							<li> <router-link class="dropdown-item" to="#">Articles par categories</router-link></li>
							<li> <router-link class="dropdown-item" to="#">Articles par auteur</router-link></li>
							<li> <router-link class="dropdown-item" to="/admin/articles/create">Ajouter un article</router-link></li>
						</ul>
					</li>

					<!-- Nav item 3 Pages -->
					<li class="nav-item dropdown">
						<router-link class="nav-link" to="/admin/category" id="pagesMenu"><i class="bi bi-folder me-1"></i>Catégories</router-link>
					</li>
					<li class="nav-item dropdown">
						<router-link class="nav-link" to="#" id="pagesMenu"><i class="bi bi-folder me-1"></i>Les Utilisateurs</router-link>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-folder me-1"></i>Autres</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <router-link class="dropdown-item" to="/admin/messages">Messages</router-link></li>
							<li> <router-link class="dropdown-item" to="#">Commentaires</router-link></li>
							<li> <router-link class="dropdown-item" to="#">NewsLetters</router-link></li>
							<li> <router-link class="dropdown-item" to="#">Visites</router-link></li>
						</ul>
					</li>
				</ul>

				<!-- Search dropdown START -->
				<!-- Search dropdown END -->
			</div>
		  <!-- Main navbar END -->

			<!-- Nav right START -->
			<div class="nav flex-nowrap align-items-center">

				<!-- Notification dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Notification button -->
					<a class="btn btn-primary-soft btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
						<i class="bi bi-bell fa-fw"></i>
					</a>
					<!-- Notification dote -->
					<span class="notif-badge animation-blink"></span>

					<!-- Notification dropdown menu START -->
					<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
						<div class="card bg-transparent">
							<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
								<h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 new</span></h6>
								<a class="small" href="#">Clear all</a>
							</div>
							<div class="card-body p-0">
								<ul class="list-group list-unstyled list-group-flush">
									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="/assets/images/avatar/08.jpg" alt="avatar">
												</div>
											</div>
											<div>
                        <h6 class="mb-1">12 new members joined</h6>
												<span class="small"> <i class="bi bi-clock"></i> 3 min ago</span>
											</div>
										</a>
									</li>

									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="/assets/images/avatar/02.jpg" alt="avatar">
												</div>
											</div>
											<div>
												<h6 class="mb-1">Larry Lawson deleted account</h6>
												<span class="small"> <i class="bi bi-clock"></i> 6 min ago</span>
											</div>
										</a>
									</li>

									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="/assets/images/avatar/05.jpg" alt="avatar">
												</div>
											</div>
											<div>
												<h6 class="mb-1">Byan commented on your post</h6>
												<span class="small"> <i class="bi bi-clock"></i> 10 min ago</span>
											</div>
										</a>
									</li>

									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="/assets/images/avatar/03.jpg" alt="avatar">
												</div>
											</div>
											<div>
												<h6 class="mb-1">Settings updated</h6>
												<span class="small"> <i class="bi bi-clock"></i> Yesterday</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<!-- Button -->
							<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
								<a href="#" class="stretched-link">See all incoming activity</a>
							</div>
						</div>
					</div>
					<!-- Notification dropdown menu END -->
				</div>
				<!-- Notification dropdown END -->

				<!-- Profile dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Avatar -->
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="/assets/images/avatar/03.jpg" alt="avatar">
					</a>

					<!-- Profile dropdown START -->
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="/assets/images/avatar/03.jpg" alt="avatar">
								</div>
								<div>
									<a class="h6 mt-2 mt-sm-0" href="#"> Alexandre D. </a>
									<p class="small m-0">Super Administrateur</p>
								</div>
							</div>
							<hr>
						</li>
						<!-- Links -->
						<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Modifier son profil</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Paramètres</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Aidez-moi</a></li>
						<li>
							<a class="dropdown-item" href="#" v-if="loading">
								<i class="bi bi-power fa-fw me-2"></i>Deconnexion en cours ...
							</a>
							<a class="dropdown-item" href="#" @click="logout" v-else>
								<i class="bi bi-power fa-fw me-2"></i>Deconnexion
							</a>
						</li>
						<li class="dropdown-divider mb-3"></li>
						<li>
							<div class="dropdown-item">
								<div class="modeswitch m-0" id="darkModeSwitch">
									<div class="switch"></div>
								</div>
							</div>
						</li>
					</ul>
					<!-- Profile dropdown END -->
				</div>
				<!-- Profile dropdown END -->

			<!-- Nav right END -->
			</div>
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->
</template>
<script>
export default {
  data(){
		return{
			infos:{
				role: null,
				user: null,
			},
			loading: false
		};
	},

	methods:{
			logout(){
				this.loading = true
				axios.post('/api/logout')
				.then(response =>{
						if(response.status == 200){
							if(response.data.success == false){
								if (response.data.message == "Erreur de validation") {

								}
							}else{
								this.loading = false
								this.$toast.success("<h6 style=\"color: #fff \"><i class=\"fa fa-check-circle me-2\"></i> Déconnexion réussie </h6>",{position:"top-right",duration:3527,queue:true,max: 3});
								this.$router.push({name:"home"})
							}
						}
					}
				).catch(error =>{
					console.dir(error)
				})
			}
		},
}
</script>
