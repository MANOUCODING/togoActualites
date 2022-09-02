<template>
  
<headerbar> </headerbar>
    <!-- =======================Trending END -->
    <main>
<!-- =======================
Inner intro START -->
<section>
	<div class="container">
		<div class="row">
      <div class="col-md-9 mx-auto text-center">
        <h1 class="display-4">Nous Contactez</h1>
        <!-- breadcrumb -->
        <nav class="d-flex justify-content-center" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-dots mb-0">
            <li class="breadcrumb-item"><router-link to="/"><i class="bi bi-house me-1"></i> Accueil</router-link></li>
            <li class="breadcrumb-item active">Nous Ecrire</li>
          </ol>
        </nav>      
      </div>
    </div>
	</div>
</section>
<!-- =======================
Inner intro END -->

<!-- =======================
Contact info START -->
<section class="pt-4">
	<div class="container">
		<div class="row">
      <div class="col-xl-9 mx-auto">
        <!-- <iframe class="w-100 h-300 grayscale" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>	 -->
        <div class="row mt-5">
          <div class="col-sm-12 mb-5 mb-sm-0">
            <h3>TOGO ACTUALITÉ</h3>
            <p>Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.</p>
            <address>Lorem Ipsum, 40C, Lorem Ipsum dummy, Lorem Ipsum, Ch 98054</address>
            <p>Téléphone: <a href="#" class="text-reset"><u>+33 06 14 30 57 86, +228 99 56 57 88</u></a></p>
            <p>Email: <a href="#" class="text-reset"><u>contact@togoactualite.com</u></a></p>
            <p>Heures de services:
              Lundi à Vendredi de  9:30am à 6:30 pm
              <br>
            </p>
          </div>
        </div>
        
        <hr class="my-5">
        
        <div class="row">
          <div class="col-12">
          <h2>NOUS ENVOYER UN MESSAGE</h2>
          <p>Pour nous contacter veuillez utiliser le formulaire ci-dessous.</p>
          <!-- Form START -->
          <form class="contact-form" id="contact-form" name="contactform" method="POST">
            <!-- Main form -->
            <div class="row">
              <div class="col-md-6">
                <!-- name -->
                <div class="mb-3"  v-if="!errors.nomComplet">
                  <input required id="con-email" name="nomComplet" v-model="data.nomComplet"  type="text" class="form-control" placeholder="Noms & Prénoms (*)">
                </div>
                <div class="mb-3"  v-else>
                   <input required id="con-email" name="nomComplet" v-model="data.nomComplet"  type="text" class="form-control" placeholder="Noms & Prénoms (*)">
                  <div  v-for="error_nomComplet in errors.nomComplet" :key="error_nomComplet" class="invalid-feedback" style="color: red; font-size: 0.9em">
                      {{ error_nomComplet }}
                  </div>
                </div>
              </div>
               <div class="col-md-6">
                <!-- name -->
                <div class="mb-3"  v-if="!errors.telephone">
                  <input required id="con-email" name="telephone" v-model="data.telephone"  type="number" class="form-control" placeholder="Numero de Télephone">
                </div>
                <div class="mb-3"  v-else>
                   <input required id="con-email" name="telephone" v-model="data.telephone"  type="number" class="form-control" placeholder="Numero de Télephone">
                  <div  v-for="error_telephone in errors.telephone" :key="error_telephone" class="invalid-feedback" style="color: red; font-size: 0.9em">
                      {{ error_telephone }}
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <!-- email -->
                 <div class="mb-3"  v-if="!errors.email">
                  <input required id="con-email" name="email" v-model="data.email"  type="email" class="form-control" placeholder="Votre email(*)">
                </div>
                <div class="mb-3"  v-else>
                   <input required id="con-email" name="email" v-model="data.email"  type="email" class="form-control" placeholder="Votre email(*)">
                  <div  v-for="error_email in errors.email" :key="error_email" class="invalid-feedback" style="color: red; font-size: 0.9em">
                      {{ error_email }}
                  </div>
                </div>
              </div>
               <div class="col-md-12">
                <!-- Subject -->
                <div class="mb-3"  v-if="!errors.siteweb">
                  <input required id="con-email" name="siteweb" v-model="data.siteweb"  type="text" class="form-control" placeholder="Votre Site Web (Pas obligatoire)">
                </div>
                <div class="mb-3"  v-else>
                   <input required id="con-email" name="siteweb" v-model="data.siteweb"  type="text" class="form-control" placeholder="Votre Site Web (Pas obligatoire)">
                  <div  v-for="error_siteweb in errors.siteweb" :key="error_siteweb" class="invalid-feedback" style="color: red; font-size: 0.9em">
                      {{ error_siteweb }}
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <!-- Subject -->
                <div class="mb-3"  v-if="!errors.sujet">
                  <input required id="con-email" name="sujet" v-model="data.sujet"  type="text" class="form-control" placeholder="Votre Site Web (Pas obligatoire)">
                </div>
                <div class="mb-3"  v-else>
                   <input required id="con-email" name="sujet" v-model="data.sujet"  type="text" class="form-control" placeholder="Votre Sujet ou requête">
                  <div  v-for="error_sujet in errors.sujet" :key="error_sujet" class="invalid-feedback" style="color: red; font-size: 0.9em">
                      {{ error_sujet }}
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <!-- Message -->
                <div class="mb-3" v-if="!errors.content">
                    	<ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                  </div>
                  <div class="mb-3" v-else>
                    	<ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                       <div  v-for="error_content in errors.content" :key="error_content" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_content }}
                    </div>
                  </div>
              </div>
              <!-- submit button -->
              <div class="col-md-6 text-start"><button class="btn btn-primary w-100" type="submit">Envoyez le message</button></div>
              <div class="col-md-6 text-start"><button class="btn btn-success w-100" type="submit">Nous écrire sur Whatsapp</button></div>
            </div>
          </form>
			  	<!-- Form END -->
          </div>
        </div>
      </div>  <!-- Col END -->
     </div>
  </div>
</section>
<!-- =======================
Contact info END -->
 </main>
       <!--==================== MAIN ====================-->
    <footerbar> </footerbar>
</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default{
  data () {
    return {
      categories: {},
      data: {
        nomComplet: null,
        telephone: null,
        email: null,
        content: null,
        siteweb: null,
        sujet: null,
      },
      editor: ClassicEditor,
      editorData: '<p>Entrer votre message ici.</p>',
      editorConfig: {
          // The configuration of the editor.
      },
      empty : null,
      message: "",
      loadingSave: false,
      errorType: false,
      errorMessage : "",
      errors: {},
      load: true,
    }
  },

  methods: {
    getResults(){
      this.load = false
    },
     create(){

      this.data.content = this.editorData
      
      this.loadingSave = true
      axios.post('/api/message/store', this.data)
      .then(response => {
          console.log(response.data)
          if(response.status == 200){
            this.loadingSave = false
            if (response.data.success == false) {
              if (response.data.message == "Erreur de validation") {
                this.errors = response.data.errors
              }else if(response.data.message == "Ooops Desolé. Vous ne pouvez pas mettre un article à la Une sans le publier"){
                this.errorcheck = true
                this.errorsAlert = response.data.message
              }
            }else{
              if (response.data.message == 'Message envoyé avec succès' ) {
                this.$swal({
                  title: "Succès!",
                  text:  response.data.message,
                  icon: "success",
                  timer: 1000,
                  showConfirmButton: false
                });
               
              }
            }
          }
      });
    },
   
  },

  mounted(){
    this.getResults();
  }
}
</script>