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

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Was?</h3>
                <select>
                    <option value="" disabled selected>Bitte auswählen</option>
                    <?php foreach ($products as $product) : ?>
                        <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="rent__errors" id="error-product"></div>
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

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Name</h3>
                <input class="rent__input" placeholder="Name" id="rent-name" type="text" class="validate">
                <div class="rent__errors" id="error-name"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Straße</h3>
                <input class="rent__input" placeholder="Straße" id="rent-street" type="text" class="validate">
                <div class="rent__errors" id="error-street"></div>
            </div>
            <div class="rent__col rent__col--small">
                <h3 class="rent__body-title">Hausnummer</h3>
                <input class="rent__input" placeholder="Hausnummer" id="rent-hnr" type="text" class="validate">
                <div class="rent__errors" id="error-hnr"></div>
            </div>
        </div>

        <div class="rent__row">
            <div class="rent__col rent__col--small">
                <h3 class="rent__body-title">Postleitzahl</h3>
                <input class="rent__input" placeholder="Postleitzahl" id="rent-plz" type="number" class="validate">
                <div class="rent__errors" id="error-plz"></div>
            </div>
            <div class="rent__col">
                <h3 class="rent__body-title">Stadt</h3>
                <input class="rent__input" placeholder="Stadt" id="rent-city" type="text" class="validate">
                <div class="rent__errors" id="error-city"></div>
            </div>
        </div>

        <div class="file-field input-field rent__row">
            <div class="rent__col">
                <h3 class="rent__body-title">Ausweiskopie</h3>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Max 4 MB">
                </div>
                <div class="rent__errors" id="error-file"></div>
            </div>
            <div class="rent__col rent__col--small">
                <div class="btn btn__primary rent__body-button">
                    <span>Ausweiskopie</span>
                    <input id="rent-file" type="file">
                </div>
            </div>
        </div>

        <button class="btn waves-effect waves-light waves-secondary btn__secondary rent__button" type="submit" name="action">Weiter</button>
    </form>
</div>


<script src="scripts/translation.js"></script>
<script src="scripts/reservierung.js"></script>
<?php
include('templates/footer.php');
?>