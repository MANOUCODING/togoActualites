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
                <div class="mb-3">
                  <input required id="con-name" name="name" type="text" class="form-control" placeholder="Noms & Prenom(s)*">
                </div>
              </div>
              <div class="col-md-6">
                <!-- email -->
                <div class="mb-3">
                  <input required id="con-email" name="telephone" type="number" class="form-control" placeholder="Téléphone">
                </div>
              </div>
              <div class="col-md-12">
                <!-- email -->
                <div class="mb-3">
                  <input required id="con-email" name="email" type="email" class="form-control" placeholder="E-mail*">
                </div>
              </div>
               <div class="col-md-12">
                <!-- Subject -->
                <div class="mb-3">
                  <input required id="con-subject" name="subject" type="text" class="form-control" placeholder="Site Web">
                </div>
              </div>
              <div class="col-md-12">
                <!-- Subject -->
                <div class="mb-3">
                  <input required id="con-subject" name="subject" type="text" class="form-control" placeholder="Sujet*">
                </div>
              </div>
              <div class="col-md-12">
                <!-- Message -->
                <div class="mb-3">
                  <textarea required id="con-message" name="message" cols="40" rows="6" class="form-control" placeholder="Votre Message...*"></textarea>
                </div>
              </div>
              <!-- submit button -->
              <div class="col-md-12 text-start"><button class="btn btn-primary w-100" type="submit">Envoyez le message</button></div>
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
export default {
  setup() {
    
  },
}
</script>