<? include('products/products.php'); ?>
<h1 class="new-product__page-title rentafritz-container">Umzugservice</h1>
<section class="new-product__grid rentafritz-container">
  <?php
  include('products/products.php');
  foreach ($products as $product) : ?>
    <?php if ($product['cat'] === 'S') : ?>
      <?php $rate = ($product['rate'] == 'd') ? 'pro Tag' : 'pro Stunde' ?>
      <a href="product/<?php echo $product['id']; ?>" class="new-product new-product--full">
        <div class="new-product__header">
          <h3 class="new-product__title"><?= $product['name'] ?></h3>
          <img class="new-product__img new-product__img--full" src="<?= $product['img_main'] ?>" />
        </div>
        <h4 class="new-product__price">ab € <?= $product['price'] . ',- ' ?></h4>
      </a>
    <?php endif; ?>
  <?php endforeach; ?>
</section>
<h1 class="new-product__page-title rentafritz-container">Zu vermieten</h1>
<section class="new-product__grid rentafritz-container">
  <?php foreach ($products as $product) : ?>
    <?php if ($product['cat'] === 'M') : ?>
      <?php $rate = ($product['rate'] == 'd') ? 'pro Tag' : 'pro Stunde' ?>
      <a href="product/<?php echo $product['id']; ?>" class="new-product">
        <div class="new-product__header">
          <h3 class="new-product__title"><?= $product['name'] ?></h3>
          <img class="new-product__img" src="<?= $product['img_main'] ?>" />
        </div>
        <h4 class="new-product__price">ab € <?= $product['price'] . ',- ' ?></h4>
      </a>
    <?php endif; ?>
  <?php endforeach; ?>
</section>