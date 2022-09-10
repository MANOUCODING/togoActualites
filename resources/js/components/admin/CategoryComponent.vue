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
		<div v-else class="row g-4">

    <div class="col-12" v-if="addCategoryButton">
				<!-- Latest blog START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header -->
						<div class="card-header bg-transparent border-bottom p-3">
              <div class="d-sm-flex justify-content-between align-items-center">
                <h5 class="mb-2 mb-sm-0">Ajouter une catégorie</h5>
                <a href="#" class="btn btn-sm btn-danger mb-0" @click="closeAddCategory">Fermer</a>
              </div>
					  </div>
            <div class="card-body">
              <form class="rounded position-relative">
                <div class="row">
                  <div class="col-md-9"  v-if="!errors.categoryName">
                    <input class="form-control pe-5 bg-transparent" type="text" name="categoryName" v-model="data.categoryName" placeholder="Entrez le nom de la catégorie">
                  </div>
                  <div class="col-md-9"  v-else>
                    <input class="form-control pe-5 bg-transparent is-invalid" name="categoryName" v-model="data.categoryName" type="text" placeholder="Entrez le nom de la catégorie">
                    <div  v-for="error_categoryName in errors.categoryName" :key="error_categoryName" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_categoryName }}
                    </div>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="btn btn-primary mb-0" v-if="loading">Enregistrement en cours...</a>
                     <a href="#" class="btn btn-primary mb-0" v-else @click.prevent="saveCategory">Enregistrez</a>
                  </div>
                </div>
              </form>
            </div>
				</div>
				<!-- Latest blog END -->
			</div>

      <div class="col-12" v-if="updateCategoryButton">
				<!-- Latest blog START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header -->
						<div class="card-header bg-transparent border-bottom p-3">
              <div class="d-sm-flex justify-content-between align-items-center">
                <h5 class="mb-2 mb-sm-0">Modifier une catégorie</h5>
                <a href="#" class="btn btn-sm btn-danger mb-0" @click="closeUpdateCategory">Fermer</a>
              </div>
					  </div>
            <div class="card-body">
              <form class="rounded position-relative">
                <div class="row">
                  <div class="col-md-9"  v-if="!errors.categoryName">
                    <input class="form-control pe-5 bg-transparent" type="text" name="categoryName" v-model="data.categoryName" placeholder="Entrez le nom de la catégorie">
                  </div>
                  <div class="col-md-5"  v-else>
                    <input class="form-control pe-5 bg-transparent is-invalid" name="categoryName" v-model="data.categoryName" type="text" placeholder="Entrez le nom de la catégorie">
                    <div  v-for="error_categoryName in errors.categoryName" :key="error_categoryName" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_categoryName }}
                    </div>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="btn btn-primary mb-0" v-if="loading">Modification en cours...</a>
                     <a href="#" class="btn btn-primary mb-0" v-else @click.prevent="update(data.id)">Modifier</a>
                  </div>
                </div>
              </form>
            </div>
				</div>
				<!-- Latest blog END -->
			</div>

      <div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Mes catégories <span class="badge bg-primary bg-opacity-10 text-primary">{{ infos.categoryCount  }}</span></h5>
							<a href="#" class="btn btn-sm btn-primary mb-0" @click="addCategory" v-if="!addCategoryButton">Ajouter une catégorie</a>
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
										
										<th scope="col" class="border-0">Nom de la catégorie</th>
										<th scope="col" class="border-0">Articles</th>
										<th scope="col" class="border-0">Status</th>
                    <th scope="col" class="border-0">Ajouté le </th>
										<th scope="col" class="border-0 rounded-end">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0" v-for="info in infos.categories.data" :key="info.id" >
									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">{{ info.categoryName }}</a></h6>
										</td>
										<!-- Table data -->
										<td v-if="info.countArticles == 0"><a href="#" style="color: #fff" class="badge text-bg-danger mb-2"> <i class="fas fa-circle me-2 small fw-bold"></i> Pas d'articles </a></td>
                    <td v-else><a href="#" style="color: #fff" class="badge text-bg-primary mb-2"> <i class="fas fa-circle me-2 small fw-bold"></i> {{ info.countArticles }} article(s) </a></td>
										<!-- Table data -->
										<td v-if="info.status">
											<a href="#" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Active</a>
										</td>

                    <td v-else>
											<a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Inactive</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-success bg-opacity-10 text-info mb-2"> {{ moment(info.created_at).format(" MMM DD, YYYY") }}</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-danger btn-round mb-0" @click="deleteCategory(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimez cette catégorie"><i class="bi bi-trash"></i></a>
                        <a href="#" class="btn btn-primary btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifiez cette catégorie"  @click="updateCategory(info.id)"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->

						<!-- Pagination START -->
            <br>
						<pagination style="float: right" :limit="4" :data="infos" @pagination-change-page="getResults" />
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