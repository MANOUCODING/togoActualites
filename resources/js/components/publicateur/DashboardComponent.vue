<template>

    <publicateurheaderbar> </publicateurheaderbar>

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Main contain START -->
<section class="py-4">
	<div class="container">
		<div v-if="load" style="display: block; margin-left: auto; margin-right: auto; margin-top: 20%;" class="conteneur_general_load_10">
      <img src="/assets/images/LOGO PNG.png" style="width: 200px; height: 65px; text-align: center" alt=""> <br> <br>
      <div class="cle_bleu_load_10" style="margin-left: auto; margin-right: auto"></div>
     </div>
     <div  v-else >
		<div class="row g-4">

			<div class="col-12">
				<!-- Counter START -->
				<div class="row g-4">

					
					<div class="col-sm-6 col-lg-6">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
									<i class="bi bi-file-earmark-text-fill"></i>
								</div>
								<!-- Content -->
								<div class="ms-3">
									<h3>{{ infosArticlesCount }}</h3>
									<h6 class="mb-0">Articles publiés</h6>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-lg-6">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
									<i class="bi bi-file-earmark-text-fill"></i>
								</div>
								<!-- Content -->
								<div class="ms-3">
									<h3>{{ infos.articleNotPublishCount }}</h3>
									<h6 class="mb-0">Articles non publiés</h6>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- Counter END -->
			</div>

			<div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Mes articles publiés <span class="badge bg-primary bg-opacity-10 text-primary">{{ infosArticlesCount }}</span></h5>
							<router-link to="/publicateur/articles/not/publish"   class="btn btn-sm btn-primary mb-0"><i class="bi bi-eye"></i>
              &nbsp;Voir Les articles non publiés</router-link>
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body" v-if="empty == 0">

						<!-- Search and select START -->
						<div class="row g-3 align-items-center justify-content-between mb-3">
							<!-- Search -->
							<div class="col-md-12">
								<form class="rounded position-relative">
									<input class="form-control pe-5 bg-transparent" type="search" placeholder="Effectuez une recherche ..." aria-label="Search">
									<button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
								</form>
							</div>
						</div>
						<!-- Search and select END -->

						<!-- Blog list table START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<thead class="table-dark">
									<tr>
										<th scope="col" class="border-0">Titre</th>
										<th scope="col" class="border-0">Auteur</th>
                    <th scope="col" class="border-0">Categorie</th>
                    <th scope="col" class="border-0">Status</th>
                    <th scope="col" class="border-0">A la Une</th>
                    <th scope="col" class="border-0">Publié le </th>
										<th scope="col" class="border-0 rounded-end">Actions</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0" v-for="infosArticle in infosArticles.data" :key="infosArticle.id">
									<!-- Table item -->
                  <td>
                    <h6 class="course-title mt-2 mt-md-0 mb-0" ><a href="#"> {{ infosArticle.title }} </a></h6>
                  </td>

                  <td>
                   
                    <a href="#" style="color: #fff" class="badge text-bg-danger mb-2" v-if="infosArticle.author === 'NON'">   Pas d'auteur</a>
                    <a href="#" style="color: #fff" class="badge text-bg-primary mb-2" v-else> {{ infosArticle.author }}    </a>
                   
                  </td>

                  <td>
                    <a href="#" style="color: #fff" class="badge text-bg-info mb-2"> <i class="fas fa-circle me-2 small fw-bold"></i> {{ infosArticle.category }} </a>
                  </td>

                  <td>
                    
                    <a href="#" style="color: #fff" class="badge text-bg-warning mb-2" @click="changePublish(infosArticle.id)">  {{ infosArticle.publish }}</a>
                    
                  </td>
                  <td>
                   
                    <a href="#" style="color: #fff" @click="changeAlaUneYES(infosArticle.id)" class="badge text-bg-danger mb-2" v-if="infosArticle.aLaUne  == 'NON'">  {{ infosArticle.aLaUne }} </a>
                    <a href="#" @click="changeAlaUneNO(infosArticle.id)" style="color: #fff" class="badge text-bg-info mb-2" v-else>  {{ infosArticle.aLaUne }} </a>
                    
                  </td>
                  <td>
                    <a href="#" style="color: #fff" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ moment(infosArticle.date_publish).format(" MMM DD, YYYY") }}</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger btn-round mb-0" @click="deleteArticle(infosArticle.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimez cet article"><i class="bi bi-trash"></i></a>
                  <router-link :to="{ name:'article.update.slug.publicateur', params: { slug: infosArticle.title }}" class="btn btn-info btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier cet article"><i class="bi bi-pencil-square"></i></router-link>
                    <router-link :to="{ name:'article.show.slug.publicateur', params: { slug: infosArticle.title }}" class="btn btn-primary btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Voir cet article"><i class="bi bi-eye"></i></router-link>
                  </td>
								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->
						<!-- Pagination START -->
             <br>
						<pagination style="float: right" :limit="4" :data="infosArticles" @pagination-change-page="getResults" />
						<!-- Pagination END -->
					</div>
          <div class="card-body" v-else-if="empty == 1">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div style="position: relative; height: 400px;">
                        <img src="/assets/images/empty.png" style="width: 150px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                    </div>
                    <h6 style="text-align: center; margin-top: -50px"> {{ message  }} </h6>
                </div>
                <div class="col-md-3"></div>
            </div>
          </div>
				</div>
				<!-- Blog list table END -->
			</div>
		</div>
		 </div>
	</div>
</section>
<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
    <publicateurfooterbar> </publicateurfooterbar>

</template>
<script>
import moment from 'moment'
export default {
  data() {
      return {
        infosArticles: {},
        infosArticlesCount: null,
        infos: {},
        empty : null,
        message: "",
        loading: false,
        load: true,
      }
  },
  methods: {
    getResults(page = 1){
      axios
        .get('/api/articles/publish/dashboard?page=' + page)
        .then(response => {
          this.load = false
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucune categorie n\'est enregistrée.') {
                this.empty = 1
                this.message = response.data.message
                this.infosArticlesCount= response.data.data.infosArticlesCount
								this.infos= response.data.data
              }else if(response.data.message == 'Aucun article n\'est enregistré.'){
                this.empty = 1
                this.message = response.data.message
                this.infosArticlesCount= response.data.data.infosArticlesCount
								this.infos= response.data.data
              }else if(response.data.message == 'Aucun article publié n\'est enregistré.'){
                this.empty = 1
                this.message = response.data.message
                this.infosArticlesCount= response.data.data.infosArticlesCount
								this.infos= response.data.data
              } else {
                this.empty = 0
                this.infosArticles= response.data.data.infosArticles
								this.infos= response.data.data
                this.infosArticlesCount= response.data.data.infosArticlesCount
              }
            }
          }
      });
    },


    changePublish(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "voulez vous vraiment desactiver cette publication!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, desactiver!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.patch(`/api/article/${id}/publish`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'La publication de cet article a été desactivé.') {
                  this.$swal({
                      title: "Succès!",
                      text: response.data.message,
                      icon: "success",
                      timer: 1000,
                      showConfirmButton: false
                  });
              } else {
                  this.$swal({
                      title: "Erreur",
                      text: response.data.message,
                      icon: "error",
                      timer: 1000
                  });
              }
          });
        }
      });

    },

    changeAlaUneNO(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "voulez vous vraiment enlevez cet article de la une!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, enlevez!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.patch(`/api/article/${id}/alaune`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Cet article a bien été enlevé de à la une.') {
                  this.$swal({
                      title: "Succès!",
                      text: response.data.message,
                      icon: "success",
                      timer: 1000,
                      showConfirmButton: false
                  });
              } else {
                  this.$swal({
                      title: "Erreur",
                      text: response.data.message,
                      icon: "error",
                      timer: 1000
                  });
              }
          });
        }
      });

    },

    changeAlaUneYES(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "voulez vous vraiment mettre cet article à la une!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, Mettre!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.patch(`/api/article/${id}/alaune`)
          .then(response => {
              this.getResults();
                if (response.data.message == "Cet article a bien été mis a la une.") {
                  this.$swal({
                      title: "Succès!",
                      text: response.data.message,
                      icon: "success",
                      timer: 1000,
                      showConfirmButton: false
                  });
              } else {
                  this.$swal({
                      title: "Erreur",
                      text: response.data.message,
                      icon: "error",
                      timer: 1000
                  });
              }
          });
        }
      });

    },


    deleteArticle(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "Vous ne pourrez plus récupérer ces articles!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, supprimez!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.delete(`/api/article/${id}/delete`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'L\' article et ses fichiers ont été supprimés avec succès.') {
                  this.$swal({
                      title: "Succès!",
                      text: response.data.message,
                      icon: "success",
                      timer: 1000,
                      showConfirmButton: false
                  });
              } else {
                  this.$swal({
                      title: "Erreur",
                      text: response.data.message,
                      icon: "error",
                      timer: 1000
                  });
              }
          });
        }
      });

    },
  },

  mounted(){
    this.moment = moment;
    this.getResults();
  }
}
</script>
