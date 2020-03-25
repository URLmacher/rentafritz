<?php
$title_addition = ' | Produkt';
$site_desc = 'Produktseite';
include('templates/header.php');
include('templates/nav-top.php');
include('products/products.php');

//get product from url
$product = null;
preg_match('/\/product\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches);
if (!empty($matches[1]) && is_numeric($matches[1])) {
  $product_id = $matches[1];

  foreach ($products as $prod) {
    if ($prod['id'] == $product_id) {
      $product = $prod;
    }
  }

  $rate = ($product['rate'] == 'd') ? 'pro Tag' : 'pro Stunde';
}
?>

<?php if ($product) : ?>
  <div class="rent-grid rentafritz-container">
    <h1 class="product-detail__title"><?= $product['name'] ?></h1>
    <h5 class="product-detail__description"><?= $product['description'] ?></h5>
    <img class="product-detail__img" src="../<?= ($product['img_sub']) ? $product['img_sub'] : $product['img_main'] ?>" />

    <?php if ($product["info"]) : ?>
      <?php foreach ($product["info"] as $info) : ?>
        <p class="product-detail__info"><?= $info ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($product["info_list"]) : ?>
      <ul class="product-detail__info-ul">
        <?php foreach ($product["info_list"] as $list_info) : ?>
          <li class="product-detail__info-li"><?= $list_info ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <h3 class="product-detail__price">€ <?= $product['price'] . ',- ' . $rate ?></h3>
    <p class="product-detail-tax__tax">inkl. 20% Mehrwertsteuer</p>

    <?php if ($product['info_secondary']) : ?>
      <?php foreach ($product["info_secondary"] as $info_secondary) : ?>
        <p class="product-detail__info-secondary"><?= $info_secondary ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

    <a href="/reservierung/<?php echo $product['id']; ?>"><button class="btn waves-effect waves-light waves-secondary btn__secondary product-detail__button">Reservieren</button></a>
    <a href="/"><button class="btn waves-effect waves-light waves-secondary btn__secondary product-detail__button">Zurück zur Startseite</button></a>
  </div>

<?php endif; ?>


<?php
include('templates/footer.php');
?>