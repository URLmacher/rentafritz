<?php
$title_addition = ' | Reservierung';
$site_desc = 'Reservierung';
include('templates/header.php');
include('templates/nav-top.php');
include('products/products.php');
?>

<div class="rent-grid">
    <form class="rent__form" id="rent-form">
        <h1 class="rent__title">Reservieren</h1>
        <!-- Reservieren -->
        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Was?</h3>
                <select id="rent-select">
                    <option value="" disabled selected>Bitte auswählen</option>
                    <?php foreach ($products as $product) : ?>
                        <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="rent__errors" id="error-select"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Von wann:</h3>
                <input id="rent-date-start" type="text" class="datepicker" placeholder="VON:(Datum)">
                <div class="rent__errors" id="error-date-start"></div>
                <input id="rent-time-start" type="text" class="timepicker" placeholder="VON:(Uhrzeit)">
                <div class="rent__errors" id="error-time-start"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Bis wann:</h3>
                <input id="rent-date-end" type="text" class="datepicker" placeholder="BIS:(Datum)">
                <div class="rent__errors" id="error-date-end"></div>
                <input id="rent-time-end" type="text" class="timepicker" placeholder="BIS:(Uhrzeit)">
                <div class="rent__errors" id="error-time-end"></div>
            </div>
        </div>

        <div class="rent__seperator"></div>
        <!-- Kundendaten -->
        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Vorname</h3>
                <input class="rent__input" placeholder="Vorname" id="rent-first-name" type="text">
                <div class="rent__errors" id="error-first-name"></div>
            </div>
            <div class="rent__col">
                <h3 class="rent__body-title">Nachname</h3>
                <input class="rent__input" placeholder="Nachname" id="rent-last-name" type="text">
                <div class="rent__errors" id="error-last-name"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">E-Mail-Adresse</h3>
                <input class="rent__input" placeholder="E-Mail-Adresse" id="rent-email" type="text">
                <div class="rent__errors" id="error-email"></div>
            </div>
            <div class="rent__col">
                <h3 class="rent__body-title">Telefonnummer</h3>
                <input class="rent__input" placeholder="Telefonnummer" id="rent-phone" type="text">
                <div class="rent__errors" id="error-phone"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Straße</h3>
                <input class="rent__input" placeholder="Straße" id="rent-street" type="text">
                <div class="rent__errors" id="error-street"></div>
            </div>
            <div class="rent__col rent__col--small">
                <h3 class="rent__body-title">Hausnummer</h3>
                <input class="rent__input" placeholder="Hausnummer" id="rent-hnr" type="text">
                <div class="rent__errors" id="error-hnr"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col rent__col--small">
                <h3 class="rent__body-title">Postleitzahl</h3>
                <input class="rent__input" placeholder="Postleitzahl" id="rent-plz" type="text">
                <div class="rent__errors" id="error-plz"></div>
            </div>
            <div class="rent__col">
                <h3 class="rent__body-title">Wohnort</h3>
                <input class="rent__input" placeholder="Wohnort" id="rent-city" type="text">
                <div class="rent__errors" id="error-city"></div>
            </div>
        </div>

        <div class="file-field input-field rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Ausweiskopie</h3>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text" placeholder="Max 4 MB">
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
                    <span><a class="rent__link" href="/agb.php">AGB</a> gelesen und einverstanden</span>
                </label>
                <div class="rent__errors" id="error-agb"></div>
            </div>
            <div class="rent__col">
                <a class="rent__link rent__link--right" href="/datenschutz.php">Datenschutzerklärung</a>
            </div>
        </div>

        <button class="btn waves-effect waves-light waves-secondary btn__secondary rent__button" type="submit" name="action">Weiter</button>
    </form>
</div>


<script src="scripts/translation.js"></script>
<?php
include('templates/footer.php');
?>