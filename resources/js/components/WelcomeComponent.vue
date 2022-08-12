<template>
    <headerbar> </headerbar>
       <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <div class="home__content grid">
                        <div class="home__social">
                            <a href="#"  target="_blank" class="home__social-icon">
                                <i class="uil uil-linkedin-alt"></i>
                            </a>

                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-facebook-f"></i>
                            </a>

                            <a href="#"  target="_blank" class="home__social-icon">
                                <i class="uil uil-youtube"></i>
                            </a>
                        </div>
                        <div class="home__img">
                            <svg class="home__blob" viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0" mask-type="alpha">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                    130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                    97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                    0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
                                    165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
                                    129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
                                    -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>

                                    <image class="home__blob-img"  href="assets/home/img/perfil.png"/>
                                </g>
                            </svg>
                        </div>

                        <div class="home__data">
                            <div>
                                <h1 class="home__title">Hi, Je suis Felix</h1>
                                <h3 class="home__subtitle">Informaticien Graphiste</h3>
                                <p class="home__description"> Lorem ipsum dolor sit, amet consectetur adipisicing elit adipisicing elit </p>
                                <a href="#contact" class="button button--flex">
                                   Contactez Moi <i class="uil uil-message button__icon"></i>
                                </a>
                            </div> <br>
                            <div class="home__scroll">
                                <a href="#about" class="home__scroll-button button--flex">
                                    <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                                    <span class="home__scroll-name">Défiler vers le bas</span>
                                    <i class="uil uil-arrow-down home__scroll-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <h2 class="section__title">A propos de moi</h2> <br> <br> <br>
                <div class="about__container container grid">
                    <img src="assets/home/img/about.jpg" alt="A propos de moi" class="about__img">
                    <div class="about__data">
                        <p class="about__description">Infographiste, avec des connaissances approfondies et des années d'expérience, travaillant dans les technologies de graphisme et la conception Ui / Ux, fournissant un travail de qualité.</p>
                        
                        <div class="about__info">
                            <div>
                                <span class="about__info-title">+08</span>
                                <span class="about__info-name">Ans <br> d'experience</span>
                            </div>

                            <div>
                                <span class="about__info-title">+20</span>
                                <span class="about__info-name">Projets <br> accomplis</span>
                            </div>

                            <div>
                                <span class="about__info-title">+05</span>
                                <span class="about__info-name">Entreprises <br> recrutées</span>
                            </div>
                        </div>
                        <div class="about__buttons">
                            <a download="" href="assets/home/pdf/Alexa-Cv.pdf" class="button button--flex">
                                Télechargez Mon CV<i class="uil uil-download-alt button__icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">
                <h2 class="section__title">Compétences</h2> <br><br><br>

                <div class="skills__container container grid">
                    <div>
                        <!--==================== SKILLS 1 ====================-->
                        <div class="skills__content skills__open">
                            <div class="skills__header">
                                <i class="uil uil-brackets-curly skills__icon"></i>
                                <div>
                                    <h1 class="skills__title">Frontend Developper</h1>
                                    <span class="skills_subtitle">More than 4 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">HTML</h3>
                                        <span class="skills__number">90%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__html"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">CSS</h3>
                                        <span class="skills__number">80%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__css"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">JAVASCRIPT</h3>
                                        <span class="skills__number">60%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__js"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">React</h3>
                                        <span class="skills__number">85%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__react"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!--==================== SKILLS 2 ====================-->
                         <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-server-network skills__icon" ></i>
                                <div>
                                    <h1 class="skills__title">Backend Developper</h1>
                                    <span class="skills_subtitle">More than 4 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">PHP</h3>
                                        <span class="skills__number">80%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__php"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Node Js</h3>
                                        <span class="skills__number">70%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__nodejs"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Firebase</h3>
                                        <span class="skills__number">50%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__firebase"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Python</h3>
                                        <span class="skills__number">55%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__python"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                             <!--==================== SKILLS 3 ====================-->
                         <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-swatchbook skills__icon"></i>
                                <div>
                                    <h1 class="skills__title">Designer</h1>
                                    <span class="skills_subtitle">More than 5 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Figma</h3>
                                        <span class="skills__number">90%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__figma"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Sketch</h3>
                                        <span class="skills__number">85%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__sketch"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Photoshop</h3>
                                        <span class="skills__number">65%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__photoshop"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== QUALIFICATION ====================-->
            <section class="qualification section">
                <h2 class="section__title">Parcours</h2> <br><br><br>

                <div class="qualification__container container">
                    <div class="qualification__tabs">
                        <div class="qualification__button button--flex qualification__active" data-target='#education'>
                            <i class="uil uil-graduation-cap qualification__icon"></i>
                            Scolaire
                        </div>

                        <div class="qualification__button button--flex" data-target="#work">
                            <i class="uil uil-briefcase-alt qualification__icon"></i>
                            Professionnel
                        </div>
                    </div>

                    <div class="qualification__sections">
                        <!--==================== QUALIFICATION CONTENT 1 ====================-->
                        <div class="qualification__content qualification__active" data-content id="education">
                             <!--==================== QUALIFICATION 1 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Computer Engineer</h3>
                                    <span class="qualification__subtitle">Peru - University</span>
                                    <div class="qualification__calender">
                                        <i class="uil uil-calendar-alt"></i>
                                        2009 - 2014
                                    </div>
                                </div>
                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                             <!--==================== QUALIFICATION 2 ====================-->
                            <div class="qualification__data">
                                 <div></div>

                                 <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                                <div>
                                    <h3 class="qualification__title">Web Design</h3>
                                    <span class="qualification__subtitle">Spain Institute</span>
                                    <div class="qualification__calender">
                                        <i class="uil uil-calendar-alt"></i>
                                        2014 - 2017
                                    </div>
                                </div>
                            </div>
                             
                            <!--==================== QUALIFICATION 3 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Web Development</h3>
                                    <span class="qualification__subtitle">Peru - Institute</span>
                                    <div class="qualification__calender">
                                        <i class="uil uil-calendar-alt"></i>
                                        2017 - 2019
                                    </div>
                                </div>
                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>
                                                        
                            <!--==================== QUALIFICATION 4 ====================-->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                   <span class="qualification__rounder"></span>
                                   <!-- <span class="qualification__line"></span> -->
                               </div>
                               <div>
                                   <h3 class="qualification__title">Master in Ux/Ui</h3>
                                   <span class="qualification__subtitle">Spain Institute</span>
                                   <div class="qualification__calender">
                                       <i class="uil uil-calendar-alt"></i>
                                       2019 - 2021
                                   </div>
                               </div>
                           </div>
                        </div>

                         <!--==================== QUALIFICATION CONTENT 2 ====================-->
                        <div class="qualification__content" data-content id="work">
                            <!--==================== QUALIFICATION 1 ====================-->
                           <div class="qualification__data">
                               <div>
                                   <h3 class="qualification__title">Software Engineer</h3>
                                   <span class="qualification__subtitle">Peru - Microsoft</span>
                                   <div class="qualification__calender">
                                       <i class="uil uil-calendar-alt"></i>
                                       2014 - 2016
                                   </div>
                               </div>
                               <div>
                                   <span class="qualification__rounder"></span>
                                   <span class="qualification__line"></span>
                               </div>
                           </div>

                            <!--==================== QUALIFICATION 2 ====================-->
                           <div class="qualification__data">
                                <div></div>

                                <div>
                                   <span class="qualification__rounder"></span>
                                   <span class="qualification__line"></span>
                               </div>
                               <div>
                                   <h3 class="qualification__title">Frontend Developper</h3>
                                   <span class="qualification__subtitle">Apple Inc-Institute</span>
                                   <div class="qualification__calender">
                                       <i class="uil uil-calendar-alt"></i>
                                       2016 - 2018
                                   </div>
                               </div>
                           </div>
                            
                           <!--==================== QUALIFICATION 3 ====================-->
                           <div class="qualification__data">
                               <div>
                                   <h3 class="qualification__title">Ui Designer</h3>
                                   <span class="qualification__subtitle">Figma - Spain</span>
                                   <div class="qualification__calender">
                                       <i class="uil uil-calendar-alt"></i>
                                       2019 - 2021
                                   </div>
                               </div>
                               <div>
                                   <span class="qualification__rounder"></span>
                                   <!-- <span class="qualification__line"></span> -->
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </section>

            <!--==================== SERVICES ====================-->
            <section class="services section" id="services">
                <h2 class="section__title">Services</h2> <br><br><br>
                <div class="services__container container grid">
                    <!--==================== SERVICE 1 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-web-grid services__icon"></i>
                            <h3 class="services__title">Ui/Ux <br>Designer</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            Voir plus
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Ui/Ux Designer</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-services grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I develop User Interface.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>Web page development.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I create ux element interactions.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I position your company brand.</p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                     <!--==================== SERVICE 2 ====================-->
                     <div class="services__content">
                        <div>
                            <i class="uil uil-arrow services__icon"></i>
                            <h3 class="services__title">Frontend <br> Developper</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            Voir plus
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Frontend <br> Developper</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-services grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I develop User Interface.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>Web page development.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I create ux element interactions.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I position your company brand.</p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!--==================== SERVICE 3 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-pen services__icon"></i>
                            <h3 class="services__title">Branding <br> Designer</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            Voi plus
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Branding <br> Designer</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-services grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I develop User Interface.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>Web page development.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I create ux element interactions.</p>
                                    </li>

                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal_icon"></i>
                                        <p>I position your company brand.</p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio">
                <h2 class="section__title">Réalisations</h2> <br><br><br>
                <div class="portfolio__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== PORTFOLIO 1 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/home/img/portfolio1.jpg" class="portfolio__img" alt="Portfolio Image">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">
                                    Site Web moderne</h3>
                                <p class="portfolio__description">  Site Web adaptable à tous les appareils, avec des composants d'interface utilisateur et des interactions animées.</p>

                                <a href="#" class="button button--flex button--small portfolio__button">
                                    Demo 
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!--==================== PORTFOLIO 2 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/home/img/portfolio2.jpg" class="portfolio__img" alt="Portfolio Image">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Concepteur de marque</h3>
                                <p class="portfolio__description">
                                    Site Web adaptable à tous les appareils, avec des composants d'interface utilisateur et des interactions animées.</p>

                                <a href="#" class="button button--flex button--small portfolio__button">
                                    Demo 
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!--==================== PORTFOLIO 3 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/home/img/portfolio3.jpg" class="portfolio__img" alt="Portfolio Image">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Boutique en ligne</h3>
                                <p class="portfolio__description">Site Web adaptable à tous les appareils, avec des composants d'interface utilisateur et des interactions animées..</p>

                                <a href="#" class="button button--flex button--small portfolio__button">
                                    Voir
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Add Arrows -->
                    <div class="swiper-button-next">
                        <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!--==================== PROJECT IN MIND ====================-->
            <section class="project section">
                <div class="project__bg">
                    <div class="project__container container grid">
                        <div class="project__data">
                            <h2 class="project__title">  Avez vous un nouveau projet ?</h2>
                            <p class="project__description">Contactez-moi maintenant et obtenez un rabais de 30% sur votre nouveau projet.</p>
                            <a href="#contact" class="button button--flex button--white">
                                Contactez Moi
                                <i class="uil uil-angle-left-b project__icon button__icon"></i>
                            </a>
                        </div>

                        <img src="assets/home/img/project.png" alt="Projet" class="project__img">
                    </div>
                </div>
            </section>

            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section">
                <h2 class="section__title">Témoignages</h2> <br> <br> <br>

                <div class="testimonial__container container swiper-container">

                    <div class="swiper-wrapper">

                        <!--==================== TESTIMONIAL 1 ====================-->
                        <div class="testimonial__content swiper-slide">
                            <div class="testimonial__data">
                                <div class="testimonial__header">
                                    <img src="assets/home/img/testimonial1.jpg" alt="Temoignage" class="testimonial__img">

                                    <div>
                                        <h3 class="testimonial__name">Sara Smith</h3>
                                        <span class="testimonial__client">Client</span>
                                    </div>
                                </div>
                                &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;
                                <!-- <div>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                </div> -->
                            </div>
                            <p class="description__testimonial">
                                J'ai une bonne impression, je réalise mon projet avec tous les moyens possibles
                                qualité et attention et support 24 heures sur 24.
                            </p>
                        </div>

                         <!--==================== TESTIMONIAL 2 ====================-->
                        <div class="testimonial__content swiper-slide">
                            <div class="testimonial__data">
                                <div class="testimonial__header">
                                    <img src="assets/home/img/testimonial2.jpg" alt="Temoignage" class="testimonial__img">

                                    <div>
                                        <h3 class="testimonial__name">Matt Robinson</h3>
                                        <span class="testimonial__client">Client</span>
                                    </div>
                                </div>
                                &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;
                                <!-- <div>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                </div> -->
                            </div>
                            <p class="description__testimonial">
                                J'ai une bonne impression, je réalise mon projet avec tous les moyens possibles
                                qualité et attention et support 24 heures sur 24.
                            </p>
                        </div>

                         <!--==================== TESTIMONIAL 3 ====================-->
                         <div class="testimonial__content swiper-slide">
                            <div class="testimonial__data">
                                <div class="testimonial__header">
                                    <img src="assets/home/img/testimonial3.jpg" alt="Temoignage" class="testimonial__img">

                                    <div>
                                        <h3 class="testimonial__name">Raoul Harris</h3>
                                        <span class="testimonial__client">Client</span>
                                    </div>
                                </div>
                                &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;
                                <!-- <div>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                    <i class="uil uil-star testimonial__icon-star"></i>
                                </div> -->
                            </div>
                            <p class="description__testimonial">
                                J'ai une bonne impression, je réalise mon projet avec tous les moyens possibles
                                qualité et attention et support 24 heures sur 24.
                            </p>
                        </div>
                    </div>
                    <br> <br>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-testimonial"></div>
                </div>
            </section>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <h2 class="section__title">Contactez Moi</h2> <br><br><br>
               

                <div class="contact__container container grid">
                    <div>
                        <div class="contact__information">
                            <i class="uil uil-phone contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Télephone</h3>
                                <span class="contact__subtitle">999-777-666</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-envelope-alt  contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Email</h3>
                                <span class="contact__subtitle">alexa@gmail.com</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-map-marker contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Adresse</h3>
                                <span class="contact__subtitle">Peru - Lima Av. Bolivar #123</span>
                            </div>
                        </div>
                    </div>

                    <form action="" class="contact__form grid">
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__name">Nom</label>
                                <input type="text" name="name" class="contact__input">
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__name">Email</label>
                                <input type="email" name="email" class="contact__input">
                            </div>
                        </div>

                        <div class="contact__content">
                            <label for="" class="contact__name">Projet</label>
                            <input type="text" name="project__name" class="contact__input">
                        </div>

                        <div class="contact__content">
                            <label for="" class="contact__name">Message</label>
                            <textarea name="message" id="" cols="0" rows="7" class="contact__input"></textarea>
                        </div>

                        <div>
                            <a href="#" class="button button--flex">
                                Envoyer
                                <i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    <footerbar> </footerbar>
</template>

<script>
export default {
 
}
</script>