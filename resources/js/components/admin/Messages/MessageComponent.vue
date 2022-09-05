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
                <h5 class="mb-2 mb-sm-0"> Voir le message de {{ data.nomComplet  }}</h5>
                <a href="#" class="btn btn-sm btn-danger mb-0" @click="closeAddCategory">Fermer</a>
              </div>
            </div>
            <div class="card-body">
                <h4>Message de  {{ data.nomComplet  }}</h4>
                <h5>Email: &nbsp; {{ data.email  }} </h5>
                <h5>Telephone:&nbsp; {{ data.telephone  }}</h5>
                <h5>Site Web: &nbsp; <a href="#">{{ data.siteweb  }}</a>  </h5>
                <hr>
                <h5>Sujet: {{ data.sujet  }} </h5>
                <h5>Contenu du Message: </h5>
                <hr>
                <p v-html="data.content"></p>
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
							<h5 class="mb-2 mb-sm-0">Mes Messages <span class="badge bg-primary bg-opacity-10 text-primary">{{ infos.messagesCount  }}</span></h5>
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
										<th scope="col" class="border-0">Nom complet</th>
										<th scope="col" class="border-0">Telephone</th>
                                        <th scope="col" class="border-0">Email</th>
                                        <th scope="col" class="border-0">Sujet</th>
                                        <th scope="col" class="border-0">Envoyé le</th>
										<th scope="col" class="border-0 rounded-end">Actions</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0" v-for="info in infos.messages.data" :key="info.id" >
									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#"> {{ info.id }}</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">{{ info.nomComplet }}</a></h6>
										</td>
										<!-- Table data -->
										<td v-if="info.telephone">{{ info.telephone }}</td>
                                        <td v-else>Pas de numero</td>
										<!-- Table data -->
										<td v-if="info.email">
											{{ info.email }}
										</td>

                                        <td v-else>
											Pas d'email
										</td>
										<!-- Table data -->
                                        <td>
											<h6 class="mb-0"><a href="#">{{ info.sujet }}</a></h6>
										</td>
										<td>
											<span class="badge bg-success bg-opacity-10 text-info mb-2"> {{ moment(info.created_at).format(" MMM DD, YYYY") }}</span>
										</td>
										<!-- Table data -->
										<td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-danger btn-round mb-0" @click="deleteMessage(info.id)"  data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimez cet message"><i class="bi bi-trash"></i></a>
                                                <a href="#" class="btn btn-primary btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Repondre a ce message"  @click="AnswerMessage(info.id)" v-if="!addCategoryButton"><i class="bi bi-send-fill"></i></a>
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
            nomComplet: null,
            telephone: null,
            email: null,
            content: null,
            siteweb: null,
            sujet: null,
        },
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
        .get('/api/messages?page=' + page)
        .then(response => {
          this.load = false
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucun message n\'est enregistrée.') {
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


    AnswerMessage(id){
      this.addCategoryButton = true;
      axios
        .get(`/api/messages/${id}`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucun message trouvé.') {
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


    addCategory(){
      this.addCategoryButton = true;
    },

    closeAddCategory(){
      this.addCategoryButton = false;
    },

    deleteMessage(id) {
       this.$swal({
        title: "Etes-vous sûr?",
        text: "Vous ne pourrez plus récupérer ce message!",
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
          .delete(`/api/message/${id}`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Le message a été supprimé avec succès.') {
                  this.$swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1500
                  });
              } else {
                  this.$swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1500
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
