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

  /**
   * get the text that belongs to a rate-type
   *
   * @param string $rateType
   * @return string
   */
  function getRateText($rateType)
  {
    $rateText = '';
    switch ($rateType) {
      case 'd':
        $rateText = 'pro Tag';
        break;
      case '12':
        $rateText = 'für 12 Stunden';
        break;
      case 'h':
        $rateText = 'pro Stunde';
        break;
    }
    return $rateText;
  }
}
?>

<?php if ($product) : ?>
  <div class="product-detail rentafritz-container">
    <section class="product-detail__optics">
      <img class="product-detail__img" src="../<?= ($product['img_sub']) ? $product['img_sub'] : $product['img_main'] ?>" />
    </section>

    <section class="product-detail__content">
      <h1 class="product-detail__title"><?= $product['name'] ?></h1>
      <h5 class="product-detail__description"><?= $product['description'] ?></h5>


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

      <h3 class="product-detail__price"><span>€ <?= $product['price'] . ',- </span>' . getRateText($product['rate']) ?></h3>


      <div class="product-detail__btn-box">
        <a href="/reservierung/<?php echo $product['id']; ?>" class="btn waves-effect waves-light waves-secondary btn__secondary product-detail__button">Reservieren</a>
        <a href="/" class="btn-flat product-detail__button">Zurück</a>
      </div>

      <div class="product-detail__info-box">
        <p class="product-detail__info-secondary">Preis inkl. 20% Mehrwertsteuer</p>
        <?php if ($product['rate'] !== 'h') : ?>
          <p class="product-detail__info-secondary">Mindestmietzeitraum 24 Stunden</p>
        <?php endif; ?>
        <?php if ($product['info_secondary']) : ?>
          <?php foreach ($product["info_secondary"] as $info_secondary) : ?>
            <p class="product-detail__info-secondary"><?= $info_secondary ?></p>
          <?php endforeach; ?>
        <?php endif; ?>
        <i class="material-icons product-detail__info-box-icon">info_outline</i>
      </div>
    </section>
  </div>

<?php endif; ?>


<?php
include('templates/footer.php');
?>