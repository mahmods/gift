<?php $category = \App\Category::where('id', $bloc_meta)->first(); ?>
<!-- Flowers Products -->
<div class="section-head green">
    <h2><?=$category->name?></h2>
    <a href="products/<?=$category->path?>" class="more-btn"><?=translate("Shop now")?></a>
</div>
<?php
$products = \App\Product::where('category', $category->id)->get();
?>
<div class="carousel-slider row green">
    <?php foreach($products as $product) : ?>
    <!-- Product Block -->
    <div class="product-block col-s-12 col-m-6 col-l-4">
        <div class="content-box">
            <a href="product/<?=path($product->translate('en')->title,$product->id)?>" class="image" data-src="<?=url('/assets/products/'.image_order($product->images))?>"></a>
            <span class="discount-badge">خصم 25%</span>
            <div class="hvr">
                <a href="#" class="btn primary add-cart-fast" data-id="<?=$product->id?>" data-modal="item-added">اضافه الى السله</a>
                <a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
            </div>
            <a href="product/<?=path($product->translate('en')->title,$product->id)?>"><h3><?=$product->title?></h3></a>
            <h4 class="price"><?=currency($product->price)?> <span>200egp</span></h4>
        </div>
    </div>
    <!-- // Product Block -->
    <?php endforeach; ?>
</div>