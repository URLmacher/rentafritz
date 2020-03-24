<section class="products-grid rentafritz-container">
  <?php
  include('products/products.php');
  foreach ($products as $product) : ?>

    <?php $rate = ($product['rate'] == 'd') ? 'pro Tag' : 'pro Stunde' ?>
    <div class="new-product">
      <div class="new-product__header">
        <h3 class="new-product__title"><?= $product['name'] ?></h3>
        <img class="new-product__img" src="<?= $product['img_main'] ?>" />
      </div>
      <h4 class="new-product__price">ab € <?= $product['price'] . ',- ' ?></h4>
    </div>
  <?php endforeach; ?>
</section>