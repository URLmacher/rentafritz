<?php
$title_addition = '';
$site_desc = 'Verleih für Fahrzeuge und Geräte';
include('templates/header.php');
include('templates/nav-top.php');
?>

<div class="products-grid">
  <?php
  include('products/products.php');

  foreach ($products as $product) : ?>
    <?php $rate = ($product['rate'] == 'd') ? 'pro Tag' : 'pro Stunde' ?>
    <div class="product">
      <div class="product__title">
        <h1><?= $product['name'] ?></h1>
      </div>
      <img class="product__img" src="<?= $product['img_main'] ?>" />
      <div class="product__details">
        <h3 class="product__description"><?= $product['description'] ?></h3>

        <?php if ($product['img_sub']) : ?>
          <img class="object-img" id="masse" src="<?= $product['img_sub'] ?>">
        <?php endif; ?>

        <?php if ($product['info']) : ?>
          <div class="product__info">
            <?php foreach ($product["info"] as $info) : ?>
              <p><?= $info ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <ul class="product__info-ul">
          <?php foreach ($product["info_list"] as $list_info) : ?>
            <li><?= $list_info ?></li>
          <?php endforeach; ?>
        </ul>


        <h3 class="product__price">€ <?= $product['price'] . ',- ' . $rate ?></h3>
        <p class="product__tax">inkl. 20% Mehrwertsteuer</p>
        <?php if ($product['info_secondary']) : ?>
          <div class="product__info-box">
            <div class="info-icon"></div>
            <?php foreach ($product["info_secondary"] as $info_secondary) : ?>
              <p><?= $info_secondary ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="product__button">
        <h3 class="product__button-text">mehr Info</h3>
      </div>
    </div><?php endforeach;
        @include('products\sortimentwachsi.php');
          ?>
</div>

<?php
include('templates/zitate.php');
include('templates/footer.php');
?>