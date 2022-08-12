<template>
  <div>
    <!-- SIDEBAR -->
	<section id="sidebar">
		<router-link to="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">TOGO ACTUALITES</span>
		</router-link>
		<ul class="side-menu top">
			<li class="active">
				<router-link to="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau de bord</span>
				</router-link>
			</li>
			<li>
				<router-link to="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Mes actualités</span>
				</router-link>
			</li>
			<li>
				<router-link to="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Mes Categories</span>
				</router-link>
			</li>
			<li>
				<router-link to="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Voir mes messages</span>
				</router-link>
			</li>
			
		</ul>
		<ul class="side-menu">
			<li>
				<router-link to="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Voir mon site</span>
			</router-link>
			</li>
			<li>
				<router-link to="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Deconnexion</span>
			</router-link>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
  <section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<router-link to="#" class="nav-link"> Mes Categories</router-link>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Effectuez une recherche ....">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
    <main>
      <router-view></router-view>
    </main>
  </section>
  </div>
</template>