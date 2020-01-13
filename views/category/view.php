<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>

<section id="promo">
    <div class="container">
		<?php echo Html::img('@web/images/shop/1.jpg', ['alt' => 'Promo']); ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="category-products" id="js-catalog">
						<?php echo \app\components\MenuWidget::widget(); ?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">
                                        <span class="pull-right">(50)</span>
                                        Acne</a></li>
                                <li><a href="#">
                                        <span class="pull-right">(56)</span>
                                        Grüne Erde</a></li>
                                <li><a href="#">
                                        <span class="pull-right">(27)</span>
                                        Albiro</a></li>
                                <li><a href="#">
                                        <span class="pull-right">(32)</span>
                                        Ronhill</a></li>
                                <li><a href="#">
                                        <span class="pull-right">(5)</span>
                                        Oddmolly</a></li>
                                <li><a href="#">
                                        <span class="pull-right">(9)</span>
                                        Boudestijn</a></li>
                                <li><a href="#">
                                        <span class="pull-right">(4)</span>
                                        Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?php echo $category->name; ?></h2>
					<?php if (!empty($products)): ?>
						<?php $i = 1;
						foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
											<?php if ($product['img']): ?>
												<?php echo Html::img('@web/images/products/' . $product['img'], ['alt' => $product['name']]); ?>
											<?php else: ?>
												<?php echo Html::img('@web/images/products/no-image.png', ['alt' => $product['name']]); ?>
											<?php endif; ?>
                                            <h2>$<?php echo $product['price']; ?></h2>
                                            <p class="product-name"><?php echo $product['name']; ?></p>
                                            <a href="#" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart</a>
                                        </div>

										<?php if ($product['sale']): ?>
											<?php echo Html::img('@web/images/home/sale.png', ['class' => 'new', 'alt' => 'Распродажа']); ?>
										<?php else: ?>
											<?php echo Html::img('@web/images/home/new.png', ['class' => 'new', 'alt' => 'Новинки']); ?>
										<?php endif; ?>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="">
                                                    <i class="fa fa-plus-square"></i>
                                                    Add to wishlist</a></li>
                                            <li><a href="">
                                                    <i class="fa fa-plus-square"></i>
                                                    Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
							<?php if ($i % 3 === 0): ?>
                                <div class="clearfix"></div>
							<?php endif; ?>

							<?php $i++; endforeach; ?>
                        <div class="clearfix"></div>
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
					<?php else: ?>
                        <h2>Здесь продуктов пока нету...</h2>
					<?php endif; ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

