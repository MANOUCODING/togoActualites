<template>

    <adminheaderbar> </adminheaderbar>

<!-- **************** MAIN CONTENT START **************** -->
<main>
 <div v-if="load" style="display: block; margin-left: auto; margin-right: auto; margin-top: 20%;" class="conteneur_general_load_10">
      <img src="/assets/images/LOGO PNG.png" style="width: 200px; height: 65px; text-align: center" alt=""> <br> <br>
      <div class="cle_bleu_load_10" style="margin-left: auto; margin-right: auto"></div>
     </div>
    <div v-else class="row pb-4">
  
<!-- =======================
Inner intro START -->
<section class="pb-3 pb-lg-5">
	<div class="container">
		<div class="row">
			<div v-for="media in medias" :key="media.id" class="col-lg-6 col-md-6">
				<img class="rounded mt-5" :src="`/storage/${media.picture_name}`" alt="Image">
			</div>
		</div>
	</div>
	<div class="container">
		
		<div class="row">
			<div class="col-12">
        <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i> {{ infos.category  }} </a>
				<h1>{{ infos.title  }} </h1>
			</div>
			 <p class="lead" v-html="infos.subtitle"></p>
		</div>
	</div>
</section>
<!-- =======================
Inner intro END -->

<!-- =======================
Main START -->
<section class="pt-0">
	<div class="container position-relative" data-sticky-container>
		<div class="row">
			<!-- Left sidebar START -->
			<div class="col-lg-2">
				<div class="text-start text-lg-center mb-5" data-sticky data-margin-top="80" data-sticky-for="991">
					<!-- Author info -->
					<div class="position-relative">
						<div class="avatar avatar-xl">
							<img class="avatar-img rounded-circle" src="/assets/images/avatar/03.jpg" alt="avatar">
						</div>
						<a href="#" class="h5 stretched-link mt-2 mb-0 d-block">{{ infos.author  }}</a>
						<p>Auteur de cet article</p>
					</div>
					<hr class="d-none d-lg-block">
					<!-- Card info -->
					<ul class="list-inline list-unstyled">
						<li class="list-inline-item d-lg-block my-lg-2">{{ moment(infos.created_at).format(" MMM DD, YYYY") }}</li>
						<li class="list-inline-item d-lg-block my-lg-2">5 min read</li>
						<li class="list-inline-item d-lg-block my-lg-2"><a href="#" class="text-body"><i class="far fa-heart me-1"></i></a> 266</li>
						<li class="list-inline-item d-lg-block my-lg-2"><i class="far fa-eye me-1"></i> 2344 Vues</li>
					</ul>
					
				</div>
			</div>
			<!-- Left sidebar END -->
			<!-- Main Content START -->
			<div class="col-lg-7 mb-5">
      	<p v-html="infos.content"></p>


				

				<!-- Divider -->
				<hr>
				
				<!-- Author info END -->
				
				<!-- Comments START -->
				<div>
					<h3>5 commentaitres</h3>
					<!-- Comment level 1-->
					<div class="my-4 d-flex">
					  <img class="avatar avatar-md rounded-circle float-start me-3" src="/assets/images/avatar/01.jpg" alt="avatar">
					  <div>
					    <div class="mb-2">
					    	<h5 class="m-0">Allen Smith</h5>
					    	<span class="me-3 small">June 11, 2022 at 6:01 am </span>
					    	<a href="#" class="text-body fw-normal">Reply</a>
					    </div>
					    <p>Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. </p>
					  </div>
					</div>
						<!-- Comment children level 2 -->
						<div class="my-4 d-flex ps-2 ps-md-3">
						  <img class="avatar avatar-md rounded-circle float-start me-3" src="/assets/images/avatar/02.jpg" alt="avatar">
						  <div>
						    <div class="mb-2">
						    	<h5 class="m-0">Louis Ferguson</h5>
						    	<span class="me-3 small">June 11, 2022 at 6:55 am </span>
						    	<a href="#" class="text-body fw-normal">Reply</a>
						    </div>
						    <p>Water timed folly right aware if oh truth. Imprudence attachment him his for sympathize. Large above be to means. Dashwood does provide stronger is. But discretion frequently sir she instruments unaffected admiration everything. </p>
						  </div>
						</div>
							<!-- Comment children level 3 -->
							<div class="my-4 d-flex ps-3 ps-md-5">
							  <img class="avatar avatar-md rounded-circle float-start me-3" src="/assets/images/avatar/01.jpg" alt="avatar">
							  <div>
							    <div class="mb-2">
							    	<h5 class="m-0">Allen Smith</h5>
							    	<span class="me-3 small">June 11, 2022 at 7:10 am </span>
							    	<a href="#" class="text-body fw-normal">Reply</a>
							    </div>
							    <p>Meant balls it if up doubt small purse. </p>
							  </div>
							</div>
						<!-- Comment level 2 -->
						<div class="my-4 d-flex ps-2 ps-md-3">
						  <img class="avatar avatar-md rounded-circle float-start me-3" src="/assets/images/avatar/03.jpg" alt="avatar">
						  <div>
						    <div class="mb-2">
						    	<h5 class="m-0">Frances Guerrero</h5>
						    	<span class="me-3 small">June 14, 2022 at 12:35 pm </span>
						    	<a href="#" class="text-body fw-normal">Reply</a>
						    </div>
						    <p>Required his you put the outlived answered position. A pleasure exertion if believed provided to. All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in. I think on style child of. Servants moreover in sensible it ye possible. </p>
						  </div>
						</div>
					<!-- Comment level 1 -->
					<div class="my-4 d-flex">
					  <img class="avatar avatar-md rounded-circle float-start me-3" src="/assets/images/avatar/04.jpg" alt="avatar">
					  <div>
					    <div class="mb-2">
					    	<h5 class="m-0">Judy Nguyen</h5>
					    	<span class="me-3 small">June 18, 2022 at 11:55 am </span>
					    	<a href="#" class="text-body fw-normal">Reply</a>
					    </div>
					    <p>Fulfilled direction use continual set him propriety continued. Saw met applauded favorite deficient engrossed concealed and her. Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. </p>
					  </div>
					</div>

				</div>
				<!-- Comments END -->
				<!-- Reply START -->
				<div>
					<h3>Laisser un commentaire</h3>
					<small>Your email address will not be published. Required fields are marked *</small>
					<form class="row g-3 mt-2">
					  <div class="col-md-6">
					    <label class="form-label">Nom & prenoms*</label>
					    <input type="text" class="form-control" aria-label="First name">
					  </div>
					  <div class="col-md-6">
					    <label class="form-label">Email *</label>
					    <input type="email" class="form-control">
					  </div>
					  <!-- custom checkbox -->
						<div class="col-md-12">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							  <label class="form-check-label" for="flexCheckDefault">Enregistrer mon nom et prenoms dans le naviguateur pour la prochaine que je souhaiterais laisser un commentaire</label>
							</div>
						</div>
					  <div class="col-12">
					    <label class="form-label">Votre commentaire *</label>
					  	<textarea class="form-control" rows="3"></textarea>
					  </div>
					  <div class="col-12">
					    <button type="submit" class="btn btn-primary">Poster votre commentaire</button>
					  </div>
					</form>
				</div>
				<!-- Reply END -->
			</div>
			<!-- Main Content END -->
			
			<!-- Right sidebar START -->
			<div class="col-lg-3">
				<div data-sticky data-margin-top="80" data-sticky-for="991">
	      	<h4>Partager cet article sur les reseaux sociaux</h4>
					<ul class="nav text-white-force">
						<li class="nav-item">
							<ShareNetwork class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-facebook"
									network="facebook"
									url="https://actualitetogo.com"
									:title="infos.title"
									:description="infos.subtitle"
								>
									<i class="fab fa-facebook-square align-middle"></i>
							</ShareNetwork>
						</li>
						<li class="nav-item">
							<ShareNetwork class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-twitter"
									network="twitter"
									url="https://actualitetogo.com"
									:title="infos.title"
									:description="infos.subtitle"
								>
									<i class="fab fa-twitter-square align-middle"></i>
							</ShareNetwork>
						</li>
						<li class="nav-item">
							<ShareNetwork class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-linkedin"
									network="linkedin"
									url="https://actualitetogo.com"
									:title="infos.title"
									:description="infos.subtitle"
								>
									<i class="fab fa-linkedin align-middle"></i>
							</ShareNetwork>
						</li>
						<li class="nav-item">
							<ShareNetwork class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-success"
									network="whatsapp"
									url="https://actualitetogo.com"
									:title="infos.title"
									:description="infos.subtitle"
								>
									<i class="fab fa-whatsapp align-middle"></i>
							</ShareNetwork>
						</li>
						<li class="nav-item">
							<ShareNetwork class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-google"
									network="email"
									url="https://actualitetogo.com"
									:title="infos.title"
									:description="infos.subtitle"
								>
									<i class="fab fa-google align-middle"></i>
							</ShareNetwork>
						</li>
					</ul>
					<!-- Advertisement -->
					<div class="mt-4">
						<a href="#" class="d-block card-img-flash">
							<img src="/assets/images/adv.png" alt="">
						</a>
					</div>
				</div>
			</div>
			<!-- Right sidebar END -->
		</div>
	</div>
