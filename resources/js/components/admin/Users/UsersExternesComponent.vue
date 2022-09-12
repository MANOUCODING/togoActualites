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

    

      <div class="row g-4">
            <!-- Counter item -->
            <div class="col-sm-6 col-lg-4">
                <router-link to="/admin/users/statistiques">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                          <div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">
                              <i class="bi bi-bar-chart-line-fill"></i>
                          </div>
                          <!-- Content -->
                          <div class="ms-3">
                              <h3>{{ infos.usersCount  }}</h3>
                              <h6 class="mb-0">Statistiques</h6>
                          </div>
                        </div>
                    </div>
                </router-link>

            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-4">
                <router-link to="/admin/users/externes">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3>{{ infos.usersCount  }}</h3>
                                <h6 class="mb-0">Les utilisateurs externes</h6>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>

             <div class="col-sm-6 col-lg-4">
                <router-link to="/admin/users/internes">
                    <div class="card card-body border p-3">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <!-- Content -->
                            <div class="ms-3">
                                <h3>{{ infos.usersCountHH  }}</h3>
                                <h6 class="mb-0">Les publicateurs d'articles</h6>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>

        </div>

        

      <div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Utilisateurs Externes <span class="badge bg-primary bg-opacity-10 text-primary">{{ infos.usersCount  }}</span></h5>
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
                    <th scope="col" class="border-0">Nom Complet</th>
										<th scope="col" class="border-0">Telephone</th>
										<th scope="col" class="border-0">Email</th>
                    <th scope="col" class="border-0">Status</th>
                    <th scope="col" class="border-0">Ajouté le </th>
										<th scope="col" class="border-0 rounded-end">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0" v-for="info in infos.newsLatters.data" :key="info.id" >
									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">{{ info.nomComplet }}</a></h6>
										</td>

                    <td>
											<h6 class="mb-0"><a href="#">{{ info.telephone }}</a></h6>
										</td>

                    <td>
											<h6 class="mb-0"><a href="#">{{ info.email }}</a></h6>
										</td>

                    <td>
                   
                    <a href="#" style="color: #fff" @click="changeStatusLock(info.id)" class="badge text-bg-info mb-2" v-if="info.status">  Actif </a>
                    <a href="#" @click="changeStatusUnLock(info.id)"  style="color: #fff" class="badge text-bg-danger mb-2" v-else>  Inactif </a>
                    
                  </td>
										<!-- Table data -->
										<td>
											<span class="badge bg-success bg-opacity-10 text-info mb-2"> {{ moment(info.created_at).format(" MMM DD, YYYY") }}</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-danger btn-round mb-0" @click="deleteCategory(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimez cet abonné"><i class="bi bi-trash"></i></a>
                        <a href="#" v-if="info.status" class="btn btn-success btn-round mb-0" @click="changeStatusLock(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Bloquer cet abonné"><i class="bi bi-lock-fill"></i></a>
                        <a href="#" v-else class="btn btn-success btn-round mb-0" @click="changeStatusUnLock(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Débloquer cet abonné"><i class="bi bi-unlock-fill"></i></a>
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
        empty : null,
        message: "",
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
        .get('/api/users/externes?page=' + page)
        .then(response => {
          this.load = false
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucun utilisateur n\'est enregistré.') {
                this.empty = 1
                this.message = response.data.message
                this.infos = response.data.data
              } else {
                this.empty = 0
                this.infos = response.data.data
              }
            }
          }
      });
    },

    changeStatusLock(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "voulez vous vraiment bloquer cet utilisateur!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, bloquer!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.patch(`/api/users/${id}/status`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Cet utilisateur a été bloqué avec succès.') {
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

  changeStatusUnLock(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "voulez vous vraiment débloquer cet utilisateur!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, débloquer!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios.patch(`/api/users/${id}/status`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Cet utilisateur a été débloqué avec succès.') {
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

    
    deleteCategory(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "Vous ne pourrez plus récupérer cet utilisateur!",
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
          .delete(`/api/users/${id}`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Cet utilisateur a ete supprimé avec succès.') {
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