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
    <div v-else class="row pb-4">
			<div class="col-12">
        <!-- Title -->
					<h1 class="mb-0 h2">Ajouter un article</h1>
			</div>
		</div>
		<div class="row" v-if="empty === 0">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">
            <div class="alert alert-danger" v-if="errorcheck" role="alert">
              {{ errorsAlert  }}
            </div>
            <!-- Form START -->
            <form action="" method="POST" enctype="multipart/form-data">
              <!-- Main form -->
              <div class="row">
                <div class="col-12">
                  <!-- Post name -->
                  <div class="mb-3"  v-if="!errors.title">
                    <label class="form-label">Titre de l'article</label>
                    <input class="form-control pe-5 bg-transparent" type="text" name="title" v-model="data.title" placeholder="Entrez le titre de l'article">
                  </div>
                  <div class="mb-3"  v-else>
                    <label class="form-label">Titre de l'article</label>
                    <input class="form-control pe-5 bg-transparent is-invalid" name="title" v-model="data.title" type="text" placeholder="Entrez le titre de l'article">
                    <div  v-for="error_title in errors.title" :key="error_title" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_title }}
                    </div>
                  </div>
                </div>
                <!-- Post type START -->

              <!-- Post type END -->

              <!-- Short description -->
              <div class="col-12">
                 <div class="mb-3"  v-if="!errors.subtitle">
                    <label class="form-label">Sous-titre de l'article ou une petite description (Pas obligatoire)</label>
                    <input class="form-control pe-5 bg-transparent" type="text" name="subtitle" v-model="data.subtitle" placeholder="Entrez un sous-titre de l'article ou une petite description">
                  </div>
                  <div class="mb-3"  v-else>
                     <label class="form-label">Sous-titre de l'article ou une petite description (Pas obligatoire)</label>
                    <input class="form-control pe-5 bg-transparent is-invalid" name="subtitle" v-model="data.subtitle" type="text" placeholder="Entrez un sous-titre de l'article ou une petite description">
                    <div  v-for="error_subtitle in errors.subtitle" :key="error_subtitle" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_subtitle }}
                    </div>
                  </div>
              </div>

               <div class="col-12">
                 <div class="mb-3"  v-if="!errors.author">
                    <label class="form-label">Noms & Prénoms de l'Auteur (Pas obligatoire)</label>
                    <input class="form-control pe-5 bg-transparent" type="text" name="author" v-model="data.author" placeholder="Entrez le noms et le prenoms de l'auteur">
                  </div>
                  <div class="mb-3"  v-else>
                     <label class="form-label">Noms & Prénoms de l'Auteur (Pas obligatoire)</label>
                    <input class="form-control pe-5 bg-transparent is-invalid" name="author" v-model="data.author" type="text" placeholder="Entrez le noms et le prenoms de l'auteur">
                    <div  v-for="error_author in errors.author" :key="error_author" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_author }}
                    </div>
                  </div>
              </div>


              <!-- Main toolbar -->
                <div class="col-md-12">
                  <!-- Subject -->
                  <div class="mb-3" v-if="!errors.content">
                    <label class="form-label">Contenu de l'article</label>
                    	<ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                  </div>
                  <div class="mb-3" v-else>
                    <label class="form-label">Contenu de l'article</label>
                    	<ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                       <div  v-for="error_content in errors.content" :key="error_content" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_content }}
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                  <!-- Image -->
                  <div class="position-relative">
                    <h6 class="my-2">Inserez vos fichiers ici</h6>
                    <label class="w-100" style="cursor:pointer;">
                      <span>
                        <input type="file" multiple @change="fieldChange" name="files[]" label="Déposez les fichiers ici ou cliquez pour uploader" help="Uploader des fichiers ici et ils ne seront pas envoyés immédiatement" is="drop-files" />
                      </span>
                    </label>
                  </div>
                  </div>
                </div> <br>
                <div class="col-lg-12">
                  <!-- Message -->
                  <div class="mb-3" v-if="!errors.category_id">
                    <label class="form-label">Choisir une catégorie</label>
                    <select class="form-select" aria-label="Default select example" v-model="data.category_id">
                      <option  v-for="category in categories" :key="category.id" :value="category.id">{{ category.categoryName }}</option>
                    </select>
                  </div>
                  <div class="mb-3" v-else>
                    <label class="form-label">Choisir une catégorie</label>
                    <select class="form-select" aria-label="Default select example" v-model="data.category_id">
                      <option  v-for="category in categories" :key="category.id" :value="category.id">{{ category.categoryName }}</option>
                    </select>
                      <div  v-for="error_category in errors.category_id" :key="error_category" class="invalid-feedback" style="color: red; font-size: 0.9em">
                        {{ error_category }}
                    </div>
                  </div>
                </div>  <br>
                 <div class="col-6">
                  <div v-if="data.publishBoolean">
                    <h5>Voulez vous publier cet article ? </h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="publishBoolean" v-model="data.publishBoolean" checked="" class="custom-control-input"><span class="custom-control-label">&nbsp;OUI</span>
                    </label> &nbsp; &nbsp; &nbsp;
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="publishBoolean" v-model="data.publishBoolean"   @click="publishH()" class="custom-control-input"><span class="custom-control-label">&nbsp;NON</span>
                    </label>
                  </div>
                  <div v-else>
                    <h5> Voulez vous publier cet article ? </h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="publishBoolean" v-model="data.publishBoolean" class="custom-control-input"><span class="custom-control-label">&nbsp;OUI</span>
                    </label> &nbsp; &nbsp; &nbsp;
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="publishBoolean" v-model="data.publishBoolean"  checked="" class="custom-control-input"><span class="custom-control-label">&nbsp;NON</span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div v-if="data.aLaUneBoolean">
                    <h5>Voulez vous mettre cet article à la Une ? </h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="aLaUneBoolean" v-model="data.aLaUneBoolean" checked="" class="custom-control-input"><span class="custom-control-label">&nbsp;OUI</span>
                    </label> &nbsp; &nbsp; &nbsp;
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="aLaUneBoolean" v-model="data.aLaUneBoolean"   @click="aLaUneH()" class="custom-control-input"><span class="custom-control-label">&nbsp;NON</span>
                    </label>
                  </div>
                  <div v-else>
                    <h5> Voulez vous mettre cet article à la Une ? </h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="aLaUneBoolean" v-model="data.aLaUneBoolean" class="custom-control-input"><span class="custom-control-label">&nbsp;OUI</span>
                    </label> &nbsp; &nbsp; &nbsp;
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="aLaUneBoolean" v-model="data.aLaUneBoolean"  checked="" class="custom-control-input"><span class="custom-control-label">&nbsp;NON</span>
                    </label>
                  </div>
                </div>
                 <br>
                <!-- Create post button -->
                <div class="col-md-12 text-start"> <br>
                  <button class="btn btn-primary w-100" v-if="!loadingSave" type="submit" @click.prevent="create">Enregistrer cet article</button>
                   <button class="btn btn-primary w-100" v-else type="button">Enregistement de l'article en cours ...</button>
                </div>
              </div>
            </form>
            <!-- Form END -->
					</div>
				</div>
				<!-- Chart END -->
			</div>
    </div>
     <div class="row" v-else-if="empty == 1">
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
</section>
<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
    <publicateurheaderbar> </publicateurheaderbar>

