<section class="products-grid">
  <?php
  include('products/products.php');
  require 'vendor/autoload.php';
  $router = new AltoRouter();

  foreach ($products as $product) : ?>
    <?php $rate = ($product['rate'] == 'd') ? 'pro Tag' : 'pro Stunde' ?>
    <div class="product">
      <div class="product__title">
        <h1><?= $product['name'] ?></h1>
      </div>
      <img class="product__img" src="<?= $product['img_main'] ?>" />

      <div class="product__details product__hidden">
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

        <a href="reservierung/<?php echo $product['id']; ?>"><button class="btn waves-effect waves-light waves-secondary btn__secondary product__button">Reservieren</button></a>
      </div>

      <button class="btn waves-effect waves-light waves-secondary btn__secondary product__button">mehr Info</button>
    </div>
  <?php endforeach;
  @include('products\sortimentwachsi.php');
  ?>
</section>