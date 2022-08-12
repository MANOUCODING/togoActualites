<template>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form">
          <h2 class="title">Page de connexion</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email ou Numero de telephone" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Mot de passe" />
          </div>
          <input type="submit" value="Se connecter" class="btn solid" />
          <p class="social-text">Voir nos pages sur les réseaux sociaux</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>TOGO ACTUALITES</h3>
          <p>
            Bienvenue dans notre espace administration sur notre plateforme de togo actualités 
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Visiter le site
          </button>
        </div>
        <img src="/assets/login/img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Qui sommes nous?</h3>
          <p>
            Bienvenue dans notre espace administration sur notre plateforme de togo actualités 
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="/assets/login/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

</template>

<script>
export default {
 
}
</script>