<?php
$activePage = $_SERVER['REQUEST_URI'];
?>
<div class="navbar__spacer"></div>

<nav class="navbar">
  <div class="nav-wrapper rentafritz-container navbar__inner">
    <a href="/" class="brand-logo"><img class="navbar__brand-logo-img" src="../img/logo-nackt.svg" alt="rentafritz brand-logo"></a>
    <a href="#" data-target="mobile-demo" class="navbar__icon sidenav-trigger"><i class="material-icons">menu</i></a>

    <ul class="right hide-on-med-and-down">
      <li><a href="/" class="navbar__nav-link <?= strlen($activePage) === 1 ? 'navbar__nav-link--active' : ''; ?>">PRODUKTE</a></li>
      <li><a href="/umzug" class="navbar__nav-link <?= strpos($activePage, 'umzug') ? 'navbar__nav-link--active' : ''; ?>">ÜBERSIEDLUNG </a></li>
      <li><a href="/reservierung" class="navbar__nav-link <?= strpos($activePage, 'reservierung') ? 'navbar__nav-link--active' : ''; ?>">RESERVIEREN</a></li>
      <li><a href="/service" class="navbar__nav-link <?= strpos($activePage, 'service') ? 'navbar__nav-link--active' : ''; ?>">KONTAKT</a></li>
      <li><a href="/anfahrt" class="navbar__nav-link <?= strpos($activePage, 'anfahrt') ? 'navbar__nav-link--active' : ''; ?>">STANDORT</a></li>
    </ul>
  </div>
</nav>

<ul class="sidenav navbar__sidenav" id="mobile-demo">
  <div class="navbar__spacer"></div>
  <li><a href="/" class="navbar__nav-link <?= strlen($activePage) === 1 ? 'navbar__nav-link--active' : ''; ?>">PRODUKTE</a></li>
  <li><a href="/umzug" class="navbar__nav-link <?= strpos($activePage, 'umzug') ? 'navbar__nav-link--active' : ''; ?>">ÜBERSIEDLUNG </a></li>
  <li><a href="/reservierung" class="navbar__nav-link <?= strpos($activePage, 'reservierung') ? 'navbar__nav-link--active' : ''; ?>">RESERVIEREN</a></li>
  <li><a href="/service" class="navbar__nav-link <?= strpos($activePage, 'service') ? 'navbar__nav-link--active' : ''; ?>">KONTAKT</a></li>
  <li><a href="/anfahrt" class="navbar__nav-link <?= strpos($activePage, 'anfahrt') ? 'navbar__nav-link--active' : ''; ?>">STANDORT</a></li>
</ul>