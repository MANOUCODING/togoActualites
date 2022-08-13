<template>

<headerbar> </headerbar>
    <!-- =======================Trending END -->
    <main>
  <!-- =======================
Inner intro START -->
<section class="pt-4">
	<div class="container">
		<div class="row">
      <div class="col-12">
        <div class="card bg-dark-overlay-4 overflow-hidden card-bg-scale h-400 text-center" style="background-image:url(assets/images/blog/16by9/09.jpg); background-position: center left; background-size: cover;">
          <!-- Card Image overlay -->
          <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
            <div class="w-100 my-auto">
              <h1 class="text-white display-4">Qui Sommes nous ?</h1>
              <!-- breadcrumb -->
              <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                  <li class="breadcrumb-item"><router-link to="/"><i class="bi bi-house me-1"></i> Accueil</router-link></li>
                  <li class="breadcrumb-item active">Qui sommes nous ?</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</section>
<!-- =======================
Inner intro END -->

<!-- =======================
About START -->
<section class="pt-4 pb-0">
	<div class="container">
		<div class="row">
      <div class="col-xl-9 mx-auto">
        <h2>Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.</h2>

        <h3 class="mt-4">Les raisons de la création du site togoactualite sont plusieurs :</h3> <br>
        <ul>
          <li>Fournir les informations fiables sans déformation via notre site internet.</li>
          <li>Permettre à la diaspora togolaise d’être informée de ce qui se passe dans notre cher pays.</li>
          <li>Nouer des partenariats avec d’autres sites d’information.</li>
          <li>Faire mieux connaître notre Togo à travers des débats, vidéos, nos cultures, etc…</li>
          <li>Permettre à nos abonnés de nous suivre et d’animer des débats dans le respect.</li>
        </ul>
        <!-- Team START -->
        <h3 class="mb-3 mt-5">Notre Groupe</h3>
        <div class="row g-4">
          <!-- Team item-->
          <div class="col-sm-12 col-lg-6">
            <div class="text-center">
            	<!-- Avatar img -->
              <div class="avatar avatar-xxl mb-2">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
              </div>
              <h5>Alexandre. D.</h5>
              <p class="m-0">Super Administrateur</p>
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="far fa-envelope"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Team item-->
          <div class="col-sm-12 col-lg-6">
            <div class="text-center">
            	<!-- Avatar img -->
              <div class="avatar avatar-xxl mb-2">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/14.jpg" alt="avatar">
              </div>
              <h5>Joël. D.</h5>
              <p class="m-0">Publicateur d'articles</p>
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="far fa-envelope"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Team item-->
         
          <!-- Team item-->
        </div> <br> <br>
        <!-- Service END -->
      </div>  <!-- Col END -->
     </div>
  </div>
</section>
<!-- =======================
About END -->
 </main>
       <!--==================== MAIN ====================-->
    <footerbar> </footerbar>
</template>
<script>
export default {
  setup() {
    
  },
}
</script>