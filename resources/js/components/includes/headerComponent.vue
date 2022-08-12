<template>
  <header class="header" id="header">
      <nav class="nav container">
          <a href="#" class="nav__logo">FELIXTHEMAN</a>
          <div class="nav__menu" id="nav-menu">
              <ul class="nav__list grid">
                  <li class="nav__item">
                      <a href="#home" class="nav__link active-link">
                          <i class="uil uil-home nav__icon"></i>Acceuil
                      </a>
                  </li>
                  <li class="nav__item">
                      <a href="#about" class="nav__link">
                          <i class="uil uil-user nav__icon"></i>A propos
                      </a>
                  </li>
                  <li class="nav__item">
                      <a href="#skills" class="nav__link">
                          <i class="uil uil-file-alt nav__icon"></i>Compétences
                      </a>
                  </li>
                  <li class="nav__item">
                      <a href="#services" class="nav__link">
                          <i class="uil uil-briefcase-alt nav__icon"></i> Services
                      </a>
                  </li>
                  <li class="nav__item">
                      <a href="#portfolio" class="nav__link">
                          <i class="uil uil-scenery nav__icon"></i> Realisations
                      </a>
                  </li>
                  <li class="nav__item">
                      <a href="#contact" class="nav__link">
                          <i class="uil uil-message nav__icon"></i> Contactez Moi
                      </a>
                  </li>
              </ul>
              <i class="uil uil-times nav__close" id="nav-close"></i>
          </div>
          <div class="nav__btns">

              <!-- Theme change button -->

              <i class="uil uil-moon change-theme" id="theme-button"></i>

              <div class="nav__toggle" id="nav-toggle">
                  <i class="uil uil-apps"></i>
              </div>
          </div>
      </nav>
  </header>
</template>
<script>
export default {
  
}
</script>