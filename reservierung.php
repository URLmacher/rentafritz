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

        <h3 class="rent__body-title">Was?</h3>
        <div class="rent__row">
            <select>
                <option value="" disabled selected>Bitte auswählen</option>
                <?php foreach ($products as $product) : ?>
                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="rent__errors" id="error-product"></div>
        </div>

        <h3 class="rent__body-title">Von wann:</h3>
        <div class="rent__row">
            <input id="rent-date-start" type="text" class="datepicker" placeholder="VON:(Datum)">
            <div class="rent__errors" id="error-product"></div>
            <input id="rent-time-start" type="text" class="timepicker" placeholder="VON:(Uhrzeit)">
            <div class="rent__errors" id="error-product"></div>
        </div>

        <h3 class="rent__body-title">Bis wann:</h3>
        <div class="rent__row">
            <input id="rent-date-end" type="text" class="datepicker" placeholder="BIS:(Datum)">
            <div class="rent__errors" id="error-product"></div>
            <input id="rent-time-end" type="text" class="timepicker" placeholder="BIS:(Uhrzeit)">
            <div class="rent__errors" id="error-product"></div>
        </div>

        <button class="btn waves-effect waves-light waves-secondary rent__button" type="submit" name="action">Weiter</button>
    </form>
</div>
<script src="scripts/translation.js"></script>
<script src="scripts/reservierung.js"></script>
<?php
include('templates/footer.php');
?>