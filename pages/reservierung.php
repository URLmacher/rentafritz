<?php
$title_addition = ' | Reservierung';
$site_desc = 'Reservierung';
include('templates/header.php');
include('templates/nav-top.php');
include('products/products.php');
include('products/options.php');

//get product ID from url
$product_id = null;
$product_rate = null;
$rent_times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'];
$rent_time_start = null;
$rent_time_end = null;
preg_match('/\/reservierung\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches);
if (!empty($matches[1]) && is_numeric($matches[1])) {
  $product_id = $matches[1];
}
?>
<div class="rent-grid rentafritz-container">

  <header class="rent__header">
    <h1 class="rent__title">Reservieren</h1>
    <p class="rent__pagination">Seite <span id="rent-pagination-page">1</span> / 2</p>
    <div id="rent-info" class="rent__info rent__hidden">
      <div id="rent-info-loading" class="progress rent__loading">
        <div class="indeterminate"></div>
      </div>
      <p class="rent__info-text">Ausgewählt: <span id="rent-info-selected-product" class="rent__info-text-selection">-</span></p>
      <p class="rent__info-text">Leihdauer: <span id="rent-info-time" class="rent__info-text-selection">-</span></p>
      <p class="rent__info-text">Zusatzoption: <span id="rent-info-option" class="rent__info-text-selection">-</span></p>
      <p class="rent__info-text">Vorraussichtliche Kosten: <span id="rent-info-price" class="rent__info-text-selection">-</span></p>
      <p class="rent__info-text">Zahlbar in bar vor Ort</p>
      <p class="rent__info-text">Alle Preise inkl. 20% Mehrwertsteuer</p>
      <i class="material-icons rent__info-icon">info_outline</i>
    </div>
  </header>

  <form class="rent__form" id="rent-form-1">
    <!-- Mindest Mietzeit-->
    <?php foreach ($products as $product) : ?>
      <input type="hidden" id="rent-min-time-<?= $product['id'] ?>" value="<?= $product['rate'] ?>">
    <?php endforeach; ?>

    <!-- Produktauswahl -->
    <div class="rent__row">
      <div class="rent__col">
        <label for="rent-select" class="rent__body-title">Was?</label>
        <select id="rent-select">
          <option value="" disabled selected>Bitte auswählen</option>
          <?php foreach ($products as $product) : ?>
            <option value="<?= $product['id'] ?>" <?= ($product['id'] == $product_id) ? 'selected' : '' ?>><?= $product['name'] ?></option>
          <?php endforeach; ?>
        </select>
        <div class="rent__errors" id="error-select"></div>
      </div>
    </div>

    <!-- Produktoptionen -->
    <?php foreach ($products as $product) : ?>
      <?php if ($product['id'] == $product_id && $product['options']) : ?>
        <?php foreach ($options as $option) : ?>
        <div class="rent__row">
          <div class="rent__col">
            <label for="rent-option-<?= $option['id'] ?>" class="rent__body-title">
              <input type="checkbox" id="rent-option-<?= $option['id'] ?>" />
              <span><?= $option['description'] ?></span>
            </label>
          </div>
        </div>
        <?php endforeach; ?>
      <?php endif; ?>
    <?php endforeach; ?>

    <!-- Startzeit -->
    <div class="rent__row">
      <div class="rent__col">
        <label for="rent-date-start" class="rent__body-title">Von wann:</label>
        <input autocomplete="off" id="rent-date-start" type="text" class="datepicker" placeholder="VON:(Datum)">
        <div class="rent__errors" id="error-date-start"></div>
        <select id="rent-select-time-start">
          <option value="" disabled selected>VON:(Uhrzeit)</option>
          <?php foreach ($rent_times as $rent_time) : ?>
            <option value="<?= $rent_time ?>" <?= ($rent_time == $rent_time_start) ? 'selected' : '' ?>><?= $rent_time ?></option>
          <?php endforeach; ?>
        </select>
        <div class="rent__errors" id="error-select-time-start"></div>
      </div>
    </div>

    <!-- Endzeit -->
    <div class="rent__row">
      <div class="rent__col">
        <label for="rent-date-end" class="rent__body-title">Bis wann:</label>
        <input autocomplete="off" id="rent-date-end" type="text" class="datepicker" placeholder="BIS:(Datum)">
        <div class="rent__errors" id="error-date-end"></div>
        <select id="rent-select-time-end">
          <option value="" disabled selected>VON:(Uhrzeit)</option>
          <?php foreach ($rent_times as $rent_time) : ?>
            <option value="<?= $rent_time ?>" <?= ($rent_time == $rent_time_end) ? 'selected' : '' ?>><?= $rent_time ?></option>
          <?php endforeach; ?>
        </select>
        <div class="rent__errors" id="error-select-time-end"></div>
      </div>
    </div>

    <button class="btn waves-effect waves-light waves-secondary btn__secondary rent__button" id="rent-page-one-submit-button" type="submit" name="action">Weiter</button>
  </form>

  <form class="rent__form rent__hidden" id="rent-form-2">
    <!-- Kundendaten -->
    <div class="rent__row">
      <div class="rent__col">
        <label for="rent-first-name" class="rent__body-title">Vorname</label>
        <input class="rent__input" placeholder="Vorname" id="rent-first-name" type="text">
        <div class="rent__errors" id="error-first-name"></div>
      </div>
      <div class="rent__col">
        <label for="rent-last-name" class="rent__body-title">Nachname</label>
        <input class="rent__input" placeholder="Nachname" id="rent-last-name" type="text">
        <div class="rent__errors" id="error-last-name"></div>
      </div>
    </div>

    <div class="rent__row">
      <div class="rent__col">
        <label for="rent-email" class="rent__body-title">E-Mail-Adresse</label>
        <input class="rent__input" placeholder="E-Mail-Adresse" id="rent-email" type="text">
        <div class="rent__errors" id="error-email"></div>
      </div>
      <div class="rent__col">
        <label for="rent-phone" class="rent__body-title">Telefonnummer</label>
        <input class="rent__input" placeholder="Telefonnummer" id="rent-phone" type="text">
        <div class="rent__errors" id="error-phone"></div>
      </div>
    </div>

    <div class="rent__row">
      <div class="rent__col">
        <label for="rent-street" class="rent__body-title">Straße</label>
        <input class="rent__input" placeholder="Straße" id="rent-street" type="text">
        <div class="rent__errors" id="error-street"></div>
      </div>
      <div class="rent__col rent__col--small">
        <label for="rent-hnr" class="rent__body-title">Hausnummer</label>
        <input class="rent__input" placeholder="Hausnummer" id="rent-hnr" type="text">
        <div class="rent__errors" id="error-hnr"></div>
      </div>
    </div>

    <div class="rent__row">
      <div class="rent__col rent__col--small">
        <label for="rent-plz" class="rent__body-title">Postleitzahl</label>
        <input class="rent__input" placeholder="Postleitzahl" id="rent-plz" type="text">
        <div class="rent__errors" id="error-plz"></div>
      </div>
      <div class="rent__col">
        <label for="rent-city" class="rent__body-title">Wohnort</label>
        <input class="rent__input" placeholder="Wohnort" id="rent-city" type="text">
        <div class="rent__errors" id="error-city"></div>
      </div>
    </div>

    <div class="file-field input-field rent__row">
      <div class="rent__col">
        <label for="rent-file" class="rent__body-title">Ausweiskopie</label>
        <div class="file-path-wrapper">
          <input autocomplete="off" class="file-path" type="text" placeholder="Max 4 MB">
        </div>
        <div class="rent__errors" id="error-file"></div>
      </div>
      <div class="rent__col rent__col--small">
        <div class="btn btn__primary rent__body-button">
          <span>Ausweiskopie</span>
          <input id="rent-file" type="file" accept=".jpg, .jpeg, .png, .pdf">
        </div>
      </div>
    </div>

    <div class="file-field input-field rent__row">
      <div class="rent__col">
        <label for="rent-agb" class="rent__body-title">
          <input type="checkbox" id="rent-agb" />
          <span><a class="rent__link" id="rent-agb-link" href="/agb">AGB</a> gelesen und einverstanden</span>
        </label>
        <div class="rent__errors" id="error-agb"></div>
      </div>
      <div class="rent__col rent__col--small">
        <a class="rent__link rent__link--right" href="/datenschutz">Datenschutzerklärung</a>
      </div>
    </div>
    <div class="rent__btn-box">
      <button class="btn waves-effect waves-light waves-secondary btn__secondary rent__button" id="rent-page-two-submit-button" type="submit" name="action">Absenden</button>
      <button class="btn-flat rent__button rent__button--back" id="rent-back-button">Zurück</button>
    </div>
  </form>

  <!-- Success Overlay -->
  <div id="rent-succes" class="rent__success rent__hidden">
    <h5 class="rent__success-title">Reservierung erfolgreich <span><i class="material-icons rent__success-icon">done</i></span></h5>
    <p class="rent__success-text">Sie erhalten Ihre persönliche Bestätigung in Kürze</p>
    <button id="rent-back-home-btn" class="btn waves-effect waves-light waves-secondary btn__secondary rent__button">Zurück zur Startseite</button>
  </div>
  <!-- Error Overlay -->
  <div id="rent-general-error" class="rent__general-error rent__loading-overlay rent__hidden">
    <h5 class="rent__success-title"><span><i class="material-icons rent__success-icon">sentiment_dissatisfied</i></span>Es tut uns Leid...</h5>
    <p class="rent__success-text">Bei der Bearbeitung Ihrer Anfrage ist ein Fehler aufgetreten</p>
    <button id="rent-reload-page-btn" class="btn waves-effect waves-light waves-secondary btn__secondary rent__button">Nochmal versuchen</button>
  </div>
</div>



<div id="rent-full-loading" class="rent__loading-overlay rent__hidden">
  <div class="lds-roller">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>

<?php
include('templates/footer.php');
?>