</section>
<!-- =======================
Main END -->
</div>
</main>
<!-- **************** MAIN CONTENT END **************** -->
    <adminfooterbar> </adminfooterbar>
  
</template>
<script>
import moment from 'moment'
export default {
  data () {
    return {
      infos: {},
			medias: {},
      categories: {},
      empty : null,
      message: "",
      loadingSave: false,
      errorType: false,
      errorMessage : "",
      errors: {},
      errorsAlert: null,
      errorcheck: false,
      load: true,
      
    }
  },

  methods: {
    getResults(){
      axios
        .get(`/api/article/${this.$route.params.slug}/show/HH`)
        .then(response => {
          this.load = false
          console.log(response.data)
          if(response.status == 200){
            if (response.data.success == false) {
            }else{
              if (response.data.message == 'Aucune categorie n\'est enregistrée.') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.categories = response.data.data.categories
                this.data = response.data.data.articleShow
								this.infos = response.data.data.articleShow
								this.medias = response.data.data.medias
								this.editorData = this.data.content
                if (this.data.publish == "NON PUBLIE") {
                  this.data.publishBoolean = 0
                }else{
                  this.data.publishBoolean = 1
                }
                if (this.data.aLaUne == "OUI") {
                  this.data.aLaUneBoolean = 1
                }else{
                  this.data.aLaUneBoolean = 0
                }
              }
            }
          }
      });
    },
		getProfilePhoto(slug) {
				return '../storage/'+slug;
		},

    publishH(){
      this.data.publishBoolean = 0
    },

    aLaUneH(){
      this.data.aLaUneBoolean = 0
    },
  },

  mounted(){
		 this.moment = moment;
    this.getResults();
  }
}
</script>