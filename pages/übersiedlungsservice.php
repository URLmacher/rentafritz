<?php
$title_addition = ' | Siedlservice';
$site_desc = 'Umzug, Lagerung';
include('templates/header.php');
include('templates/nav-top.php');
?>

<main class="secondary-page rentafritz-container">
  <section class="siedl__section-two">
    <div class="siedl__text-wrapper">
      <h1 class="siedl__title">Übersiedlungsservice</h1>
      <p class="siedl__text">Unser Ziel ist es Sie mit einem stressfreien und kostengünstigen Umzugserlebnis zu versorgen.</p>
      <p class="siedl__text">Ob Sie privat oder als Unternehmen siedeln, unsere professionellen Mitarbeiter schaffen ihre Gegenstände sicher und effizient wohin Sie wollen, europaweit! </p>
      <p class="siedl__text">Wir bieten auch günstige Lagermöglichkeiten.</p>
      <h2 class="siedl__price">ab <span>€49,-</span> pro Stunde</h2>
      <a href="/reservierung/1" class="btn waves-effect waves-light waves-secondary btn__secondary siedl__button">Jetzt Reservieren</a>
    </div>
    <img class="siedl__img" src="img/siedlmobil.png">
  </section>

  <div class="siedl__line"></div>

  <section class="siedl__section-four">
    <div class="siedl__vignette">
    <i class="material-icons siedl__vignette-icon">security</i>
      <h3 class="siedl__title siedl__vignette-title">Sicherheit</h3>
      <p class="siedl__text siedl__vignette-text">Unsere Mitarbeiter behandeln Ihre Möbel und Güter mit größter Vorsicht. Beim Transport wird alles sorgfältig gepolstert und festgeschnallt.</p>
    </div>
    <div class="siedl__vignette">
    <i class="material-icons siedl__vignette-icon">local_shipping</i>
      <h3 class="siedl__title siedl__vignette-title">Zuverlässigkeit</h3>
      <p class="siedl__text siedl__vignette-text">Wir erscheinen pünktlich zum vereinbarten Termin und behandeln ihre Angelegenheiten mit höchster Diskretion.</p>
    </div>
    <div class="siedl__vignette">
    <i class="material-icons siedl__vignette-icon">build</i>
      <h3 class="siedl__title siedl__vignette-title">Möbel Ab- und Aufbau</h3>
      <p class="siedl__text siedl__vignette-text">Wir demontieren Ihre Möbel fachgerecht und bauen Sie am Zielort wieder auf. Das dafür benötigte Werkzeug bringen wir mit.</p>
    </div>
    <div class="siedl__vignette">
      <i class="material-icons siedl__vignette-icon">lock</i>
      <h3 class="siedl__title siedl__vignette-title">Lagerung</h3>
      <p class="siedl__text siedl__vignette-text">Möbel können bei uns kostengünstig ein- und zwischengelagert werden.</p>
    </div>

  </section>
</main>
<?php include('templates/footer.php') ?>