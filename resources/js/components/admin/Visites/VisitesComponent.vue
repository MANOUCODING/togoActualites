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


      <div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Statistiques des visites <span class="badge bg-primary bg-opacity-10 text-primary">{{ infos.visitesCount  }}</span></h5>
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body" v-if="empty == 0">

						<!-- Search and select START -->
						<div class="row g-3 align-items-center justify-content-between mb-3">
							<!-- Search -->
						</div>
						<!-- Search and select END -->

						<!-- Blog list table START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<thead class="table-dark">
									<tr>
										<th scope="col" class="border-0 rounded-start">#</th>
										<th scope="col" class="border-0">Moment</th>
										<th scope="col" class="border-0">Nombres de vistes</th>
                                        <th scope="col" class="border-0">Nombres d'articles consultes</th>
										<th scope="col" class="border-0 rounded-end">Actions</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">
									<!-- Table item -->
                                    <tr>
                                        <th scope="col">1</th>
                                        <th scope="col">Depuis 01 heure</th>
                                        <th scope="col">{{ infos.countVisitesH  }} visites</th>
                                        <th scope="col">{{ infos.countArticlesH  }} articles</th>
										<!-- Table data -->
										<td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-primary btn-round mb-0" @click="showArticlesConsult(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Voir les articles consultes"><i class="bi bi-eye"></i></a>
                                            </div>
										</td>
									</tr>

                                    <tr>
                                        <th scope="col">1</th>
                                        <th scope="col">Depuis 24 heures</th>
                                        <th scope="col">{{ infos.countVisitesJ  }} visites</th>
                                        <th scope="col">{{ infos.countArticlesJ  }} articles</th>
										<!-- Table data -->
										<td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-primary btn-round mb-0" @click="showArticlesConsult(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Voir les articles consultes"><i class="bi bi-eye"></i></a>
                                            </div>
										</td>
									</tr>

                                    <tr>
                                        <th scope="col">1</th>
                                        <th scope="col">Depuis 07 jours</th>
                                        <th scope="col">{{ infos.countVisitesW  }} visites</th>
                                        <th scope="col">{{ infos.countArticlesW  }} articles</th>
										<!-- Table data -->
										<td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-primary btn-round mb-0" @click="showArticlesConsult(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Voir les articles consultes"><i class="bi bi-eye"></i></a>
                                            </div>
										</td>
									</tr>

                                    <tr>
                                        <th scope="col">1</th>
                                        <th scope="col">Depuis 01 mois</th>
                                        <th scope="col">{{ infos.countVisitesM  }} visites</th>
                                        <th scope="col">{{ infos.countArticlesM  }} articles</th>
										<!-- Table data -->
										<td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-primary btn-round mb-0" @click="showArticlesConsult(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Voir les articles consultes"><i class="bi bi-eye"></i></a>
                                            </div>
										</td>
									</tr>
								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->

						<!-- Pagination START -->
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
        addCategoryButton: false,
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
        .get('/api/visites')
        .then(response => {
          this.load = false
          if(response.status == 200){
            console.log(response.data);
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucune visite n\'est enregistrée.') {
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


  },

  mounted(){
    this.moment = moment;
    this.getResults();
  }
}
</script>