</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import '@grafikart/drop-files-element'
export default{
  data () {
    return {
      categories: {},
      data: {
        title: null,
        subtitle: null,
        author: null,
        content: null,
        category_id: null,
        aLaUne: "NON",
        publish: "NON PUBLIE",
        publishBoolean: 0,
        aLaUneBoolean: 0,
      },
      editor: ClassicEditor,
      editorData: '<p>Entrer votre contenu</p>',
      editorConfig: {
          // The configuration of the editor.
      },
      empty : null,
      message: "",
      loadingSave: false,
      errorType: false,
      errorMessage : "",
      errors: {},
      errorsAlert: null,
      errorcheck: false,
      load: true,
      attachement: [],
      form : new FormData
    }
  },

  methods: {
    getResults(){
      axios
        .get('/api/articles/create')
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
                this.categories = response.data.data
              }
            }
          }
      });
    },

    fieldChange(e){
        let selectedFiles = e.target.files

        if(!selectedFiles.length){

          return false;

        }

        for(let i = 0; i< selectedFiles.length; i++){

          this.attachement.push(selectedFiles[i])

        }

       console.log(this.attachement)

    },

     create(){

      if (this.data.author == null) {
        this.data.author = "NON"
      }

      this.data.publish = this.data.publishBoolean ? "OUI PUBLIE" : "NON PUBLIE"
      this.data.aLaUne = this.data.aLaUneBoolean ? "OUI" : "NON"
      this.data.content = this.editorData

      this.form.append('title', this.data.title)
      this.form.append('subtitle', this.data.subtitle)
      this.form.append('content', this.data.content)
      this.form.append('category_id', this.data.category_id)
      this.form.append('publish', this.data.publish)
      this.form.append('aLaUne', this.data.aLaUne)
      this.form.append('author', this.data.author)

      for(let i = 0; i< this.attachement.length; i++){

        this.form.append('filesArticle[]', this.attachement[i])

      }
      const config = {headers: {'Content-Type' : 'multipart/form-data'}}
      this.loadingSave = true
      axios
        .post('/api/articles/store', this.form, config)
        .then(response => {
          console.log(response.data)
          if(response.status == 200){
            this.loadingSave = false
            if (response.data.success == false) {
              if (response.data.message == "Erreur de validation") {
                 this.errorcheck = true
                this.errorsAlert = "Erreur de validation. Veuillez verifiez vos champs que vous avez saisie"
              }else if(response.data.message == "Ooops Desolé. Vous ne pouvez pas mettre un article à la Une sans le publier"){
                this.errorcheck = true
                this.errorsAlert = response.data.message
              }
            }else{
              if (response.data.message == 'L\'article a été enregistré avec succès.' ) {
                this.$swal({
                  title: "Succès!",
                  text:  response.data.message,
                  icon: "success",
                  timer: 6000,
                  showConfirmButton: true
                });
                this.$router.push({name:"articles.all"})
              }
            }
          }
      });
    },

    publishH(){
      this.data.publishBoolean = 0
    },

    aLaUneH(){
      this.data.aLaUneBoolean = 0
    },
  },

  mounted(){
    this.getResults();
  }
}
</script>
