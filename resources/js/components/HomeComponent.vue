<template>
    <div v-if="load" style="display: block; margin-left: auto; margin-right: auto; margin-top: 20%;" class="conteneur_general_load_10">
    <img src="assets/images/TOgoActualité Final.png" style="width: 210px; text-align: center" alt=""> <br> <br>
    <div class="cle_bleu_load_10" style="margin-left: auto; margin-right: auto"></div>
</div>
    <headerbar> </headerbar>
    <!-- =======================Trending END -->
    <main>
            <section class="pt-4">
        <div class="container">
            <div class="row">
        <div class="col-12">
            <div class="card bg-dark-overlay-4 overflow-hidden card-bg-scale h-400 text-center" style="background-image:url(assets/images/blog/16by9/09.jpg); background-position: center left; background-size: cover;">
            <!-- Card Image overlay -->
            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                <div class="w-100 my-auto">
                <h1 class="text-white display-4">Désolé Cette partie est en maintenance pour le moment</h1>
                <!-- breadcrumb -->
                <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                    <li class="breadcrumb-item"><router-link to="/"><i class="bi bi-house me-1"></i> Accueil</router-link></li>
                    </ol>
                </nav>
                </div>
            </div>
            </div>
        </div>
    </div>
	</div>
</section>
             </main>
       <!--==================== MAIN ====================-->
    <footerbar> </footerbar>

</template>
<script>
export default {
  data(){
		return {
            infos: {},
            load: true,
        }
	},
    methods: {
         getResults(){
            this.load = false
        },
    },
    mounted() {
        this.getResults();
    }
}
</script>