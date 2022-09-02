<template>

    <adminheaderbar> </adminheaderbar>

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Main contain START -->
<section class="py-4">
	<div class="container-fluid">
     <div v-if="load" style="display: block; margin-left: auto; margin-right: auto; margin-top: 20%;" class="conteneur_general_load_10">
      <img src="/assets/images/LOGO PNG.png" style="width: 200px; height: 65px; text-align: center" alt=""> <br> <br>
      <div class="cle_bleu_load_10" style="margin-left: auto; margin-right: auto"></div>
     </div>
		<div v-else class="row g-4">
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
                                <h6 class="mb-0">les plus commentés</h6>
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
							<h5 class="mb-2 mb-sm-0">Les articles publies <span class="badge bg-primary bg-opacity-10 text-primary">105</span></h5>
							<router-link to="/admin/articles/non/publiees"   class="btn btn-sm btn-primary mb-0">Les articles non publiees</router-link>
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
										<th scope="col" class="border-0 rounded-start">#</th>
										<th scope="col" class="border-0">Titre</th>
										<th scope="col" class="border-0">Fichiers</th>
                                        <th scope="col" class="border-0">Categorie</th>
										<th scope="col" class="border-0">Auteur</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0">A la Une</th>
                                        <th scope="col" class="border-0">Ajouté le </th>
										<th scope="col" class="border-0 rounded-end">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">
									<!-- Table item -->


								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->

						<!-- Pagination START -->
                            <br>
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

</section>
<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
    <adminfooterbar> </adminfooterbar>

</template>
<script>
import moment from 'moment'
export default {
  data() {
      return {
        infos: {},
        data: {
          id: null,
          categoryName: null,
          sousCategoryBoolean: 0,
        },
        empty : null,
        message: "",
        addCategoryButton: false,
        updateCategoryButton: false,
        loading: false,
        errorType: false,
        errorMessage : "",
        errors: {},
        load: true,
      }
  },
  methods: {
    getResults(page = 1){
      axios
        .get('/api/category?page=' + page)
        .then(response => {
          this.load = false
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucune categorie n\'est enregistrée.') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.infos = response.data.data
              }
            }
          }
      });
    },

    saveCategory(){
      this.loading = true
      this.errors = {}
      this.errorType = false
      this.errorMessage  = ""
      axios.post('/api/category/store',{
        categoryName : this.data.categoryName,
        sousCategoryBoolean: this.data.sousCategoryBoolean ? 1 : 0
      })
      .then(response =>{
          if(response.status == 200){

            if(response.data.success == false){
              if (response.data.message == "Erreur de validation") {
                this.loading = false
                this.errors = response.data.errors
              }
            }else{
              if (response.data.message == "Votre catégorie a ete créée avec succès.") {
                this.loading = false
                this.$toast.success("<h6 style=\"color: #fff \"><i class=\"fa fa-check-circle me-2\"></i> Votre catégorie a ete créée avec succès. </h6>",{position:"top-right",duration:3527,queue:true,max: 3});
                this.getResults();
              }
            }
          }
        }
      ).catch(error =>{
        console.dir(error)
      })
      this.data.categoryName = null
      this.data.sousCategoryBoolean = 0
    },

    update(id){
      this.loading = true
      this.errors = {}
      this.errorType = false
      this.errorMessage  = ""
      axios.put(`/api/category/${id}/update`,{
        categoryName : this.data.categoryName,
      })
      .then(response =>{
          if(response.status == 200){

            if(response.data.success == false){
              if (response.data.message == "Erreur de validation") {
                this.loading = false
                this.errors = response.data.errors
              }
            }else{
              if (response.data.message == "Votre catégorie a été modifiée avec succès.") {
                this.loading = false
                this.$toast.success("<h6 style=\"color: #fff \"><i class=\"fa fa-check-circle me-2\"></i> Votre catégorie a été modifiée avec succès. </h6>",{position:"top-right",duration:3527,queue:true,max: 3});
                this.getResults();
              }
            }
          }
        }
      ).catch(error =>{
        console.dir(error)
      })
      this.data.categoryName = null
      this.addCategoryButton = false
    },

    updateCategory(id){
      this.updateCategoryButton = true;
      this.addCategoryButton = false;
      axios
        .get(`/api/category/${id}`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucune catégrie trouvée.') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.data = response.data.data
              }
            }
          }
      });


    },

    closeUpdateCategory(){
      this.updateCategoryButton = false;
    },

    addCategory(){
      this.addCategoryButton = true;
      this.updateCategoryButton = false;
    },

    closeAddCategory(){
      this.addCategoryButton = false;
    },

    sousCategoryBooleanH(){
       this.data.sousCategoryBoolean = 0
    },

    deleteCategory(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "Vous ne pourrez plus récupérer ces actualités!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, supprimez!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios
          .delete(`/api/category/${id}`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'La categorie a été supprimée avec succès.') {
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
