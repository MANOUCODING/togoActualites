<template>

    <adminheaderbar> </adminheaderbar>

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
            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <router-link to="/admin/articles/plus/lus">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3>1340</h3>
                                <h6 class="mb-0">Les plus lus</h6>
                            </div>
                        </div>
                    </div>
                </router-link>

            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <router-link to="/admin/articles/plus/comments">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3>1340</h3>
                                <h6 class="mb-0">les plus comment??s</h6>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <router-link to="/admin/articles/plus/alaune">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3>1340</h3>
                                <h6 class="mb-0">A la une</h6>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <router-link to="/admin/articles/publiees">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3>1340</h3>
                                <h6 class="mb-0">Les plus lus</h6>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>

        </div>
        <!-- Counter END -->

         <br>

       <div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Les articles par auteur <span class="badge bg-primary bg-opacity-10 text-primary">{{ infosArticlesCount }}</span></h5>
							<router-link to="/admin/articles/publish"   class="btn btn-sm btn-primary mb-0"><i class="bi bi-plus"></i>
              &nbsp;Ajouter un article</router-link>
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
										<th scope="col" class="border-0">Nom complet de l'auteur</th>
                    <th scope="col" class="border-0">Cat??gorie</th>
                    <th scope="col" class="border-0">Articles</th>
										<th scope="col" class="border-0 rounded-end">Actions</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0" v-for="infosArticle in infosArticles.data" :key="infosArticle.id">
									<!-- Table item -->
                  <td>
                    <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#"> {{ infosArticle.author }} </a></h6>
                  </td>
                  

                  <td>
                    <a href="#" style="color: #fff" class="badge text-bg-danger mb-2"> <i class="fas fa-circle me-2 small fw-bold"></i> {{ infosArticle.categoryCount }} cat??gorie(s) </a>
                  </td>
                   <td>
                    <a href="#" style="color: #fff" class="badge text-bg-primary mb-2"> <i class="fas fa-circle me-2 small fw-bold"></i> {{ infosArticle.articlesCount }} article(s)</a>
                  </td>
                  	<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-danger btn-round mb-0" @click="deleteArticleWithAuthor(infosArticle.author)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimez les articles de cet auteur  "><i class="bi bi-trash"></i></a>
                         <a href="#" class="btn btn-primary btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Voir les articles de cet auteur"><i class="bi bi-eye"></i></a>
                      </div>
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

</section>
<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
    <adminfooterbar> </adminfooterbar>

</template>
<script>
export default {
  data() {
      return {
        infosArticles: {},
        infosArticlesCount: null,
        
        empty : null,
        message: "",
        loading: false,
        load: true,
      }
  },
  methods: {
    getResults(page = 1){
      axios
        .get('/api/articles/by/author?page=' + page)
        .then(response => {
          this.load = false
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucune categorie n\'est enregistr??e.') {
                this.empty = 1
                this.message = response.data.message
                this.infosArticlesCount= response.data.data.infosArticlesCount
              }else if(response.data.message == 'Aucun article n\'est enregistr??.'){
                this.empty = 1
                this.message = response.data.message
                this.infosArticlesCount= response.data.data.infosArticlesCount
              }else if(response.data.message == 'Aucun article publi?? n\'est enregistr??.'){
                this.empty = 1
                this.message = response.data.message
                this.infosArticlesCount= response.data.data.infosArticlesCount
              } else {
                this.empty = 0
                this.infosArticles= response.data.data.infosArticles
                this.infosArticlesCount= response.data.data.infosArticlesCount
              }
            }
          }
      });
    },

    deleteArticleWithAuthor(author) {
       this.$swal({
        title: "Etes-vous s??r?",
        text: "Vous ne pourrez plus r??cup??rer les articles de cet auteur!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, supprimez!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.delete(`/api/article/${author}/delete/author`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Les articles de cet auteur et ses fichiers ont ??t?? supprim??s avec succ??s.') {
                  this.$swal({
                      title: "Succ??s!",
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
    this.getResults();
  }
}
</script>
