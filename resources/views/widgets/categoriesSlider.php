<?php $categories = \App\Category::where("parent", "0")->orderby('id','desc')->get(); ?>
<!-- Categorys -->
<div class="section-head">
    <h2>الفئات والتصنيفات</h2>
</div>

<div class="carousel-slider row">
    <?php foreach($categories as $category): ?>
    <!-- Category Block -->
    <div class="category-block col-s-12 col-m-6 col-l-3">
        <div class="content-box">
            <a href="products/<?=$category->path?>" class="ti-android-exit" data-src="<?=url('/assets/categories/'.image_order($category->images))?>"></a>
            <a href="products/<?=$category->path?>"><h3><?= $category->name ?></h3></a>
        </div>
    </div>
    <!-- // Category Block -->
    <?php endforeach; ?>
</div>